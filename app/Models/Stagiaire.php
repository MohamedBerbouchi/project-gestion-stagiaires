<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'civilite'	,'nom'	,'prenom'	,'date_naissance'	,'lieu_naissance'	,'adresse'	,'ville'	,'cin'	,'tel'	,'niveau_scolaire'	,'dernier_diplome'	,'dernier_etablissement'	,'num_inscription'	,'date_inscription'	,'code_national'	,'photo'
    ];
}
