<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_medicamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
}
