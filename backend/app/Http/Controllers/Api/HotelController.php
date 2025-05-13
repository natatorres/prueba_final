<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Models\Hotel;
use Illuminate\Http\JsonResponse;
use App\Models\Log;
use Carbon\Carbon;
use Exception;

class HotelController extends Controller
{

     public function index(): JsonResponse
    {
        $hoteles = Hotel::select('id', 'nombre')->get(); // ajusta los campos si lo deseas

        return response()->json($hoteles);
    }
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

    /**
     * POST /api/hotels
     */
    public function store(StoreHotelRequest $request): JsonResponse
    {
        try {
            $hotel = Hotel::create($request->validated());

            $this->insertLog(
                'crear_hotel',
                $request->all(),
                'hotels'
            );

            return response()->json([
                'message' => 'Hotel creado correctamente.',
                'hotel'   => $hotel,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear el hotel.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
