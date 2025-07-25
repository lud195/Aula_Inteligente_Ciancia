<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foco extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'tipo',
        'estado',
        'aula_id', // <-- importante
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
