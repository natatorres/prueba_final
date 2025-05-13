import { Box, TextField, Button, Typography } from '@mui/material';
import { useState } from 'react';
import { crearHotel } from '../services/hotelService';

export default function IngresarHotel() {
  const [formData, setFormData] = useState({
    nombre: '',
    direccion: '',
    ciudad: '',
    nit: '',
    num_habitaciones: '',
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await crearHotel(formData);
      alert('Hotel guardado correctamente');
    } catch (err) {
      alert(`Error: ${err.message}`);
    }
  };

  return (
    <Box component="form" onSubmit={handleSubmit} sx={{ maxWidth: 600, mx: 'auto', display: 'grid', gap: 2 }}>
      <Typography variant="h5">Ingresar Nuevo Hotel</Typography>
      <TextField label="Nombre" name="nombre" value={formData.nombre} onChange={handleChange} required />
      <TextField label="Dirección" name="direccion" value={formData.direccion} onChange={handleChange} required />
      <TextField label="Ciudad" name="ciudad" value={formData.ciudad} onChange={handleChange} required />
      <TextField label="NIT" name="nit" value={formData.nit} onChange={handleChange} required />
      <TextField
        label="Número total de habitaciones"
        name="num_habitaciones"
        type="number"
        value={formData.num_habitaciones}
        onChange={handleChange}
        required
      />
      <Button type="submit" variant="contained">Guardar Hotel</Button>
    </Box>
  );
}
