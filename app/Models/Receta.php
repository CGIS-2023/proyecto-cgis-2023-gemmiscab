<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_prescripcion', 'fecha_dispensacion'];
    //tb paciente al que ha sido prescrita
    //farmaceutico que la ha dispensado
    //medicamentos prescritos
    //medicamentos dispensados

    //public function

}
