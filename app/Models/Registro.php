<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'momento',
        'glucemia',
        'observaciones',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];


}
