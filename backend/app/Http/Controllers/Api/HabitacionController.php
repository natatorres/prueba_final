<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHabitacionRequest;
use App\Models\Hotel;
use App\Models\Habitacion;
use App\Models\Log;
use Carbon\Carbon;
use Exception;

class HabitacionController extends Controller
{
    public function insertLog($process, $message, $tabla)
    {
        Log::insert([
            'proceso' => $process,
            'tabla' => $tabla,
            'mensaje' => is_string($message) ? $message : json_encode($message),
            'fecha' => Carbon::now('America/Bogota'),
            'fecha_inicio' => Carbon::now('America/Bogota'),
        ]);
    }

    public function store(StoreHabitacionRequest $request, $hotel)
    {
        try {
            $hotel = Hotel::findOrFail($hotel);

            $cantidad_habitaciones = Habitacion::where('hotel_id', $hotel->id)->sum('cantidad');

            $this->insertLog(
                'crear_habitacion',
                $request->all(),
                'habitaciones'
            );

            $existente = $hotel->num_habitaciones;
            $nueva     = (int) $request->cantidad;

            if ($nueva + $cantidad_habitaciones > $existente) {
                return response()->json([
                    'message'    => "La suma total ({$cantidad_habitaciones}+{$nueva}) supera el límite permitido ({$existente}).",
                    'habitacion' => $request->cantidad,
                ], 422);
            }

            $habitacion = Habitacion::create([
                'hotel_id' => $hotel->id,
                'tipo' => $request->tipo,
                'acomodacion' => $request->acomodacion,
                'cantidad' => $request->cantidad,
            ]);

            return response()->json([
                'message'    => 'Habitación creada',
                'habitacion' => $habitacion,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al procesar la solicitud',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

   
}
