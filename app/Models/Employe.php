<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','prenom','poste','age','salaire','image','societeID','departementID'
        ];
        public function societes()
        {
        return $this->belongsTo(Societe::class,"societeID");
        }
        public function departements()
        {
         return $this->belongsTo(Departement::class,"departementID");
        }
}
