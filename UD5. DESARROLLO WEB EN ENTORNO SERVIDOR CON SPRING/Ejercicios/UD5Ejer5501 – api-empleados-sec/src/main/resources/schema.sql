
CREATE TABLE IF NOT EXISTS empleados (
	id  	BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre 	VARCHAR(50) UNIQUE NOT NULL,
	dep 	VARCHAR(20) NOT NULL,
	email 	VARCHAR(60) UNIQUE NOT NULL,
	edad 	INT NOT NULL
);


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