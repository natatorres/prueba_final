// src/services/habitacionService.js

export async function crearHabitaciones(hotelId, data) {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/hotels/${hotelId}/habitaciones`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        // 'Authorization': `Bearer ${token}` // Si se requiere token
      },
      body: JSON.stringify(data),
    });

    const result = await response.json();

    if (!response.ok) {
      throw new Error(result.message || 'Error al guardar habitaciones');
    }

    return result;
  } catch (error) {
    throw error;
  }
}
