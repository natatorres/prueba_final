import Drawer from '@mui/material/Drawer';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import HotelIcon from '@mui/icons-material/Hotel';
import MeetingRoomIcon from '@mui/icons-material/MeetingRoom';
import LoginIcon from '@mui/icons-material/Login';
import { NavLink } from 'react-router-dom';

const drawerWidth = 240;

export default function Sidebar() {
  const items = [
    { text: 'Ingresar Hotel', icon: <HotelIcon />, to: '/ingresar-hotel' },
    { text: 'Ingresar Habitaciones', icon: <MeetingRoomIcon />, to: '/ingresar-habitaciones' },
    { text: 'Login', icon: <LoginIcon />, to: '/login' },
  ];

  return (
    <Drawer
      variant="permanent"
      sx={{
        width: drawerWidth,
        flexShrink: 0,
        '& .MuiDrawer-paper': { width: drawerWidth, boxSizing: 'border-box' },
      }}
    >
      <List>
        {items.map(({ text, icon, to }) => (
          <ListItem
            button
            key={text}
            component={NavLink}
            to={to}
            style={({ isActive }) => ({
              backgroundColor: isActive ? '#F39C12' : 'transparent',
              color: isActive ? '#fff' : undefined,
            })}
          >
            <ListItemIcon sx={{ color: 'inherit' }}>{icon}</ListItemIcon>
            <ListItemText primary={text} />
          </ListItem>
        ))}
      </List>
    </Drawer>
  );
}
