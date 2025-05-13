// src/services/hotelService.js

export async function crearHotel(data) {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/hotels', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        // Si necesitas token: 'Authorization': `Bearer ${token}`
      },
      body: JSON.stringify(data),
    });

    const result = await response.json();

    if (!response.ok) {
      throw new Error(result.message || 'Error al guardar el hotel');
    }

    return result;
  } catch (error) {
    throw error;
  }
}


export async function getHoteles() {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/hotels');
    const result = await response.json();

    if (!response.ok) {
      throw new Error(result.message || 'Error al obtener hoteles');
    }

    return result;
  } catch (error) {
    throw error;
  }
}
