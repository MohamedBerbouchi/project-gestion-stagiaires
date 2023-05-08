<?php

namespace App\Http\Controllers;

use App\Models\Matieres;
use Illuminate\Http\Request;

 use App\Models\Filiere;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $matieres = Matieres::all();
            return view('matiere.index', compact("matieres"));

    }

  
    public function create()
    {
        return view('matiere.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required|alpha",
            "nombre_heure_total" => "required|numeric",
            "nombre_heure_tp" => "required|numeric",
            "nombre_heure_th" => "required|numeric",
            "coef" => "required|numeric",
        ]);
        Matieres::create($request->all());

       return redirect()->back()->with("success", "matiere est cree");


    }

   
    public function edit( $id)
    {
        $matiere = Matieres::find($id);

        return view('matiere.edit', compact('matiere'));

    }


    public function update(Request $request, $id)
    {
         
        $request->validate([
            "nom" => "required|alpha",
            "nombre_heure_total" => "required|numeric",
            "nombre_heure_tp" => "required|numeric",
            "nombre_heure_th" => "required|numeric",
            "coef" => "required|numeric",
        ]);
        $matiere = Matieres::find($id);
        $matiere->update($request->all());
          return redirect()->back()->with("success", "matiere est modifier");

    }

    
    public function destroy( $id)
    {
        $matiere = Matieres::find($id);

        $matiere->delete();
        return redirect()->back()->with("success", "matiere est supprimer");

    }
}
