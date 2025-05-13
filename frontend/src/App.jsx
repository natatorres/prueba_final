import { ThemeProvider } from '@mui/material/styles';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import CssBaseline from '@mui/material/CssBaseline';
import Box from '@mui/material/Box';

import theme from './theme';
import Sidebar from './components/Sidebar';
import IngresarHotel from './pages/IngresarHotel';
import IngresarHabitaciones from './pages/IngresarHabitaciones';
import Login from './pages/login';

function App() {
  return (
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <BrowserRouter>
        <Box sx={{ display: 'flex' }}>
          <Sidebar />
          <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
            <Routes>
              <Route path="/ingresar-hotel" element={<IngresarHotel />} />
              <Route path="/ingresar-habitaciones" element={<IngresarHabitaciones />} />
              <Route path="/login" element={<Login />} />
            </Routes>
          </Box>
        </Box>
      </BrowserRouter>
    </ThemeProvider>
  );
}

export default App;
