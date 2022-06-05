<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomdepartement','imagedep','societeID'
        ];
        public function societes()
        {
        return $this->belongsTo(Societe::class,"societeID");
        }
        public function employe()
        {
        return $this->hasMany(Employe::class,"departementID");
        }
}
