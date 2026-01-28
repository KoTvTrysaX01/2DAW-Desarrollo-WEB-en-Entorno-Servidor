
--
-- TABLA vehiculos
--
CREATE TABLE IF NOT EXISTS vehiculos (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    matricula       VARCHAR(10) UNIQUE NOT NULL,
    tipo            VARCHAR(50) NOT NULL,
    capacidad_carga DOUBLE NOT NULL
);

--
-- TABLA transportistas
--
CREATE TABLE IF NOT EXISTS transportistas (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nombre          VARCHAR(100) UNIQUE NOT NULL,
    tipo_licencia   VARCHAR(10) NOT NULL,
    experiencia     INT NOT NULL,
    vehiculo_id     INT,
    FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id) ON DELETE SET NULL
);