<?php

namespace App\Http\Controllers;

use App\Models\Matieres;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Session;
 use App\Models\Filiere;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function getRole() {
        $userId = Session::get('userId');
        $userRole = Utilisateur::select("role")->where("id",   $userId)->first();
        return $userRole->role;
        
    }
    public function index()
    {
            $matieres = Matieres::all();
            return view('matiere.index', compact("matieres"))->with("userRole",   $this->getRole());;

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

       return redirect()->route("matieres.index")->with("success", "add");


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
          return redirect()->route("matieres.index")->with("success", "edit");

    }

    
    public function destroy( $id)
    {
        $matiere = Matieres::find($id);

        $matiere->delete();
        return redirect()->route("matieres.index")->with("success", "del");

    }
}
