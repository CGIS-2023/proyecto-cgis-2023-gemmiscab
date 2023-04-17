<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmaceutico extends Model
{
    use HasFactory;

    protected $fillable = ['numero_colegiado'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pacientes(){
        return $this->hasManyThrough(Paciente::class, Receta::class);
    }

    public function recetas(){
        return $this->hasMany(Receta::class);
    }
}
