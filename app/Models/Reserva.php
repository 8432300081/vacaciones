<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reserva extends Model
{
    public $timestamps = false;

    protected $table = 'reservas'; // Si el nombre de tabla es diferente al modelo
        
    protected $fillable = [
        'nombre',
        'email',
        'destino',
        'fecha_inicio',
        'fecha_fin',
        'habitaciones'
        
    ];

    protected $dates = ['fecha_inicio', 'fecha_fin'];
}