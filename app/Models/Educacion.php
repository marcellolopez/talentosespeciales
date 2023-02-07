<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Educacion extends Model
{
    use HasFactory;

    protected $table = 'educacion';

    public function fechaInicio(){
        
        $fecha = Carbon::parse($this->fecha_inicio);
        return $fecha->format('Y');
    }

    public function fechaTermino(){
        
        $fecha = Carbon::parse($this->fecha_termino);
        return $fecha->format('Y');
    }    

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }


}
