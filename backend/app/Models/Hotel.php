<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo Hotel.
 *
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $nit
 * @property int    $num_habitaciones
 */
class Hotel extends Model
{
    // Campos asignables masivamente
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'nit',
        'num_habitaciones',
    ];

    /**
     * Relación 1:N con Habitacion.
     */
    public function habitaciones(): HasMany
    {
        return $this->hasMany(Habitacion::class);
    }
}
