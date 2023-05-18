<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scolarite;
class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'civilite'	,'nom'	,'prenom'	,'date_naissance'	,'lieu_naissance'	,'adresse'	,'ville'	,'cin'	,'tel'	,'niveau_scolaire'	,'dernier_diplome'	,'dernier_etablissement'	,'num_inscription'	,'date_inscription'	,'code_national'	,'photo'
    ];


   
    public function scolarite()
    {
        return $this->hasOne(Scolarite::class, "id_stagiaire");
    }
    // /**
    //  * Get the user associated with the Stagiaire
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function user(): HasOne
    // {
    //     return $this->hasOne(User::class, 'id_stagiaire', "id_stagiaire");
    // }
 
}
