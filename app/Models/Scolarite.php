<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stagiaire;
use App\Models\Filiere;
class Scolarite extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'id_stagiaire');
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
}
