<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Construction;
use App\Models\ConstructionImage;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $constructions = Construction::join('categories','categories.id','=','constructions.category')
                    -> get(['constructions.*','categories.name AS catName']);
        return view('back-end.obras.index')
                -> with('constructions', $constructions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('back-end.obras.create')
                    -> with('categories',$categories);
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
            'title'     => $request->name,
            'category'  => $request->category
        ];
        $proyect = Construction::create($data);
        if($proyect)
        {
             // Save Image
            if($request->hasFile('proyectImg'))
            {
                    $image = $request->file('proyectImg');
                    $ruta = public_path().'/images/obras/'.$proyect->id;
                    $nameImg = time().'-'.$image->getClientOriginalName();
                    $image->move($ruta,$nameImg);
                    $proyectImg = Construction::find($proyect->id);
                    $proyectImg->image_primary = '/images/obras/'.$proyect->id.'/'.$nameImg;
                    $proyectImg->save();
            }
            return redirect()
                    -> route('constructions.index');
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
        $construction = Construction::find($id);
        $categories = Category::get();
        return view('back-end.obras.edit')
                -> with('construction', $construction)
                    -> with('categories', $categories);
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

            $proyectEdit = Construction::find($id);
            $proyectEdit->title =  $request->name;
            $proyectEdit->status = (int) $request->status;
            $proyectEdit->save();

        }else{
            $proyectEdit = Construction::find($id);
            // Eliminar imagen
            if($proyectEdit->image_primary != null){
                unlink( public_path($proyectEdit->image_primary) );
            }
            $image = $this->saveImage($request->file('proyectImg'),$id);
            $proyectEdit->title         =  $request->name;
            $proyectEdit->status        =  (int) $request->status;
            $proyectEdit->image_primary =  $this->linkImage($image,$id);
            $proyectEdit->save();

        }
        return redirect()
                    -> route('constructions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $construction = Construction::find($id);
        $imagesConstruction = ConstructionImage::where('constructions_id','=', $id)
                              ->get();

        if(count($imagesConstruction) > 0 || count($imagesConstruction) != null){
            foreach($imagesConstruction as $imageConstruction){
                unlink(public_path($imageConstruction->image_url));
            }
        }
        // Eliminar imagen primaria y carpeta
        unlink(public_path($construction->image_primary));
        rmdir( public_path('/images/obras/'.$id) );

        // Eliminar elemento DB
        $construction->delete();

        return redirect() -> route('constructions.index');

    }

    private function saveImage($image, $id):string
    {
        $img = $image;
        $ruta = public_path().'/images/obras/'.$id;
        $nameImg = time().'-'. $img->getClientOriginalName();
        $image->move($ruta,$nameImg);
        return $nameImg;
    }

    private function linkImage($name, $id):string
    {
        $urlImage = '/images/obras/'.$id.'/'.$name;
        return $urlImage;
    }
}
