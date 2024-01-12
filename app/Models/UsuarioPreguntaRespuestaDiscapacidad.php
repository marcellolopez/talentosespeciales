<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioPreguntaRespuestaDiscapacidad extends Model
{
    use HasFactory;
    protected $table = 'usuario_pregunta_respuesta_discapacidad';

    ## Deshabilita updated_at y created_at
    public $timestamps = false;
}
