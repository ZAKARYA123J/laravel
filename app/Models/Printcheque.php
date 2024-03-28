<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printcheque extends Model
{
    use HasFactory;
    protected $fillable =[
        'montant',
        'montant_lettere',
        'ordre',
        'place',
        'date',
        'printed',
        'cheque_id',
    ];
    public function cheque()
    {
        return $this->belongsTo(Cheque::class);
    }
}
