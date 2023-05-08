<?php

namespace App\Models;

use App\Models\Filiere;
use App\Models\Matieres;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    protected $guarded = [];

   
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
    public function matiere()
    {
        return $this->belongsTo(Matieres::class, 'id_matiere');
    }

}
