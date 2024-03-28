<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
 
    use HasFactory;
   
         protected $fillable = [
      'banque'
    ];
    public function Comptes()
    {
        return $this->belongsTo(Compte::class);
    }
}
