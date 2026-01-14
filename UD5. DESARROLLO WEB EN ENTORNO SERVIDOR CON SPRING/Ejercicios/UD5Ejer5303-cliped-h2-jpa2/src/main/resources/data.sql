-- Insertar datos en Clientes
INSERT INTO Clientes (id, nombre, email, telefono, direccion) VALUES
(1, 'Juan Pérez', 'juan@example.com', '555-0101', 'Calle Falsa 123'),
(2, 'María Gómez', 'maria@example.com', '555-0102', 'Avenida Siempreviva 742'),
(3, 'Carlos López', 'carlos@example.com', '555-0103', 'Boulevard de los Sueños Rotos 4'),
(4, 'Ana Torres', 'ana@example.com', '555-0104', 'Plaza Mayor 12'),
(5, 'Luis Fernández', 'luis@example.com', '555-0105', 'Calle del Trabajo 15');


-- Insertar datos en Pedidos
INSERT INTO Pedidos (id, cliente_id, fecha, producto, cantidad) VALUES
(1, 1, '2025-01-15', 'Laptop', 1),
(2, 1, '2025-01-16', 'Teléfono', 2),
(3, 1, '2025-01-17', 'Tablet', 1),
(4, 2, '2025-01-18', 'Monitor', 1),
(5, 2, '2025-01-19', 'Teclado', 3),
(6, 3, '2025-01-20', 'Ratón', 2),
(7, 3, '2025-01-21', 'Impresora', 1),
(8, 4, '2025-01-22', 'Auriculares', 5),
(9, 4, '2025-01-23', 'Cámara', 1),
(10, 1, '2025-01-24', 'Proyector', 1),
(11, 2, '2025-01-25', 'USB', 10),
(12, 5, '2025-01-26', 'Batería Externa', 1),
(13, 5, '2025-01-27', 'Cable HDMI', 2),
(14, 3, '2025-01-28', 'Altavoz', 1),
(15, 4, '2025-01-29', 'Laptop', 1),
(16, 1, '2025-01-30', 'Teléfono', 1),
(17, 2, '2025-02-01', 'Tablet', 4),
(18, 3, '2025-02-02', 'Monitor', 1),
(19, 4, '2025-02-03', 'Teclado', 1),
(20, 5, '2025-02-04', 'Ratón', 3),
(21, 1, '2025-02-05', 'Cámara', 1);

