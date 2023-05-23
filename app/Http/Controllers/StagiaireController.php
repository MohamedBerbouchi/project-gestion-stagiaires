<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\Scolarite;
use App\Models\Filiere;
use Illuminate\Http\Request;
use DB;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Session;

class StagiaireController extends Controller
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
        $stagiaire = Stagiaire::all();
        // $s = Scolarite::all();
//
    //    return $s[0]->stagiaire;
        // return  $stagiaire[0]->scolarite;
        // return  $stagiaire[0];

        // $stagiaire = DB::table('stagiaires')->orderBy('id', 'asc');
        // $stagiaire = DB::table('stagiaires');
        // dd($candidat);
         
        return view('stagiaire.index',compact('stagiaire'))->with("userRole",   $this->getRole());
        // return $stagiaire;

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres = Filiere::all();

        return view('stagiaire.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $userId = Session::get('userId');
        $userRole = Utilisateur::select("role")->where("id", $userId)->first();
     
        // $this->userRole =  $userRole;

         // Valider les données du formulaire et créer un nouvel étudiant
        if(  $userRole->role == 'Directeur'){
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'niveau_scolaire' => 'required|string|max:255',
            'dernier_diplome' => 'required|string|max:255',
            'dernier_etablissement' => 'required|string|max:255',
            'num_inscription' => 'required|string|max:255',
            'date_inscription' => 'required|string|max:255',
            'code_national' => 'required|string|max:255',
             'id_filiere' => 'required|integer',
            'annee_scolaire' => 'required',
            'classe' => 'required|string|max:255',
            'civilite' => 'required',
        ]);

           if($request->has('photo')){
            $photo = time() . "-". $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs(
                'stagiaires', $photo
            );  
        }else{
            $path = "stagiaires/default.jpg";
        }
 
        

        $stagiaire  = new Stagiaire();
        $stagiaire->civilite = $request->civilite;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->nom = $request->nom;
        $stagiaire->date_naissance = $request->date_naissance;
        $stagiaire->lieu_naissance = $request->lieu_naissance;
        $stagiaire->adresse = $request->adresse;
        $stagiaire->ville = $request->ville;
        $stagiaire->cin = $request->cin;
        $stagiaire->tel = $request->tel;
        $stagiaire->niveau_scolaire = $request->niveau_scolaire;
        $stagiaire->dernier_diplome = $request->dernier_diplome;
        $stagiaire->dernier_etablissement = $request->dernier_etablissement;
        $stagiaire->num_inscription = $request->num_inscription;
        $stagiaire->date_inscription = $request->date_inscription;
        $stagiaire->code_national = $request->code_national;
        $stagiaire->photo =  $path ;
        // $stagiaire->id_filiere = $request->id_filiere;
        // $stagiaire->annee_scolaire = $request->annee_scolaire;
        // $stagiaire->classe = $request->classe;
        $stagiaire->save();

        // $x = "select max(id) as idMaxInTableSta from stagiaires";
        // $tous_les_stagiaires = DB::select($x);
        // $id_max_stg = $tous_les_stagiaires[0]->idMaxInTableSta;

        $annee_scolaire = $request->input('annee_scolaire');
        $id_filiere = $request->input('id_filiere');
        $classe = $request->input('classe');
        $resultat_stag = "inscrit";
        $date_resultat = $request->input('date_inscription');
        
        $scolarite = new Scolarite();
        $scolarite->annee_scolaire = $annee_scolaire;
        $scolarite->id_stagiaire =$stagiaire->id;
        $scolarite->id_filiere = $id_filiere;
        $scolarite->classe = $classe;
        $scolarite->resultat = $resultat_stag;
        $scolarite->date_resultat = $date_resultat;
        $scolarite->save();

        // Stagiaire::create($request->all());

        return redirect()->route('stagiaires.index')->with('success', "add");
    
    }elseif ($userRole->role == 'Secretaire'){
        return redirect()->route('statistique');
    }else{
        return redirect()->route('/login');
    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        return view('stagiaire.show',compact('stagiaire'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $userId = Session::get('userId');
        $userRole = Utilisateur::select("role")->where("id", $userId)->first();
        $filieres = Filiere::all();

  

    
        if($userRole->role == 'Directeur'){
            $stagiaire = Stagiaire::find($id);
            return view('stagiaire.edit',compact('stagiaire',"filieres"));
        }elseif ($userRole->role == 'Secretaire'){
            return redirect()->route('statistique');
        }else{
            return redirect()->route('/login');
        }
        // return view('stagiaire.edit');
        // $stagiaire = Stagiaire::all();
        // dd($stagiaire);
        // return view('stagiaire.edit')->with("stagiaire");

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         // dd($request);
         $userId = Session::get('userId');
         $userRole = Utilisateur::select("role")->where("id", $userId)->first();
      
         // $this->userRole =  $userRole;
 
          // Valider les données du formulaire et créer un nouvel étudiant
         if(  $userRole->role == 'Directeur'){
         $request->validate([
             'prenom' => 'required|string|max:255',
             'nom' => 'required|string|max:255',
             'date_naissance' => 'required|date',
             'lieu_naissance' => 'required|string|max:255',
             'adresse' => 'required|string|max:255',
             'ville' => 'required|string|max:255',
             'cin' => 'required|string|max:255',
             'tel' => 'required|string|max:255',
             'niveau_scolaire' => 'required|string|max:255',
             'dernier_diplome' => 'required|string|max:255',
             'dernier_etablissement' => 'required|string|max:255',
             'num_inscription' => 'required|string|max:255',
             'date_inscription' => 'required|string|max:255',
             'code_national' => 'required|string|max:255',
              'id_filiere' => 'required|integer',
             'annee_scolaire' => 'required',
             'classe' => 'required|string|max:255',
             'civilite' => 'required',
         ]);
 
        
  
         
 
         $stagiaire  =   Stagiaire::find($id);
         $stagiaire->civilite = $request->civilite;
         $stagiaire->prenom = $request->prenom;
         $stagiaire->nom = $request->nom;
         $stagiaire->date_naissance = $request->date_naissance;
         $stagiaire->lieu_naissance = $request->lieu_naissance;
         $stagiaire->adresse = $request->adresse;
         $stagiaire->ville = $request->ville;
         $stagiaire->cin = $request->cin;
         $stagiaire->tel = $request->tel;
         $stagiaire->niveau_scolaire = $request->niveau_scolaire;
         $stagiaire->dernier_diplome = $request->dernier_diplome;
         $stagiaire->dernier_etablissement = $request->dernier_etablissement;
         $stagiaire->num_inscription = $request->num_inscription;
         $stagiaire->date_inscription = $request->date_inscription;
         $stagiaire->code_national = $request->code_national;
         $stagiaire->photo =   $stagiaire->photo;

        //  if($request->hasFile('photo')){

            // return $request->file('photo');
            // $photo = time() . "-". $request->file('photo')->getClientOriginalName();
            // $path = $request->file('photo')->storeAs('stagiaires', $photo );  
            //  $stagiaire->photo =  $path ;
        // } 
       
         // $stagiaire->id_filiere = $request->id_filiere;
         // $stagiaire->annee_scolaire = $request->annee_scolaire;
         // $stagiaire->classe = $request->classe;
         $stagiaire->save();
 
         // $x = "select max(id) as idMaxInTableSta from stagiaires";
         // $tous_les_stagiaires = DB::select($x);
         // $id_max_stg = $tous_les_stagiaires[0]->idMaxInTableSta;
 
         $annee_scolaire = $request->input('annee_scolaire');
         $id_filiere = $request->input('id_filiere');
         $classe = $request->input('classe');
         $resultat_stag = "inscrit";
         $date_resultat = $request->input('date_inscription');
         
         $scolarite =  Scolarite::where("id_stagiaire", $stagiaire->id)->first();
         $scolarite->annee_scolaire = $annee_scolaire;
         $scolarite->id_stagiaire =$stagiaire->id;
         $scolarite->id_filiere = $id_filiere;
         $scolarite->classe = $classe;
         $scolarite->resultat = $resultat_stag;
         $scolarite->date_resultat = $date_resultat;
         $scolarite->save();
 
         // Stagiaire::create($request->all());
 
         return redirect()->route('stagiaires.index')->with('success', "edit");
     
     }elseif ($userRole->role == 'Secretaire'){
         return redirect()->route('statistique');
     }else{
         return redirect()->route('/login');
     }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Session::get('userId');
        $userRole = Utilisateur::select("role")->where("id", $userId)->first();


        if($userRole->role == 'Directeur'){
            
            // $stagiaire = Stagiaire::find($id);
            // $scolarite = Scolarite::where('id_stagiaire', '=', $id)->first();
            
            //  $scolarite->delete();
            //  $stagiaire->delete();
            // return redirect()->route('stagiaires.index')->with('success', "del");

            try {
                
                $stagiaire = Stagiaire::find($id);
                // $scolarite = Scolarite::find();
                $scolarite = Scolarite::where('id_stagiaire', '=', $id)
                ->first();
                // echo $scolarite[0]['annee_scolaire'];
                // echo $scolarite;
                if ($stagiaire && $scolarite) {
                    // return $userRole->role;
                    $scolarite->delete();
                    $stagiaire->delete();

                         return redirect()->route('stagiaires.index')->with('success', "del");


                } else {
                    return redirect()->route('stagiaires.index')->with('error', 'false');

                }
            } catch (\Exception $e) {
                return redirect()->route('stagiaires.index')->with('error', 'false');
            }
        
    }elseif ($userRole->role == 'Secretaire'){
        return redirect()->route('statistique');
    }else{
        return redirect()->route('/login');
    }
    }


    
}
