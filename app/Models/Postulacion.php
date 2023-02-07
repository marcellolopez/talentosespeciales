<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Postulacion extends Model
{
    use HasFactory;
    protected $table = 'postulaciones';

    public function forma_trabajo()
    {
        return $this->belongsTo(FormaTrabajo::class, 'forma_trabajo_id');
    }

    public function tipo_contrato()
    {
        return $this->belongsTo(TipoContrato::class, 'tipo_contrato_id');
    }

    public function tipo_jornada()
    {
        return $this->belongsTo(TipoJornada::class, 'tipo_jornada_id');
    }    

    public function fechaPublicacion(){
        
        $startTime = Carbon::parse($this->created_at);
        $finishTime = Carbon::parse(now());
        $mensaje = "Hace ";
        $totalDuration = $finishTime->diffInHours($startTime);
        if($totalDuration > 23){
            $result = round($totalDuration/24, 0, PHP_ROUND_HALF_DOWN);
            $mensaje .= $result;
            if($result > 1){
                $mensaje .= ' días';
            }
            else{
                $mensaje .= ' día';
            }
        }
        elseif ($totalDuration == 0) {
            return 'Hace algunos instantes';
        }
        else{
            $result = $totalDuration;
            $mensaje .= $totalDuration;
            if($result > 1){
                $mensaje .= ' horas';
            }
            else{
                $mensaje .= ' horas';
            }
        }
        return $mensaje;
    }
}
