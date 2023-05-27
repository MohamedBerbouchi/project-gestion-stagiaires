<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Scolarite;

class StatistiqueController extends Controller
{
    public function index(){
        $anne_actual = Date("Y");
        $month_actual = Date("m");
        $years = [];
        $homme = [];
        $femme = [];
         
    
        if($month_actual < 7){
            $anne_scolaire_actual = $anne_actual -1 ."-". $anne_actual ;
            for ($i=$anne_actual; $i > $anne_actual-5; $i--) { 
               $anne_scolaire_actual2 = $i -1 ."-". $i;
               $years[] = $anne_scolaire_actual2;
               
           }
           
       }else{
        $anne_scolaire_actual = $anne_actual  ."-". $anne_actual+1;

           for ($i=$anne_actual; $i > $anne_actual-5; $i--) { 
               $anne_scolaire_actual2 = $i  ."-". $i+1;
               $years[] = $anne_scolaire_actual2;
           }
   
       }
   
       $years = array_reverse($years);
           foreach($years as $year){
                   
               $results = DB::table('stagiaires as st')
               ->join('scolarites as sc', 'st.id', '=', 'sc.id_stagiaire')
               ->select('st.civilite', DB::raw('count(*) as count'))
               ->where('sc.annee_scolaire', '=', $year)
               ->groupBy('st.civilite')
               ->pluck('count', 'civilite')
               ->toArray();
    
               $homme[] = isset($results["H"]) ? $results["H"] : 0;
               $femme[] = isset($results["F"]) ? $results["F"] : 0;
           
           }

        //   return [json_encode($homme), json_encode($femme), json_encode($years)];
          $years = json_encode($years);
          $homme = json_encode($homme);
          $femme = json_encode($femme);
        // return $anne_scolaire_actual;
        $stg = Scolarite::selectRaw('classe , count(*) as nb_stg')->where("annee_scolaire", $anne_scolaire_actual)->groupBy("classe")
        ->get();
        $anne1 = Scolarite::where('classe' , '1ere Annee')->where("annee_scolaire", $anne_scolaire_actual)->count();
        $anne2 = Scolarite::where('classe' , '2eme Annee')->where("annee_scolaire", $anne_scolaire_actual)->count();
       
        return view('layouts.statistique', compact("anne1", "anne2", "anne_scolaire_actual", "years", "homme", "femme"));

    }
}
