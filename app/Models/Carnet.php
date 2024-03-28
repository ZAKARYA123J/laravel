<?php
namespace App\Models;
use App\Models\Compte;
use App\Models\Cheque;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'type',
        'id_comptes',
        'ville',
        'cosdecarnet',
        'serie',
        'first',
        'last',
        'remaining_checks'
    ];

    public function compte()
    {
        return $this->belongsTo(Compte::class, 'id_comptes');
    }

  
    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
}
