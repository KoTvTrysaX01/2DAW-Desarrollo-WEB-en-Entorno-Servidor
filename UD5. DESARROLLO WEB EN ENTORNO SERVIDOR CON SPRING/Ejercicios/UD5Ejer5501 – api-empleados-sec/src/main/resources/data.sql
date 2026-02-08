
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



INSERT INTO users_security (id,username, email, password, administrador, usuario, invitado, activado) VALUES
(1,'admin', 'admin@balmis.com', '$2a$10$fzcGgF.8xODz7ptkmZC.OeX1Kj5GDI//FhW2sG0vlshW6ZAKJky0e', true,  true,  false, true), -- password: 5678
(2,'user',  'user@balmis.com',  '$2a$10$ayw3FCBIkupFt5n9lrmJQe9XZMJhZiNCjaoOkXo/Ba0KZgymO01ce', false, true,  false, true), -- password: 1234
(3,'guest', 'guest@balmis.com', '$2a$10$ayw3FCBIkupFt5n9lrmJQe9XZMJhZiNCjaoOkXo/Ba0KZgymO01ce', false, false, true,  true); -- password: 1234
 
-- '$2a$10$n1/e13.wUb0ESrCxjZUNsunO4h/Go9QH1/25co1Scd6DQx1O51/KC' ==>  password: password
-- '$2a$10$APUnUaXbTtPf8AjQqzeHAOTzTw.wFUimrqrSn33dKD6hrO4JR.jcu' ==> password: admin

ALTER TABLE users_security ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM users_security);
