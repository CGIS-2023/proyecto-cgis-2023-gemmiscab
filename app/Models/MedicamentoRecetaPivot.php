<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MedicamentoRecetaPivot extends Pivot
{
    protected $casts = [
        'inicio' => 'date',
        'fin' => 'date',
    ];
}
