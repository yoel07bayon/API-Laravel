<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnioLectivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'inicio', 'fin ', 'estado', 'nombre'
    ];

  protected $table='aniolectivo';

 // public $timestamps = false;


}

