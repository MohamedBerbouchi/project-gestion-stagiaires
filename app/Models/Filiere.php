<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programme;
use App\Models\Scolarite;
class Filiere extends Model
{
    use HasFactory;
    protected $guarded = [];


  
    public function programme()
    {
        return $this->hasMany(Programme::class);
    }

    /**
     * Get all of the comments for the Filiere
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scolarites()
    {
        return $this->hasMany(Scolarite::class);
    }
}
