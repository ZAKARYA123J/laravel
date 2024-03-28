<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    public $timestamps = false;
    use HasFactory;

    // Specify the fillable fields to protect against mass assignment vulnerability
    protected $fillable = ['Compte', 'societe_id', 'banque_id'];

    // Eager load the 'societe' relationship whenever a 'Compte' instance is retrieved

    // Define the 'societe' relationship
    

    // Define the 'carnets' relationship
    public function carnets()
    {
        return $this->hasMany(Carnet::class, 'id_comptes');
    }
    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }

    // Define the relationship with Banque model
    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }
}
