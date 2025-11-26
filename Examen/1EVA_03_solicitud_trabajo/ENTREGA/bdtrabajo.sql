-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS bdtrabajo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Usar la base de datos
USE bdtrabajo;


-- Crear la tabla de solicitudes de trabajo
CREATE TABLE solicitudes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    direccion TEXT,
    puesto_solicitado ENUM('desarrollador_web', 'disenador_ux', 'marketing_digital', 'atencion_cliente', 'administrativo', 'gerente_proyectos', 'otro') NOT NULL,
    experiencia ENUM('0-1', '1-3', '3-5', '5-10', '10+') NOT NULL,
    educacion ENUM('secundaria', 'tecnico', 'pregrado', 'posgrado', 'doctorado') NOT NULL,
    estado ENUM('pendiente', 'revisando', 'entrevista', 'contratado', 'rechazado') DEFAULT 'pendiente',
    fecha_solicitud TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Índices para mejorar el rendimiento
    INDEX idx_email (email),
    INDEX idx_puesto (puesto_solicitado),
    INDEX idx_estado (estado),
    INDEX idx_fecha_solicitud (fecha_solicitud),
    INDEX idx_experiencia (experiencia)
    
);

-- Insertar datos de ejemplo
INSERT INTO solicitudes (
    nombre, 
    apellidos, 
    telefono, 
    email, 
    direccion, 
    puesto_solicitado, 
    experiencia, 
    educacion,
    estado
) VALUES 
(
    'Ana',
    'García Martínez',
    '+34 611 223 344',
    'ana.garcia@email.com',
    'Calle Principal 123, Madrid',
    'desarrollador_web',
    '3-5',
    'pregrado',
    'revisando'
),
(
    'Carlos',
    'Rodríguez López',
    '+34 622 334 455',
    'carlos.rodriguez@empresa.com',
    'Avenida Central 45, Barcelona',
    'disenador_ux',
    '1-3',
    'pregrado',
    'entrevista'
),
(
    'María',
    'Sánchez Pérez',
    '+34 633 445 566',
    'maria.sanchez@hotmail.com',
    'Plaza Mayor 67, Valencia',
    'marketing_digital',
    '5-10',
    'posgrado',
    'pendiente'
),
(
    'Javier',
    'Martín Fernández',
    '+34 644 556 677',
    'javier.martin@gmail.com',
    'Calle Secundaria 89, Sevilla',
    'gerente_proyectos',
    '10+',
    'posgrado',
    'contratado'
),
(
    'Laura',
    'Díaz González',
    '+34 655 667 788',
    'laura.diaz@yahoo.com',
    'Avenida Norte 12, Bilbao',
    'atencion_cliente',
    '0-1',
    'secundaria',
    'rechazado'
),
(
    'David',
    'Torres Ruiz',
    '+34 666 777 888',
    'david.torres@outlook.com',
    'Calle Sur 34, Málaga',
    'administrativo',
    '1-3',
    'tecnico',
    'pendiente'
),
(
    'Elena',
    'Castro Jiménez',
    '+34 677 888 999',
    'elena.castro@universidad.edu',
    'Paseo Marítimo 56, Alicante',
    'desarrollador_web',
    '3-5',
    'pregrado',
    'revisando'
),
(
    'Pedro',
    'Navarro Silva',
    '+34 688 999 000',
    'pedro.navarro@empresa.com',
    'Calle Jardín 78, Zaragoza',
    'otro',
    '5-10',
    'doctorado',
    'entrevista'
);

-- Consultas de verificación
SELECT * FROM solicitudes ORDER BY fecha_solicitud DESC;

-- Consultas útiles para reportes de RRHH
SELECT 
    COUNT(*) as total_solicitudes,
    SUM(CASE WHEN estado = 'pendiente' THEN 1 ELSE 0 END) as pendientes,
    SUM(CASE WHEN estado = 'revisando' THEN 1 ELSE 0 END) as revisando,
    SUM(CASE WHEN estado = 'entrevista' THEN 1 ELSE 0 END) as entrevistas,
    SUM(CASE WHEN estado = 'contratado' THEN 1 ELSE 0 END) as contratados,
    SUM(CASE WHEN estado = 'rechazado' THEN 1 ELSE 0 END) as rechazados
FROM solicitudes;

-- Solicitudes por puesto
SELECT 
    CASE puesto_solicitado
        WHEN 'desarrollador_web' THEN 'Desarrollador Web'
        WHEN 'disenador_ux' THEN 'Diseñador UX/UI'
        WHEN 'marketing_digital' THEN 'Marketing Digital'
        WHEN 'atencion_cliente' THEN 'Atención al Cliente'
        WHEN 'administrativo' THEN 'Administrativo'
        WHEN 'gerente_proyectos' THEN 'Gerente de Proyectos'
        WHEN 'otro' THEN 'Otro'
    END as puesto,
    COUNT(*) as total_solicitudes,
    GROUP_CONCAT(estado) as estados
FROM solicitudes 
GROUP BY puesto_solicitado 
ORDER BY total_solicitudes DESC;

-- Perfil educativo de los candidatos
SELECT 
    CASE educacion
        WHEN 'secundaria' THEN 'Secundaria'
        WHEN 'tecnico' THEN 'Técnico/Tecnólogo'
        WHEN 'pregrado' THEN 'Pregrado/Universidad'
        WHEN 'posgrado' THEN 'Posgrado/Maestría'
        WHEN 'doctorado' THEN 'Doctorado'
    END as nivel_educativo,
    COUNT(*) as total_candidatos,
    ROUND((COUNT(*) * 100.0 / (SELECT COUNT(*) FROM solicitudes)), 2) as porcentaje
FROM solicitudes 
GROUP BY educacion 
ORDER BY FIELD(educacion, 'doctorado', 'posgrado', 'pregrado', 'tecnico', 'secundaria');

-- Candidatos para entrevista
SELECT 
    CONCAT(nombre, ' ', apellidos) as candidato,
    email,
    telefono,
    CASE puesto_solicitado
        WHEN 'desarrollador_web' THEN 'Desarrollador Web'
        WHEN 'disenador_ux' THEN 'Diseñador UX/UI'
        WHEN 'marketing_digital' THEN 'Marketing Digital'
        WHEN 'atencion_cliente' THEN 'Atención al Cliente'
        WHEN 'administrativo' THEN 'Administrativo'
        WHEN 'gerente_proyectos' THEN 'Gerente de Proyectos'
        WHEN 'otro' THEN 'Otro'
    END as puesto,
    experiencia,
    educacion
FROM solicitudes 
WHERE estado IN ('entrevista', 'revisando')
ORDER BY fecha_solicitud;


