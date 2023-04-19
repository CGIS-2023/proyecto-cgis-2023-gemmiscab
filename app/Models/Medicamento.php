<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'dosis'];

    public function tipo_medicamento(){
        return $this->belongsTo(Tipo_Medicamento::class);
    }

    public function recetas(){
        return $this->belongsToMany(Receta::class)->withPivot('tomas_dia', 'comentarios', 'inicio', 'fin');
    }
}
