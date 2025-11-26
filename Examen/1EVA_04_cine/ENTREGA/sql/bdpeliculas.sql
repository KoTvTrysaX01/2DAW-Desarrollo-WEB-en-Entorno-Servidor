-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS bdpeliculas CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE bdpeliculas;

-- Crear la tabla de películas con más restricciones
CREATE TABLE peliculas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    posicion INT NOT NULL UNIQUE,
    titulo VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL,
    anio INT NOT NULL CHECK (anio >= 1900 AND anio <= 2100),
    genero VARCHAR(100) NOT NULL,
    duracion_minutos INT NOT NULL, -- En minutos para facilitar consultas
    duracion VARCHAR(20) NOT NULL, -- Formato display "166 min"
    rating DECIMAL(3,1) NOT NULL CHECK (rating >= 0 AND rating <= 10),
    premios VARCHAR(100) NOT NULL,
    poster VARCHAR(10) NOT NULL,
    oscar_winner BOOLEAN DEFAULT FALSE,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_anio (anio),
    INDEX idx_genero (genero),
    INDEX idx_rating (rating)
);

-- Insertar los datos de las películas (versión con duración en minutos)
INSERT INTO peliculas (posicion, titulo, director, anio, genero, duracion_minutos, duracion, rating, premios, poster, oscar_winner) VALUES
(1, 'Dune: Parte Dos', 'Denis Villeneuve', 2024, 'Ciencia Ficción', 166, '166 min', 8.9, '6 Oscars', 'DUNE', TRUE),
(2, 'Oppenheimer', 'Christopher Nolan', 2023, 'Drama Histórico', 180, '180 min', 9.1, '7 Oscars', 'OPP', TRUE),
(3, 'El hombre de agua', 'Guillermo del Toro', 2023, 'Drama Fantástico', 119, '119 min', 8.2, '4 Oscars', 'AQ', TRUE),
(4, 'Todo en todas lados al mismo tiempo', 'Daniel Kwan, Daniel Scheinert', 2022, 'Acción/Ciencia Ficción', 139, '139 min', 8.7, '7 Oscars', 'EEAAO', TRUE),
(5, 'Dune', 'Denis Villeneuve', 2021, 'Ciencia Ficción', 155, '155 min', 8.3, '6 Oscars', 'DUNE', TRUE),
(6, 'Parásitos', 'Bong Joon-ho', 2019, 'Drama/Thriller', 132, '132 min', 9.2, '4 Oscars', 'P', TRUE),
(7, 'Midsommar: El terror no espera la noche', 'Ari Aster', 2019, 'Drama/Terror', 148, '148 min', 7.9, 'Nominada', 'M', FALSE);

-- Consultas de ejemplo
SELECT * FROM peliculas ORDER BY rating DESC;

SELECT titulo, anio, rating FROM peliculas WHERE oscar_winner = TRUE;

SELECT genero, COUNT(*) as total_peliculas FROM peliculas GROUP BY genero;
