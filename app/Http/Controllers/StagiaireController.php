<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\Utilisateur;
use App\Models\Scolarite;
use App\Models\Filiere;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
    
        
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
        return view('stagiaire.index',compact('stagiaire'));
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

        return redirect()->route('stagiaires.index')->with('success', 'stagiaire a été créé avec succès.');
    
    }elseif (Auth::user()->role == 'Secretaire'){
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
    public function show(Stagiaire $Stagiaire)
    {
        return view('stagiaire.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stagiaire = Stagiaire::find($id);
        return view('stagiaire.edit',compact('stagiaire'));

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
        // echo $id;
        // dd($request);


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
            'photo' => 'required',
            'id_filiere' => 'required|integer',
            'annee_scolaire' => 'required|integer',
            'classe' => 'required|string|max:255',
        ]);
        $jj="kkkk";
        $civilite='z';

        // $stagiaire  = new Stagiaire();
        $stagiaire = Stagiaire::find($id); 

        $stagiaire->civilite = $civilite;
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
        $stagiaire->photo = $jj;
        // $stagiaire->id_filiere = $request->id_filiere;
        // $stagiaire->annee_scolaire = $request->annee_scolaire;
        // $stagiaire->classe = $request->classe;
        $stagiaire->update();

        // Stagiaire::create($request->all());

        return redirect()->route('stagiaires.index')->with('success', 'stagiaire a été modifier avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stagiaire $Stagiaire)
    {
        //
    }


    
}
