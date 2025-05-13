<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Habitacion;
use App\Models\Hotel;
use App\Models\Log;
use Carbon\Carbon;

class StoreHabitacionRequest extends FormRequest
{
    public function authorize()
    {
        return true; // o chequear permisos
    }
 public function insertLog($process, $message, $tabla)
    {
        Log::insert([
            'proceso' => $process,
            'tabla' => $tabla,
            'mensaje' => $message,
            'fecha' => Carbon::now('America/Bogota'),
            'fecha_inicio' => Carbon::now('America/Bogota'),
        ]);
    }
    
}
