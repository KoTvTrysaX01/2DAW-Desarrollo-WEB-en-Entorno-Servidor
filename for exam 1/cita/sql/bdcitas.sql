-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS bdcitas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Usar la base de datos
USE bdcitas;

-- Crear la tabla para almacenar las citas
CREATE TABLE IF NOT EXISTS citas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_completo VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    fecha_cita DATE NOT NULL,
    hora_cita TIME NOT NULL,
    observaciones TEXT,
    estado ENUM('pendiente', 'confirmada', 'cancelada') DEFAULT 'pendiente',
    fecha_solicitud TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Crear un índice para búsquedas por fecha
CREATE INDEX idx_fecha_cita ON citas(fecha_cita);

-- Crear un índice para búsquedas por teléfono
CREATE INDEX idx_telefono ON citas(telefono);

-- Opcional: Insertar algunos datos de ejemplo
INSERT INTO citas (nombre_completo, telefono, email, fecha_cita, hora_cita, observaciones) VALUES
('María González Pérez', '+34 612 345 678', 'maria.gonzalez@email.com', '2024-02-15', '10:00:00', 'Limpieza dental y revisión general'),
('Carlos Rodríguez López', '+34 623 456 789', 'carlos.rodriguez@email.com', '2024-02-16', '11:30:00', 'Dolor en muela del juicio'),
('Ana Martínez Sánchez', '+34 634 567 890', NULL, '2024-02-17', '09:00:00', 'Blanqueamiento dental');

-- Consulta para verificar que todo funciona
SELECT * FROM citas;