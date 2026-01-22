
INSERT INTO empleados (id, nombre, dep, email, edad) VALUES
(1, 'Claresta', 'Ventas', 'cwiles0@ning.com', 38),
(2, 'Malinde', 'Ventas', 'mabrahamowitcz1@paypal.or', 30),
(3, 'Lauri', 'Compras', 'lharwood2@bluehost.com', 47),
(4, 'Richie', 'Facturación', 'roxlee3@chronoengine.org', 48),
(5, 'Monti', 'Compras', 'mcraigheid4@bandcamp.com', 31),
(6, 'Rosabel', 'Ventas', 'rverrills5@java.com', 26),
(7, 'Caresa', 'Ventas', 'cterrans6@bravesites.com', 53),
(8, 'Brendis', 'Facturación', 'bburchfield7@cnbc.com', 37),
(9, 'Almeta', 'Compras', 'alow8@dyndns.org', 52),
(10, 'Berkeley', 'Ventas', 'bdacey9@wiley.com', 33);

ALTER TABLE empleados ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM empleados);

