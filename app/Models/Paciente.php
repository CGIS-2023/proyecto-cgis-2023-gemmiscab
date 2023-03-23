<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nuhsa'];

    public function recetas(){
        return $this->hasMany(Receta::class);
    }

    public function farmaceuticos(){
        return $this->hasManyThrough(Farmaceutico::class, Receta::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
