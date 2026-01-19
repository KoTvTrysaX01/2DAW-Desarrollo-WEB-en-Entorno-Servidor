
-- Insertar datos de vehículos
INSERT INTO vehiculos (id, matricula, tipo, capacidad_carga) VALUES
(1,'8765XYZ', 'Tráiler', 24000.00),
(2,'5432ABC', 'Camión rígido', 12000.00),
(3,'1234DEF', 'Camión cisterna', 18000.00),
(4,'7890GHI', 'Furgoneta grande', 3500.00),
(5,'2468JKL', 'Tráiler refrigerado', 22000.00),
(6,'1357MNO', 'Camión volquete', 15000.00);

ALTER TABLE vehiculos ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM vehiculos);


-- Insertar datos de transportistas
INSERT INTO transportistas (id, nombre, tipo_licencia, experiencia, vehiculo_id) VALUES
(1, 'Miguel Ángel Torres', 'C+E', 15, 1),
(2, 'Sarah Chen', 'C', 8, 2),
(3, 'Antonio Rossi', 'C+E', 22, 3),
(4 ,'Elena Petrov', 'C', 6, 4),
(5, 'Carlos Mendoza', 'C+E', 18, 5),
(6, 'Olga Nowak', 'C', 11, 6);


ALTER TABLE transportistas ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM transportistas);

