-- Crear tabla hoteles
CREATE TABLE hoteles (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    direccion VARCHAR(255),
    ciudad VARCHAR(255),
    nit VARCHAR(255),
    num_habitaciones INTEGER,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla habitaciones
CREATE TABLE habitaciones (
    id SERIAL PRIMARY KEY,
    hotel_id INTEGER REFERENCES hoteles(id) ON DELETE CASCADE,
    tipo VARCHAR(255),
    acomodacion VARCHAR(255),
    cantidad INTEGER,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (tipo, acomodacion)
);

-- Insertar hoteles de prueba
INSERT INTO hoteles (nombre, direccion, ciudad, nit, num_habitaciones)
VALUES 
  ('DECAMERON CARTAGENA', 'CALLE 23 58-25', 'CARTAGENA', '12345678-9', 42);

-- Insertar habitaciones para Decameron Cartagena
INSERT INTO habitaciones (hotel_id, tipo, acomodacion, cantidad)
VALUES
  (1, 'ESTANDAR', 'SENCILLA', 25),
  (1, 'JUNIOR', 'TRIPLE', 12),
  (1, 'ESTANDAR', 'DOBLE', 5);
