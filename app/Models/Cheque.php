<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    public $timestamps = false;
    use HasFactory;
       protected $fillable = [
        'cheque_number',
        'emission_date',
        'payment_date',
        'beneficiary',
        'montant',
        'concern',
        'remarks',
        'carnet_id',
    ];
    public function carnet()
    {
        return $this->belongsTo(Carnet::class);
    }
}
