<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use App\Models\ProyectImage;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyects  = Proyect::get();

        return view('back-end.proyects.index')
                -> with('proyects', $proyects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.proyects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name'          => 'required|min:2',
            'proyectImg'    => 'required|mimes:png,jpg'
        ]);

        $data = [
            'title' => $request->name
        ];
        $proyect = Proyect::create($data);
        if($proyect)
        {
             // Save Image
            if($request->hasFile('proyectImg'))
            {
                    $image = $request->file('proyectImg');
                    $ruta = public_path().'/images/proyects/'.$proyect->id;
                    $nameImg = time().'-'.$image->getClientOriginalName();
                    $image->move($ruta,$nameImg);
                    $proyectImg = Proyect::find($proyect->id);
                    $proyectImg->image_primary = '/images/proyects/'.$proyect->id.'/'.$nameImg;
                    $proyectImg->save();
            }
            return redirect()
                    -> route('proyectos.index');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyect = Proyect::find($id);
        return view('back-end.proyects.edit')
                -> with('proyect', $proyect);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        if(is_null( $request->file('proyectImg') )){

            $proyectEdit = Proyect::find($id);
            $proyectEdit->title =  $request->name;
            $proyectEdit->status = (int) $request->status;
            $proyectEdit->save();

        }else{
            $proyectEdit = Proyect::find($id);
            // Eliminar imagen
            unlink( public_path($proyectEdit->image_primary) );
            $image = $this->saveImage($request->file('proyectImg'),$id);
            $proyectEdit->title         =  $request->name;
            $proyectEdit->status        =  (int) $request->status;
            $proyectEdit->image_primary =  $this->linkImage($image,$id);
            $proyectEdit->save();

        }
        return redirect()
                    -> route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyectDelete = Proyect::find($id);
        $proyectImagesDelete = ProyectImage::where('proyects_id',$id)->get();

        if($proyectDelete->image_primary != null){
            $this->deleteImagesAll($proyectDelete->image_primary);
        }
        if(count($proyectImagesDelete) > 0){
            foreach ($proyectImagesDelete as $image) {
                $this->deleteImagesAll($image->image_url);
                $image->delete();
            }
        }
        rmdir( public_path('/images/proyects/'.$id) );
        $proyectDelete->delete();
        return redirect()
                    -> route('proyectos.index');
    }

    private function saveImage($image, $id):string
    {
        $img = $image;
        $ruta = public_path().'/images/proyects/'.$id;
        $nameImg = time().'-'. $img->getClientOriginalName();
        $image->move($ruta,$nameImg);
        return $nameImg;
    }

    private function linkImage($name, $id):string
    {
        $urlImage = '/images/proyects/'.$id.'/'.$name;
        return $urlImage;
    }
    private function deleteImagesAll($image):void
    {
        unlink( public_path($image)  );
    }
}
