<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Construction;
use App\Models\Proyect;
use App\Models\ConstructionImage;
use App\Models\ProyectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function homepage(){
        return view('front-end.home');
    }

    public function obras(){
        $Catobras = Category::get();
        $obras = Construction::where('constructions.status', '=', '1')
                                ->get();
        return view('front-end.obras')
                -> with('Catobras', $Catobras)
                    -> with('obras', $obras);
    }

    public function obrasCategories($id){

        $category = trim(str_replace('-', ' ', $id));

        $obrasCategories = Category::select('constructions.title','constructions.id','constructions.image_primary','constructions.category')
                            ->join('constructions', 'constructions.category', '=', 'categories.id')
                                ->where('categories.name', '=', $category)
                                    ->where('constructions.status', '=', '1')
                                        ->get();

        if(count($obrasCategories) <= 0){
            return redirect() -> route('obras');
        }

        $catObras = Category::get();
        return view('front-end.obras-categoria')
                -> with('obrasCategories', $obrasCategories)
                    -> with('catObras', $catObras)
                        -> with('category',$category);
    }

    public function viewObra($id){
        $obra = trim(str_replace('-', ' ', $id));
        $obra = Construction::where('title', '=', $obra)->limit(1)->get();
        foreach($obra AS $obras){
            if($obras->status != 1){
                return redirect()->route('obras');
            }
            $obraImages = ConstructionImage::where('constructions_id','=',$obras->id)
                        ->get();
        }


        return view('front-end.view-obra')
                -> with('obra',$obra)
                    ->with('obraImages',$obraImages);
    }


    public function documentacionTecnica(){
        return view('front-end.documentacion-tecnica');
    }

    public function proyectos(){
        $proyectos = Proyect::where('proyects.status', '=', '1')
                                ->get();
        return view('front-end.proyectos')
                -> with('proyectos', $proyectos);
    }

    public function viewProyecto($id){
        $proyecto = trim(str_replace('-', ' ', $id));
        $proyecto = Proyect::where('title', '=', $proyecto)->limit(1)->get();
        foreach($proyecto AS $proyectos){
            if($proyectos->status != 1){
                return redirect()->route('obras');
            }
            $proyectoImages = ProyectImage::where('proyects_id','=',$proyectos->id)
                        ->get();
        }
        return view('front-end.view-proyecto')
                -> with('proyecto',$proyecto)
                    ->with('proyectoImages',$proyectoImages);
    }

    public function empresa(){
        return view('front-end.empresa');
    }
    public function contacto(){
        return view('front-end.contacto');
    }
    public function send(Request $request){
        $request->validate([
            'name'    => 'required|min:2',
            'email'   => 'required|email',
            'tel'     => 'required|min:5',
            'message' => 'required|min:10',
        ]);
    }

    public function politicaPrivacidad(){
        return view('front-end.politicas.privacidad');
    }

    public function terminosLegalesTecnicos(){
        return view('front-end.politicas.terminos-legales-tecnicos');
    }
}
