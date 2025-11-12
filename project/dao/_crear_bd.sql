-- Crear la base de datos si no existe


CREATE DATABASE IF NOT EXISTS helado_express DEFAULT CHARACTER SET utf8mb4;
USE helado_express;

COMMIT;


-- IF NOT EXISTS(SELECT * FROM sys.databases WHERE name = 'helado_express')
-- BEGIN
-- CREATE DATABASE 'helado_express'


-- END
-- GO
--     USE 'helado_express'
-- GO