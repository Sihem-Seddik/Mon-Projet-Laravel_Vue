<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomsociete','imagesociete'
        ];
        public function departements()
{
return $this->hasMany(Departement::class ,"societeID");
}
public function employe()
{
return $this->hasMany(Employe::class,"societeID");
}
}
