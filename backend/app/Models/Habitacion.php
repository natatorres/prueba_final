<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rule;

/**
 * Modelo Habitacion.
 *
 * @property int    $hotel_id
 * @property string $tipo
 * @property string $acomodacion
 * @property int    $cantidad
 */
class Habitacion extends Model
{
    protected $table = 'habitaciones';

    protected $fillable = [
        'hotel_id',
        'tipo',
        'acomodacion',
        'cantidad',
    ];

    /**
     * Tipos permitidos de habitación.
     */
    public const TIPOS = [
        'ESTANDAR',
        'JUNIOR',
        'SUITE',
    ];

    /**
     * Acomodaciones válidas por tipo de habitación.
     */
    public const ACOMODACIONES_POR_TIPO = [
        'ESTANDAR' => ['SENCILLA', 'DOBLE'],
        'JUNIOR'   => ['TRIPLE', 'CUADRUPLE'],
        'SUITE'    => ['SENCILLA', 'DOBLE', 'TRIPLE'],
    ];

    /**
     * Relación inversa a Hotel.
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Reglas de validación para este modelo.
     * Usar en FormRequest o Validator::make().
     */
    public static function rules(int $hotelMaxHabitaciones): array
    {
        return [
            'hotel_id'    => ['required','exists:hotels,id'],
            'tipo'        => ['required', Rule::in(self::TIPOS)],
            'acomodacion' => [
                'required',
                // Debe estar en el arreglo según el tipo dinámico
                function($attribute, $value, $fail) {
                    $tipo = request('tipo');
                    $validas = self::ACOMODACIONES_POR_TIPO[$tipo] ?? [];
                    if (! in_array($value, $validas)) {
                        $fail("La acomodación «{$value}» no es válida para el tipo «{$tipo}».");
                    }
                },
            ],
            'cantidad'    => [
                'required',
                'integer',
                'min:1',
                // No puede exceder el total configurado en el hotel
                function($attribute, $value, $fail) use ($hotelMaxHabitaciones) {
                    if ($value > $hotelMaxHabitaciones) {
                        $fail("La cantidad ({$value}) supera el máximo de habitaciones ({$hotelMaxHabitaciones}).");
                    }
                },
            ],
        ];
    }
}
