-- Eliminar base de datos si existe
DROP DATABASE IF EXISTS daw_tienda;

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS daw_tienda DEFAULT CHARACTER SET utf8mb4;
USE daw_tienda;


-- Mostrar mensaje de confirmación
SELECT 'BD creada' AS mensaje;

COMMIT;

