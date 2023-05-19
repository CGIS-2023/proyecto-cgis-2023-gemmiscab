<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'farmaceutico_id', 'paciente_id'];

    protected $casts = [
        'fecha' => 'date: Y-m-d',
    ];

    public function farmaceutico(){
        return $this->belongsTo(Farmaceutico::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function medicamentos(){
        return $this->belongsToMany(Medicamento::class)->using(MedicamentoRecetaPivot::class)->withPivot('tomas_dia', 'comentarios', 'inicio', 'fin');
    }

}
