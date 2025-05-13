import { Box, TextField, Button, Typography } from '@mui/material';

export default function Login() {
  return (
    <Box component="form" sx={{ maxWidth: 400, mx: 'auto', display: 'grid', gap: 2 }}>
      <Typography variant="h5">Iniciar Sesión</Typography>
      <TextField label="Usuario o email" required />
      <TextField label="Contraseña" type="password" required />
      <Button variant="contained" color="primary">Entrar</Button>
    </Box>
  );
}
