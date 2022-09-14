<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use App\Models\ProyectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProyectImageController extends Controller
{
    public function index()
    {
        $projects = Proyect::get();
        return view('back-end.proyects.images.index')
                -> with('projects',$projects);
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagesProyect.*'  => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if(is_null($request->imagesProyect))
        {
            return redirect()
                   -> route('ProjectaddImage');
                    die();
        }

        $imagenes = [];
        if($request->hasFile('imagesProyect'))
        {
            $imagenes = $request->file('imagesProyect');
            foreach ($imagenes as $imagen) {

                $ruta = public_path().'/images/proyects/'.$request->name.'/';
                echo $ruta;
                $mover = $imagen->move($ruta,$imagen->getClientOriginalName());
                $proyectImage = ProyectImage::create([
                    'proyects_id' => $request->name,
                    'image_url' => '/images/proyects/'.$request->name.'/'.$imagen->getClientOriginalName()
                ]);
            }
            return redirect()->route('proyectos.index')
                    -> with('success','Imagenes subidas correctamente');
    }
}

    public function edit($id)
    {
        $images = ProyectImage::where('proyects_id', $id)->get();
        return view('back-end.proyects.images.editar')
                    -> with('images', $images);
    }

    public function delete(Request $request)
    {
        $json = $request->json()->all();
        for($i = 0; $i < count($json); $i++){
            $deleteImgProyect = ProyectImage::find($json[$i]);
            unlink( public_path($deleteImgProyect->image_url) );
            $deleteImgProyect->delete();
        }
        return response()->json([
            'success' => 200,
            'error'   => false
        ]);
    }
}
