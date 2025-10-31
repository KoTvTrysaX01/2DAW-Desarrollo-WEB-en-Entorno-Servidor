-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL
);

-- Eliminar datos si existen
DELETE FROM usuarios;

-- Insertar todas la usuarios
INSERT INTO usuarios (nombre, categoria) VALUES

("vadim", "Administrador"),
("admin", "Administrador"),
("Reis", "Administrador"),
("user", "Usuario"),
("guest", "Usuario");

-- Mostrar mensaje de confirmación
-- SELECT 'Tabla creada y datos insertados correctamente' AS mensaje;
COMMIT;

