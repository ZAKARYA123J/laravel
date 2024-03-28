<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['Nomsociete','banque'];
    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}
