

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id 		BIGINT PRIMARY KEY AUTO_INCREMENT,
    descrip     VARCHAR(100) NOT NULL,
    precio 	DECIMAL(10,2) NOT NULL
);


-- TABLAS PARA SPRING SECURIRY
CREATE TABLE IF NOT EXISTS users_security (
    id              BIGINT PRIMARY KEY AUTO_INCREMENT,
    username        VARCHAR(50) NOT NULL,
    email           VARCHAR(100) NOT NULL,
    password        VARCHAR(200) NOT NULL,
    administrador   BOOLEAN NOT NULL,
    usuario         BOOLEAN NOT NULL,
    invitado        BOOLEAN NOT NULL,
    activado        BOOLEAN NOT NULL
);

