<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Filiere;
use App\Models\Matieres;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    
    public function index()
    {

        $programmes = Programme::all();
        $filieres = Filiere::all();
        return view('programme.index', compact('programmes', "filieres"));
    }

  
    public function create(Request $request)
    {


        // there are a probel in filire

        // return $request->annee_scolaire;
        $annee_scolaire = $request->annee_scolaire;
        $filiere =["id" => $request->id_filiere, "nom"=> Filiere::find($request->id_filiere)->nom];
        $classe = $request->classe;
        // $Matieres = DB::table('select * from matieres where ')
        $programmes = Programme::all()->where("id_filiere", $filiere['id'])->where("annee_scolaire", $annee_scolaire)->first();
        
          
       if($programmes){
                $matieres = Matieres::all()->where('id', '<>',  $filiere['id']);

        }
        else{
            $matieres = Matieres::all();

        }
        return view('programme.create' ,compact('annee_scolaire', 'filiere', "classe","matieres" ));
        
    }

    public function store(Request $request)
    {
        // return $request->id_filiere;
        $classes =  $request->class;
        foreach($classes as  $matiere_choisir => $class){
           
            if($class != 'non'){
                
                $matiere = Matieres::find($matiere_choisir);
                $programme =  Programme::create([
                    "annee_scolaire" => $request->annee_scolaire,
                    "classe" =>  $class,
                    "id_filiere" =>  $request->id_filiere,
                    "id_matiere" =>   $matiere_choisir,
                  ]);
            }
         
        }

       return redirect()->route('programmes.index')->with("success", "le programmes de la filiere  est cree avec success");
        


        
    }

    
    public function show(Programme $programme)
    {
        return view('programme.show');

    }


    public function edit($id)
    {
        $matiere = Matieres::find($id);

        return view('matiere.edit', compact('matiere'));
        
    }
    public function search($id_filiere, $annee_scolaire,$classe)
    {
   
        // return [$id_filiere, $annee_scolaire,$classe];
        
     
     if($classe == "toutes"){
        $programmes = Programme::all()->where("id_filiere",$id_filiere)->where("annee_scolaire",$annee_scolaire)->where("annee_scolaire",$annee_scolaire);
     }
     else{
         $programmes = Programme::all()->where("id_filiere",$id_filiere)->where("annee_scolaire",$annee_scolaire)->where("classe",$classe)->where("annee_scolaire",$annee_scolaire);
     }
       
        $filieres = Filiere::all();
  
        return view('programme.index', compact('programmes', "filieres"));

        
    }

 
    public function update(Request $request, Programme $programme)
    {
        
    }

   
    public function destroy( $id)
    {
        $programme = Programme::find($id);
        $programme->delete();
        return redirect()->back()->with("success", "le programmes de la filiere  est supprimer avec success");
       
    }
}
