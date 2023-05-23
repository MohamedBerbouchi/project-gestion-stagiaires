<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Session;


class FiliereController extends Controller
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

        $filieres = Filiere::all();

        return view('filiere.index', compact("filieres"))->with("userRole",   $this->getRole());
    }
    public function search(Request $request)
    {

        if ( $request->niveau_diplome == "tous"){
            
            if(trim($request->nom_diplome) != ""){
                 $filieres = Filiere::all()->where("nom", "like", "%".strtolower($request->nom_diplome) . "%");
            }else{
                $filieres = Filiere::all();
            }
        }else{
            if(trim($request->nom_diplome) != ""){

                $filieres = Filiere::all()->where("niveau_diplome", strtolower($request->niveau_diplome))->where("nom","like", "%".strtolower( $request->nom_diplome). "%");
            }else{
                $filieres = Filiere::all()->where("niveau_diplome",  strtolower($request->niveau_diplome));

            }
        }
        

        return view('filiere.index', compact("filieres"))->with("userRole",   $this->getRole());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('filiere.create');
        
    }
 
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "niveau_diplome" => "required",
            "duree_formation"=> "required",
            "stage1"=> "required",
            "stage2"=> "required",
            "niveau_admission"=> "required",
            "frais_inscription"=> "required",
            "frais_mansuel"=> "required",
            "frais_examen"=> "required",
            "frais_diplome"=> "required",
            "date_creation"=> "required",
            "num_autorisation"=> "required",
            "date_qualification"=> "required",
            "num_qualification"=> "required",
            "date_accreditation"=> "required",
            "num_accreditation"=> "required",
        ]);

        Filiere::create($request->all());

        return redirect()->route('filieres.index')->with("success", "add");

    }

 
    public function edit($id)
    {
        $filiere =  Filiere::find($id);

        return view('filiere.edit', compact("filiere"));

    }
 
    public function update(Request $request,  $id)
    {
        // dd($request);
        $request->validate([
            "nom" => "required",
            "niveau_diplome" => "required",
            "duree_formation"=> "required",
            "stage1"=> "required",
            "stage2"=> "required",
            "niveau_admission"=> "required",
            "frais_inscription"=> "required",
            "frais_mansuel"=> "required",
            "frais_examen"=> "required",
            "frais_diplome"=> "required",
            "date_creation"=> "required",
            "num_autorisation"=> "required",
            "date_qualification"=> "required",
            "num_qualification"=> "required",
            "date_accreditation"=> "required",
            "num_accreditation"=> "required",
        ]);
        $filiere =  Filiere::find($id);

        $filiere->update($request->all());

        return redirect()->route('filieres.index')->with("success", "edit");

        
    }

   
    public function delete( $id)
    {
        $filiere =  Filiere::find($id);

        $filiere->delete();

        return redirect()->route('filieres.index')->with("success", "del");

        
    }
}
