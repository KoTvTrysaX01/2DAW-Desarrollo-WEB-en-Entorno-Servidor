-- Crear la tabla electronica
CREATE TABLE IF NOT EXISTS electronica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    precio DECIMAL(4, 2) NOT NULL,
    fabricante VARCHAR(50) NOT NULL,
    stock BOOLEAN NOT NULL
);

-- Eliminar datos si existen
DELETE FROM electronica;

-- Insertar todas la electronica
INSERT INTO electronica (nombre, categoria, precio, fabricante, stock) VALUES

-- GPU
("RX 9070 XT", "Tarjeta Gráphica", 649.99, "Gygabyte", true),
("RX 9060 XT", "Tarjeta Gráphica", 440.00, "Asus", false),
("RTX 5070 Ti", "Tarjeta Gráphica", 849.99, "MSI", false),
("RTX 5060", "Tarjeta Gráphica", 349.00, "Palit", true),
("Arc B580", "Tarjeta Gráphica", 320.00, "ASRock", true),
("Arc A750", "Tarjeta Gráphica", 270.00, "Intel", false),

-- CPU
("Ryzen 7700X", "CPU", 300.99, "AMD", true),
("Ryzen 7600X", "CPU", 230.00, "AMD", false),
("i5 12400F", "CPU", 200.99, "Intel", false),
("i3 12100F", "CPU", 110.00, "Intel", true),
("Ryzen 7 9800X3D", "CPU", 449.00, "AMD", true),
("i9 14900K", "CPU", 480.99, "Intel", false),

-- RAM
("DDR4 8x2 GB", "RAM", 99,99, "Corsair", false),
("DDR5 16x1 GB", "RAM", 90,50, "G.Skil", true),
("DDR4 8x1 GB", "RAM", 85,00, "Kingston", false),
("DDR5 32x1 GB", "RAM", 130,00, "Silicon Power", false),
("DDR3 4x2 GB", "RAM", 79,99, "Toshiba", true),
("DDR4 8x4 GB", "RAM", 129,00, "Samsung", true),

-- Cajas
("ATX Full Tower", "Caja", 85,99, "Corsair", true),
("ATX Mid Tower", "Caja", 77,50, "Fractal Design", false),
("MicroATX Mini Tower", "Caja", 109,00, "Lian Li", false),
("MicroATX Mid Tower", "Caja", 120,00, "Mars", true),
("ATX Mid Tower", "Caja", 150,99, "Montech", true),
("ATX Full Tower", "Caja", 100,00, "NZXT", true),

-- Fuentes de Alimentación
("ATX 80+ Titanium", "PSU", 185,99, "Asus", true),
("Flex ATX 80+ Platinum", "PSU", 159,50, "be quiet!", false),
("SFX 80+ Gold", "PSU", 100,00, "Corsair", false),
("Mini ITX 80+ Bronze", "PSU", 90,00, "MSI", true),
("SFX 80+ Titanium", "PSU", 120,99, "Thermaltake", true),
("TFX 80+ Gold", "PSU", 130,00, "Corsair", true),

-- Placas bases
("AMD B550", "Placa Base", 175,99, "Asus", true),
("AMD B650", "Placa Base", 159,50, "ASRock", false),
("AMD X870", "Placa Base", 120,00, "MSI", false),
("Intel B760M", "Placa Base", 190,00, "Gigabyte", true),
("Intel Z790", "Placa Base", 130,99, "Zotac", true),
("Intel 610M", "Placa Base", 80,99, "NZXT", true);
-- Mostrar mensaje de confirmación
-- SELECT 'Tabla creada y datos insertados correctamente' AS mensaje;
COMMIT;

