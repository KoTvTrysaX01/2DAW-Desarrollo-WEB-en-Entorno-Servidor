
INSERT INTO frutas (id,nombre, kg, precio) VALUES
(1,'platano', 10, 1.45),
(2,'pera', 15, 2.19),
(3,'manzana', 20, 1.95);

ALTER TABLE frutas ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM frutas);

