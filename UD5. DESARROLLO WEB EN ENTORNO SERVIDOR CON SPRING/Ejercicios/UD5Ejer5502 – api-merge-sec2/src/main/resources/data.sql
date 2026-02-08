
INSERT INTO users_security (id,username, email, password, administrador, usuario, invitado, activado) VALUES
(1,'admin', 'admin@balmis.com', '$2a$10$fzcGgF.8xODz7ptkmZC.OeX1Kj5GDI//FhW2sG0vlshW6ZAKJky0e', true,  true,  false, true), -- password: 5678
(2,'user',  'user@balmis.com',  '$2a$10$ayw3FCBIkupFt5n9lrmJQe9XZMJhZiNCjaoOkXo/Ba0KZgymO01ce', false, true,  false, true), -- password: 1234
(3,'guest', 'guest@balmis.com', '$2a$10$ayw3FCBIkupFt5n9lrmJQe9XZMJhZiNCjaoOkXo/Ba0KZgymO01ce', false, false, true,  true); -- password: 1234
 
-- '$2a$10$n1/e13.wUb0ESrCxjZUNsunO4h/Go9QH1/25co1Scd6DQx1O51/KC' ==>  password: password
-- '$2a$10$APUnUaXbTtPf8AjQqzeHAOTzTw.wFUimrqrSn33dKD6hrO4JR.jcu' ==> password: admin

ALTER TABLE users_security ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM users_security);


-- Insertar productos de ejemplo
INSERT INTO productos (id, descrip, precio) VALUES
    (1,'Laptop HP Pavilion', 899.99),
    (2,'Smartphone Samsung Galaxy S23', 799.99),
    (3,'Auriculares Sony WH-1000XM5', 349.99),
    (4,'Teclado Mecánico Logitech', 129.99),
    (5,'Monitor LG 27" 4K', 499.99);

ALTER TABLE productos ALTER COLUMN id RESTART WITH (SELECT COALESCE(MAX(id), 0) + 1 FROM productos);