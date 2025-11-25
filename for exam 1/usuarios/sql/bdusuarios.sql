-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS sistema_usuarios CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE sistema_usuarios;

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    rol ENUM('Administrador', 'Editor', 'Moderador', 'Usuario', 'Invitado') NOT NULL,
    estado ENUM('activo', 'inactivo') NOT NULL DEFAULT 'activo',
    fecha_registro DATE NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Crear índices para mejorar el rendimiento
CREATE INDEX idx_email ON usuarios(email);
CREATE INDEX idx_rol ON usuarios(rol);
CREATE INDEX idx_estado ON usuarios(estado);
CREATE INDEX idx_fecha_registro ON usuarios(fecha_registro);

-- Insertar los datos de usuarios
INSERT INTO usuarios (id, nombre, email, rol, estado, fecha_registro) VALUES
(1, 'Maria Garcia', 'maria.garcia@email.com', 'Administrador', 'activo', STR_TO_DATE('15/01/2024', '%d/%m/%Y')),
(2, 'Carlos Lopez', 'carlos.lopez@email.com', 'Editor', 'activo', STR_TO_DATE('20/01/2024', '%d/%m/%Y')),
(3, 'Ana Martinez', 'ana.martinez@email.com', 'Usuario', 'inactivo', STR_TO_DATE('10/01/2024', '%d/%m/%Y')),
(4, 'Pedro Ramos', 'pedro.ramos@email.com', 'Moderador', 'activo', STR_TO_DATE('25/01/2024', '%d/%m/%Y')),
(5, 'Laura Torres', 'laura.torres@email.com', 'Invitado', 'inactivo', STR_TO_DATE('05/01/2024', '%d/%m/%Y')),
(6, 'Javier Mendez', 'javier.mendez@email.com', 'Administrador', 'activo', STR_TO_DATE('18/01/2024', '%d/%m/%Y')),
(7, 'Sofia Castro', 'sofia.castro@email.com', 'Editor', 'inactivo', STR_TO_DATE('12/01/2024', '%d/%m/%Y'));

INSERT INTO usuarios (id, nombre, email, rol, estado, fecha_registro) VALUES
(8, 'Roberto Silva', 'roberto.silva@email.com', 'Moderador', 'activo', STR_TO_DATE('30/01/2024', '%d/%m/%Y')),
(9, 'Elena Vargas', 'elena.vargas@email.com', 'Editor', 'activo', STR_TO_DATE('22/01/2024', '%d/%m/%Y')),
(10, 'Miguel Angel Reyes', 'miguel.reyes@email.com', 'Usuario', 'activo', STR_TO_DATE('08/02/2024', '%d/%m/%Y')),
(11, 'Carmen Diaz', 'carmen.diaz@email.com', 'Usuario', 'inactivo', STR_TO_DATE('14/01/2024', '%d/%m/%Y')),
(12, 'Diego Fernandez', 'diego.fernandez@email.com', 'Moderador', 'activo', STR_TO_DATE('03/02/2024', '%d/%m/%Y')),
(13, 'Isabel Ortega', 'isabel.ortega@email.com', 'Administrador', 'activo', STR_TO_DATE('28/01/2024', '%d/%m/%Y')),
(14, 'Fernando Castro', 'fernando.castro@email.com', 'Invitado', 'inactivo', STR_TO_DATE('17/01/2024', '%d/%m/%Y')),
(15, 'Patricia Morales', 'patricia.morales@email.com', 'Editor', 'activo', STR_TO_DATE('11/02/2024', '%d/%m/%Y')),
(16, 'Ricardo Juarez', 'ricardo.juarez@email.com', 'Usuario', 'activo', STR_TO_DATE('05/02/2024', '%d/%m/%Y')),
(17, 'Gabriela Rios', 'gabriela.rios@email.com', 'Moderador', 'inactivo', STR_TO_DATE('19/01/2024', '%d/%m/%Y')),
(18, 'Oscar Mendoza', 'oscar.mendoza@email.com', 'Administrador', 'activo', STR_TO_DATE('25/02/2024', '%d/%m/%Y')),
(19, 'Lucia Herrera', 'lucia.herrera@email.com', 'Usuario', 'activo', STR_TO_DATE('09/02/2024', '%d/%m/%Y')),
(20, 'Santiago Perez', 'santiago.perez@email.com', 'Invitado', 'activo', STR_TO_DATE('15/02/2024', '%d/%m/%Y'));

-- Consulta para verificar los datos insertados
SELECT 
    id,
    nombre,
    email,
    rol,
    estado,
    DATE_FORMAT(fecha_registro, '%d/%m/%Y') as fecha_registro,
    fecha_creacion
FROM usuarios 
ORDER BY id;

-- Consultas útiles adicionales
-- Cantidad de usuarios por rol
SELECT rol, COUNT(*) as total_usuarios 
FROM usuarios 
GROUP BY rol 
ORDER BY total_usuarios DESC;

-- Usuarios activos
SELECT nombre, email, rol, DATE_FORMAT(fecha_registro, '%d/%m/%Y') as fecha_registro
FROM usuarios 
WHERE estado = 'activo'
ORDER BY nombre;

-- Usuarios inactivos
SELECT nombre, email, rol, DATE_FORMAT(fecha_registro, '%d/%m/%Y') as fecha_registro
FROM usuarios 
WHERE estado = 'inactivo'
ORDER BY nombre;

-- Resumen general
SELECT 
    COUNT(*) as total_usuarios,
    SUM(CASE WHEN estado = 'activo' THEN 1 ELSE 0 END) as usuarios_activos,
    SUM(CASE WHEN estado = 'inactivo' THEN 1 ELSE 0 END) as usuarios_inactivos,
    MIN(fecha_registro) as fecha_primer_registro,
    MAX(fecha_registro) as fecha_ultimo_registro
FROM usuarios;