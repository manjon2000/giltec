<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Construction;
use App\Models\ConstructionImage;

class ConstructionImageController extends Controller
{
    public function index()
    {
        $projects = Construction::get();
        return view('back-end.obras.images.index')
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

                $ruta = public_path().'/images/obras/'.$request->name.'/';
                $nameImg = time().'-'. $imagen->getClientOriginalName();
                $mover = $imagen->move($ruta,$nameImg);
                $ConstructionImage = ConstructionImage::create([
                    'constructions_id' => $request->name,
                    'image_url' => '/images/obras/'.$request->name.'/'.$nameImg
                ]);

                $nameImg = '';
            }
            return redirect()->route('constructions.index')
                    -> with('success','Imagenes subidas correctamente');
    }
}

    public function edit($id)
    {
        $images = ConstructionImage::where('constructions_id', $id)->get();
        return view('back-end.obras.images.edit')
                    -> with('images', $images);
    }

    public function delete(Request $request)
    {
        $json = $request->json()->all();
        for($i = 0; $i < count($json); $i++){
            $deleteImgProyect = ConstructionImage::find($json[$i]);
            unlink( public_path($deleteImgProyect->image_url) );
            $deleteImgProyect->delete();
        }
        return response()->json([
            'success' => 200,
            'error'   => false
        ]);
    }
}
