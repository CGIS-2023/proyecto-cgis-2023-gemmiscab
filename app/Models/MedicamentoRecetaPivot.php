<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relactions\Pivot;

class MedicamentoRecetaPivot extends Pivot
{
    protected $casts = [
        'inicio' => 'datetime:Y-m-d',
        'fin' => 'datetime:Y-m-d',
    ];
}
