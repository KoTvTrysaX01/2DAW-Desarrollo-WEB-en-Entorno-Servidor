USE helado_express;

-- Crear la tabla ice_bars
CREATE TABLE IF NOT EXISTS
    ice_bars (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        descripcion VARCHAR(300) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        attributes VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM ice_bars;

-- Insertar todas la ice_bars
INSERT INTO
    ice_bars (
        nombre,
        precio,
        descripcion,
        imagen,
        attributes,
        stock
    )
VALUES
    (
        "Strawberry",
        3.00,
        "Ice pop made with fresh strawberries from our region.",
        "./assets/ice_bars/Strawberry.png",
        "berries",
        true
    ),
    (
        "Lemon",
        2.99,
        "Ice pop made with freshly squeezed lemon juice.",
        "./assets/ice_bars/Lemon.png",
        "fruits",
        false
    ),
    (
        "Passion Fruit",
        3.45,
        "Fresh passion fruit ice_creams.",
        "./assets/ice_bars/Passion_Fruit.png",
        "fruits",
        true
    ),
    (
        "Mango",
        1.99,
        "Fresh mango ice_creams.",
        "./assets/ice_bars/Mango.png",
        "fruits",
        true
    ),
    (
        "King Nero",
        4.49,
        "Ice pop made of hazelnuts with hazelnut, chocolate and wafer swirls, developed exclusively for Lucciano's in Italy.",
        "./assets/ice_bars/King_Nero.png",
        "berries",
        true
    ),
    (
        "Cookies And Cream",
        3.45,
        "Ice pop made with whipped cream, with chocolate ganache and chocolate cookie swirls, decorated with stracciatella coated cookies.",
        "./assets/ice_bars/Cookies_And_Cream.png",
        "berries",
        false
    ),
    (
        "Mascarpone & Berries",
        3.00,
        "Ice pop made of Italian mascarpone with a Patagonian berry swirl.",
        "./assets/ice_bars/Mascarpone_&_Berries.png",
        "berries",
        false
    ),
    (
        "Peanut Without Added Sugar",
        4.49,
        "Peanut icepop without added sugar.",
        "./assets/ice_bars/Peanut_Without_Added_Sugar.png",
        "berries",
        true
    ),
    (
        "Strawberry & Whipped Cream",
        3.45,
        "Strawberry whipped cream ice pop, a perfect combination of texture and flavor.",
        "./assets/ice_bars/Strawberry_&_Whipped_Cream.png",
        "berries",
        false
    ),
    (
        "Whipped Cream",
        1.99,
        "Whipped cream ice pop, coated with semi- sweet Belgian chocolate and small pieces of caramelized peanuts.",
        "./assets/ice_bars/Whipped_Cream.png",
        "berries",
        true
    ),
    (
        "Crispy Dulce De Leche",
        3.00,
        "Milk caramel ice pop, coated with Belgian white chocolate and small pieces of caramelized peanuts.",
        "./assets/ice_bars/Crispy_Dulce_De_Leche.png",
        "berries",
        true
    ),
    (
        "Crispy Chocolate",
        2.99,
        "Lucciano’s chocolate ice pop, coated with semi-sweet Belgian chocolate with small pieces of caramelized peanuts.",
        "./assets/ice_bars/Crispy_Chocolate.png",
        "berries",
        true
    ),
    (
        "Fiore Strawberry",
        4.49,
        "Strawberry whipped cream ice pop, coated with pink tinted Belgian white chocolate. It is decorated with multicolored sprinkles and white chocolate eyes.",
        "./assets/ice_bars/Fiore_Strawberry.png",
        "berries",
        false
    ),
    (
        "Oli King",
        3.00,
        "King flavored ice pop, coated with Belgian white chocolate. The paws are decorated with a fine touch of stracciatella.",
        "./assets/ice_bars/Oli_King.png",
        "berries",
        false
    ),
    (
        "Smile King",
        1.99,
        "King flavored ice pop, coated with Belgian white and semi-sweet chocolate. The eyes are made with the same chocolate.",
        "./assets/ice_bars/Smile_King.png",
        "berries",
        true
    ),
    (
        "Passion Fruit Cheesecake",
        3.45,
        "Cheesecake icepop with swirls of passion fruit coated with white chocolate.",
        "./assets/ice_bars/Passion_Fruit_Cheesecake.png",
        "berries",
        true
    ),
    (
        "Red Berry Sorbet",
        2.99,
        "Red berry sorbet. Mix of blueberries, strawberries, raspberries and blackberries from Patagonia. Coated with white chocolate and decorated with purple lines.",
        "./assets/ice_bars/Red_Berry_Sorbet.png",
        "berries",
        false
    ),
    (
        "Pistacchio",
        4.49,
        "Pistacchio ice pop, a combination of the finest pistacchios from Bronte and Sicily, coated with a Belgian pistacchio-flavored white chocolate.",
        "./assets/ice_bars/Pistacchio.png",
        "berries",
        true
    ),
    (
        "Enzo Dulce De Leche & Gianduia",
        3.00,
        "Milk caramel ice pop with a gianduia chocolate filling, coated with Belgian white chocolate.",
        "./assets/ice_bars/Enzo_Dulce_De_Leche_&_Gianduia.png",
        "berries",
        false
    ),
    (
        "Tonio Cookies & Cream",
        1.99,
        "Whipped cream ice pop with cookies made in Italy for Lucciano’s and chocolate ganache swirls, coated with white chocolate. All decoration details are made by hand.",
        "./assets/ice_bars/Tonio_Cookies_&_Cream.png",
        "berries",
        true
    ),
    (
        "Minion",
        3.00,
        "King flavored ice pop, coated with Italian white chocolate of Belgian origin, tinted with the classic blue and yellow colors. Handmade eyes are used to add the perfect touch!",
        "./assets/ice_bars/Minion.png",
        "berries",
        true
    ),
    (
        "Dark Double Chocolate",
        2.99,
        "Chocolate ice_creams, double coated with Belgian white chocolate and milk chocolate, sealed with golden dust., double coated with Belgian white chocolate and milk chocolate, sealed with golden dust.",
        "./assets/ice_bars/Dark_Double_Chocolate.png",
        "berries",
        true
    ),
    (
        "White Double Chocolate",
        3.00,
        "White chocolate with milk chocolate swirls, double coated with Belgian white chocolate and milk chocolate.",
        "./assets/ice_bars/White_Double_Chocolate.png",
        "berries",
        false
    ),
    (
        "Icepop 0% Added Sugar",
        3.45,
        "Milk chocolate ice_creams covered with milk chocolate with no added sugar.",
        "./assets/ice_bars/Icepop_0_Added_Sugar.png",
        "berries",
        false
    ),
    (
        "Caramel Gold",
        3.00,
        "Caramel icepop coated with gold chocolate.",
        "./assets/ice_bars/Caramel_Gold.png",
        "berries",
        false
    ),
    (
        "Sorbet Supreme 80%",
        2.99,
        "Vegan 80% chocolate sorbet coated with the same chocolate.",
        "./assets/ice_bars/Sorbet_Supreme_80.png",
        "berries",
        true
    );

-- Crear la tabla ice_creams
CREATE TABLE IF NOT EXISTS
    ice_creams (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        old_price DECIMAL(4, 2),
        descripcion VARCHAR(300) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        attributes VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM ice_creams;

INSERT INTO
    ice_creams (
        nombre,
        precio,
        old_price,
        descripcion,
        imagen,
        attributes,
        stock
    )
VALUES
    (
        "Strawberry",
        3.00,
        4.00,
        "Made with fresh strawberries from our region.",
        "./assets/ice_creams/Strawberry.png",
        "berries, discount",
        true
    ),
    (
        "Mango",
        2.99,
        null,
        "Fresh mango ice-cream.",
        "./assets/ice_creams/Mango.png",
        "fruits",
        false
    ),
    (
        "Passion Fruit",
        3.45,
        null,
        "Fresh passion fruit ice-cream",
        "./assets/ice_creams/Passion_Fruit.png",
        "fruits",
        true
    ),
    (
        "Lime",
        1.99,
        2.50,
        "Gelato made with freshly sqeezed lime juice.",
        "./assets/ice_creams/Lime.png",
        "fruits, discount",
        true
    ),
    (
        "Coco Rock",
        4.49,
        null,
        "Malaysian coconut ice cream with white chocolate, crispy wafers and shredded coconut swirls.",
        "./assets/ice_creams/Coco_Rock.png",
        "fruits, white-chocolate",
        true
    ),
    (
        "Passion Fruit Cheesecake",
        3.45,
        4.00,
        "Cheesecake ice-cream with passion fruit marbling.",
        "./assets/ice_creams/Passion_Fruit_Cheesecake.png",
        "fruits, discount",
        false
    ),
    (
        "Lemon Pie",
        3.00,
        null,
        "We transformed the famous recipe into an incredible ice cream in its honor.",
        "./assets/ice_creams/Lemon_Pie.png",
        "fruits",
        false
    ),
    (
        "Mascarpone & Berries",
        4.49,
        5.00,
        "Exclusive recipe, made in Italy for Lucciano’s with mascarpone cheese combined with swirls of berries from the Argentine Patagonia.",
        "./assets/ice_creams/Mascarpone_&_Berries.png",
        "berries, discount",
        true
    ),
    (
        "Cookies & Cream",
        3.45,
        null,
        "Whipped cream ice-cream with cookie swirls, developed exclusively by Lucciano’s in Italy.",
        "./assets/ice_creams/Cookies_&_Cream.png",
        "white-chocolate, special",
        false
    ),
    (
        "Tiramisú",
        1.99,
        null,
        "Inspired by the classic Italian dessert with a super creamy mascarpone cheese. With Lucciano’s exclusive Italian cocoa powder and delicious pieces of vanilla sponge cake dipped in coffee liqueur syrup and Colombian coffee.",
        "./assets/ice_creams/Tiramisú.png",
        "special",
        true
    ),
    (
        "Cherry Vainilla",
        3.00,
        null,
        "Vainilla cream ice-cream with cherry marbling.",
        "./assets/ice_creams/Cherry_Vainilla.png",
        "berries",
        true
    ),
    (
        "White Chocolate Pistacchio Crock",
        2.99,
        null,
        "White chocolate cream ice-cream with crunchy italian pistacchio marbling.",
        "./assets/ice_creams/White_Chocolate_Pistacchio_Crock.png",
        "white-chocolate, nuts, special",
        true
    ),
    (
        "Nocciola Suprema",
        4.49,
        6.00,
        "Gelato made with top quality italian pure hazelnuts.",
        "./assets/ice_creams/Nocciola_Suprema.png",
        "chocolate, special, discount",
        false
    ),
    (
        "King Bueno",
        3.00,
        null,
        "Hazelnut ice-cream with hazelnut, chocolate and wafers swirls, exclusively developed for Lucciano’s in Italy.",
        "./assets/ice_creams/King_Bueno.png",
        "white-chocolate, nuts",
        false
    ),
    (
        "Lucciano's Chocolate Hazelnut",
        3.45,
        null,
        "Lucciano’s chocolate with a chocolate and hazelnut filling, developed exclusively by Lucciano’s in Italy.",
        "./assets/ice_creams/Lucciano's_Chocolate_Hazelnut.png",
        "chocolate, nuts",
        true
    ),
    (
        "Milk Caramel Chocolate Chip",
        2.99,
        null,
        "Milk caramel ice cream with semi-sweet Italian Stracciatella.",
        "./assets/ice_creams/Milk_Caramel_Chocolate_Chip.png",
        "caramel, chocolate, special",
        false
    ),
    (
        "Bombón Praline",
        3.00,
        null,
        "Gianduia ice-cream with swirls of gianduia cream with wafers and nocciola.",
        "./assets/ice_creams/Bombón_Praline.png",
        "chocolate, nuts",
        false
    ),
    (
        "Stracciatella",
        1.99,
        null,
        "Chantilly cream with swirls of belgium stracciatella.",
        "./assets/ice_creams/Stracciatella.png",
        "white-chocolate",
        true
    ),
    (
        "Sorbet Supreme 80%",
        3.00,
        null,
        "Vegan 80% chocolate sorbet.",
        "./assets/ice_creams/Sorbet_Supreme_80.png",
        "chocolate, special",
        true
    ),
    (
        "Banana Splite",
        2.99,
        null,
        "Made with fresh bananas, with belgian chocolate and milk caramel swirls.",
        "./assets/ice_creams/Banana_Splite.png",
        "fruits, white-chocolate",
        true
    ),
    (
        "Dulce De Leche",
        3.00,
        null,
        "Argentinean dulce de leche premium ice cream with swirls of dulce de leche, developed exclusively by Lucciano's in Italy.",
        "./assets/ice_creams/Dulce_De_Leche.png",
        "caramel, special",
        false
    ),
    (
        "Chocolate Dubai",
        3.45,
        3.99,
        "Belgian chocolate ice-cream with variegato layers that emulates the combination of pistachio and Kadayif, inspired by the famous Chocolate Dubai.",
        "./assets/ice_creams/Chocolate_Dubai.png",
        "chocolate, special, discount",
        false
    ),
    (
        "Pistacchio Cheesecake",
        3.00,
        null,
        "An irresistible Cheesecake ice-cream with a delicious Avella Pistacchio marbling and a crunchy touch of Pistacchio Crumble.",
        "./assets/ice_creams/Pistacchio_Cheesecake.png",
        "special, nuts",
        false
    );

-- Crear la tabla cookies
CREATE TABLE IF NOT EXISTS
    cookies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        descripcion VARCHAR(300) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM cookies;

INSERT INTO
    cookies (nombre, precio, descripcion, imagen, stock)
VALUES
    (
        "Caja Dark Chocolate 70%",
        4.99,
        "Descripción",
        "./assets/cookies/Caja_Dark_Chocolate_70.png",
        true
    ),
    (
        "Caja Mix Box",
        5.99,
        "Descripción",
        "./assets/cookies/Caja_Mix_Box.png",
        true
    ),
    (
        "Caja Semisweet",
        4.49,
        "Descripción",
        "./assets/cookies/Caja_Semisweet.png",
        true
    ),
    (
        "Caja White Chocolate",
        3.99,
        "Descripción",
        "./assets/cookies/Caja_White_Chocolate.png",
        true
    ),
    (
        "Caja White Chocolate & Walnut",
        5.49,
        "Descripción",
        "./assets/cookies/Caja_White_Chocolate_&_Walnut.png",
        true
    );

-- Crear la tabla chocolate
CREATE TABLE IF NOT EXISTS
    chocolates (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM chocolates;

INSERT INTO
    chocolates (nombre, precio, imagen, stock)
VALUES
    (
        "Chocolate 54% Con Avellanas",
        3.00,
        "./assets/chocolates/Chocolate_54_Con_Avellanas.png",
        true
    ),
    (
        "Chocolate Blanco",
        2.99,
        "./assets/chocolates/Chocolate_Blanco.png",
        false
    ),
    (
        "Chocolate Blanco Con Caramelo Y Avellanas",
        3.00,
        "./assets/chocolates/Chocolate_Blanco_Con_Caramelo_Y_Avellanas.png",
        false
    ),
    (
        "Chocolate Blanco Sin Azucar",
        3.45,
        "./assets/chocolates/Chocolate_Blanco_Sin_Azucar.png",
        true
    ),
    (
        "Chocolate Con Leche",
        1.99,
        "./assets/chocolates/Chocolate_Con_Leche.png",
        true
    ),
    (
        "Chocolate Con Leche Con Almendras",
        3.45,
        "./assets/chocolates/Chocolate_Con_Leche_Con_Almendras.png",
        false
    ),
    (
        "Chocolate Con Leche Con Avellanas",
        4.49,
        "./assets/chocolates/Chocolate_Con_Leche_Con_Avellanas.png",
        true
    ),
    (
        "Chocolate Con Leche Con Dulce De Leche",
        4.49,
        "./assets/chocolates/Chocolate_Con_Leche_Con_DDL.png",
        true
    ),
    (
        "Chocolate Con Leche Sin Azucar",
        3.45,
        "./assets/chocolates/Chocolate_Con_Leche_Sin_Azucar.png",
        false
    ),
    (
        "Chocolate Dark 70%",
        3.00,
        "./assets/chocolates/Chocolate_Dark_70.png",
        false
    ),
    (
        "Chocolate Fruto Del Bosque",
        4.49,
        "./assets/chocolates/Chocolate_Fruto_Del_Bosque.png",
        true
    ),
    (
        "Chocolate Pistacchio Caramelizado",
        3.45,
        "./assets/chocolates/Chocolate_Pistacchio_Caramelizado.png",
        false
    );

COMMIT;

-- Crear la tabla milkshakes
CREATE TABLE IF NOT EXISTS
    milkshakes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        descripcion VARCHAR(300) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM milkshakes;

INSERT INTO
    milkshakes (nombre, precio, descripcion, imagen, stock)
VALUES
    (
        "Bananalicious",
        1.99,
        "Add a tropical touch to your Horeca menu with our Bananalicious Milkshake. The combination of the smooth, sweet flavor of 100% natural banana with a delicate hint of vanilla makes it an irresistible choice for your customers.",
        "./assets/milkshakes/Bananalicious.png",
        true
    ),
    (
        "Cookies & Dreams",
        2.39,
        "Immerse yourself in a world of pure indulgence with Zumit's Frappé Cookies & Cream, a drink that promises to turn every sip into a moment of unforgettable pleasure.",
        "./assets/milkshakes/Cookies_&_Dreams.png",
        false
    ),
    (
        "Pure Chocolate",
        2.99,
        "Immerse yourself in an incomparable taste experience with Zumit's Mocha Frappé. An iced drink that combines the richness of dark chocolate, the intensity of coffee and the creaminess of milk, all in a perfectly balanced blend ready to enjoy in the blink of an eye.",
        "./assets/milkshakes/Pure_Chocolate.png",
        false
    ),
    (
        "Salted Caramel",
        4.59,
        "Embark on a journey of indulgence with Zumit's Frappé Salted Caramel, a delicious fusion of sweetness and a hint of salt that will take you to a new dimension of taste. ",
        "./assets/milkshakes/Salted_Caramel.png",
        true
    ),
    (
        "Smooth Mocha",
        2.99,
        "Immerse yourself in an incomparable taste experience with Zumit's Mocha Frappé. An iced drink that combines the richness of dark chocolate, the intensity of coffee and the creaminess of milk, all in a perfectly balanced blend ready to enjoy in the blink of an eye.",
        "./assets/milkshakes/Smooth_Mocha.png",
        false
    ),
    (
        "Strawberry Fantasy",
        3.99,
        "Zumit's Strawberry & Vanilla milkshake captures the essence of two classic flavours in a harmonious drink that promises to delight customers in any establishment.",
        "./assets/milkshakes/Strawberry_Fantasy.png",
        true
    );

COMMIT;

-- Crear la tabla juices
CREATE TABLE IF NOT EXISTS
    juices (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        descripcion VARCHAR(300) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM juices;

INSERT INTO
    juices (nombre, precio, descripcion, imagen, stock)
VALUES
    (
        "Zumo De Naranja 100% Natural HPP",
        1.64,
        "Zumit HPP Squeezed Orange Juice is the quintessence of simplicity and purity, offering a fresh and authentic taste in every bottle.",
        "./assets/juices/Naranja.png",
        true
    ),
    (
        "Zumo Cold Pressed Antiox HPP",
        2.74,
        "Discover the revitalising power of Zumit's Cold Pressed Antiox, a drink that combines natural flavours and antioxidant benefits in every sip.",
        "./assets/juices/Antiox.png",
        false
    ),
    (
        "Zumo Cold Pressed Green Power HPP",
        2.74,
        "Zumit's Cold Pressed Green Power is an invigorating drink that combines the best of vegetables and fruits in a single bottle, designed to deliver a boost of energy and nutrition.",
        "./assets/juices/Green_Power.png",
        false
    ),
    (
        "Zumo Cold Pressed Energy HPP",
        2.74,
        "Zumit Cold Pressed Energy is your perfect ally for those moments when you need a natural and healthy boost.",
        "./assets/juices/Energy.png",
        true
    ),
    (
        "Zumo Cold Pressed Boost HPP",
        2.74,
        "Zumit's Cold Pressed Boost is a revitalizing drink designed to naturally elevate your energy and well-being.",
        "./assets/juices/Boost.png",
        false
    ),
    (
        "Zumo De Naranja Recién Exprimada",
        3.50,
        "Zumit's HPP Squeezed Orange Juice offers a fresh and authentic taste in every bottle.",
        "./assets/juices/Naranja_2_litros.png",
        true
    );

COMMIT;

-- Crear la tabla smoothies
CREATE TABLE IF NOT EXISTS
    smoothies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        precio DECIMAL(4, 2) NOT NULL,
        descripcion VARCHAR(300) NOT NULL,
        imagen VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );

-- Eliminar datos si existen
DELETE FROM smoothies;

-- Insertar todas la smoothies
INSERT INTO
    smoothies (nombre, precio, descripcion, imagen, stock)
VALUES
    (
        "Aguacate Mix",
        3.00,
        "Ice pop made with fresh strawberries from our region.",
        "./assets/smoothies/Aguacate_Mix.png",
        true
    ),
    (
        "Berries Paradies",
        2.99,
        "Ice pop made with freshly squeezed lemon juice.",
        "./assets/smoothies/Berries_Paradies.png",
        false
    ),
    (
        "Blue Lightning",
        3.45,
        "Fresh passion fruit ice_creams.",
        "./assets/smoothies/Blue_Lightning.png",
        true
    ),
    (
        "Caribbean Passion",
        1.99,
        "Fresh mango ice_creams.",
        "./assets/smoothies/Caribbean_Passion.png",
        true
    ),
    (
        "Colada Jungle",
        4.49,
        "Ice pop made of hazelnuts with hazelnut, chocolate and wafer swirls, developed exclusively for Lucciano's in Italy.",
        "./assets/smoothies/Colada_Jungle.png",
        true
    ),
    (
        "Delightful",
        3.45,
        "Ice pop made with whipped cream, with chocolate ganache and chocolate cookie swirls, decorated with stracciatella coated cookies.",
        "./assets/smoothies/Delightful.png",
        false
    ),
    (
        "Dragon Fruit_Mix",
        3.00,
        "Ice pop made of Italian mascarpone with a Patagonian berry swirl.",
        "./assets/smoothies/Dragon_Fruit_Mix.png",
        false
    ),
    (
        "Ginger Boost",
        4.49,
        "Peanut icepop without added sugar.",
        "./assets/smoothies/Ginger_Boost.png",
        true
    ),
    (
        "Green Power",
        3.45,
        "Strawberry whipped cream ice pop, a perfect combination of texture and flavor.",
        "./assets/smoothies/Green_Power.png",
        false
    ),
    (
        "Squeeze Nature",
        1.99,
        "Whipped cream ice pop, coated with semi- sweet Belgian chocolate and small pieces of caramelized peanuts.",
        "./assets/smoothies/Squeeze_Nature.png",
        true
    ),
    (
        "Tropical Heaven",
        3.00,
        "Milk caramel ice pop, coated with Belgian white chocolate and small pieces of caramelized peanuts.",
        "./assets/smoothies/Tropical_Heaven.png",
        true
    ),
    (
        "Vitality",
        2.99,
        "Lucciano’s chocolate ice pop, coated with semi-sweet Belgian chocolate with small pieces of caramelized peanuts.",
        "./assets/smoothies/Vitality.png",
        true
    ),
    (
        "Watermelon Summer",
        4.49,
        "Strawberry whipped cream ice pop, coated with pink tinted Belgian white chocolate. It is decorated with multicolored sprinkles and white chocolate eyes.",
        "./assets/smoothies/Watermelon_Summer.png",
        false
    );

CREATE TABLE IF NOT EXISTS
    users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        telefono VARCHAR(12),
        birth_date DATE,
        username VARCHAR(50) NOT NULL,
        password CHAR(64) NOT NULL,
        address VARCHAR(100)
    );

INSERT INTO
    users (
        nombre,
        email,
        telefono,
        birth_date,
        username,
        password,
        address
    )
SELECT
    "root",
    "root@email.com",
    "123456789",
    "2001-11-01",
    "root",
    "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4",
    "c/ Root Av."
WHERE
    NOT EXISTS (
        SELECT
            *
        FROM
            users
    );

COMMIT;