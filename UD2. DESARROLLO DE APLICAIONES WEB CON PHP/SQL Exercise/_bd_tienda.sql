-- Eliminar base de datos si existe
DROP DATABASE IF EXISTS tienda;

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS tienda DEFAULT CHARACTER SET utf8mb4;
USE tienda;


-- Mostrar mensaje de confirmación
SELECT 'BD creada' AS mensaje;

COMMIT;

