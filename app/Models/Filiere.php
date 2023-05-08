<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programme;

class Filiere extends Model
{
    use HasFactory;
    protected $guarded = [];


  
    public function programme()
    {
        return $this->hasMany(Programme::class);
    }
}
