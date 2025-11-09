-- Crear la tabla icepops
CREATE TABLE IF NOT EXISTS icepops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(4, 2) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    imagen VARCHAR() NOT NULL,
    stock BOOLEAN NOT NULL
);

-- Eliminar datos si existen
DELETE FROM icepops;

-- Insertar todas la icepops
INSERT INTO icepops (nombre, precio, descripcion, imagen, stock) VALUES
("Strawberry",                      3.00,   "Ice pop made with fresh strawberries from our region.",                                                                                                                                                "../assets/icepops/Strawberry.png",                         true),
("Lemon",                           2.99,   "Ice pop made with freshly squeezed lemon juice.",                                                                                                                                                      "../assets/icepops/Lemon.png",                              false),
("Passion Fruit",                   3,45,   "Fresh passion fruit gelato.",                                                                                                                                                                          "../assets/icepops/Passion_Fruit.png",                      true),
("Mango",                           1.99,   "Fresh mango gelato.",                                                                                                                                                                                  "../assets/icepops/Mango.png",                              true),
("King Nero",                       4.49,   "Ice pop made of hazelnuts with hazelnut, chocolate and wafer swirls, developed exclusively for Lucciano's in Italy.",                                                                                  "../assets/icepops/King_Nero.png",                          true),
("Cookies And Cream",               3,45,   "Ice pop made with whipped cream, with chocolate ganache and chocolate cookie swirls, decorated with stracciatella coated cookies.",                                                                    "../assets/icepops/Cookies_And_Cream.png",                  false),
("Mascarpone & Berries",            3.00,   "Ice pop made of Italian mascarpone with a Patagonian berry swirl.",                                                                                                                                    "../assets/icepops/Mascarpone_&_Berries.png",               false),
("Peanut Without Added Sugar",      4.49,   "Peanut icepop without added sugar.",                                                                                                                                                                   "../assets/icepops/Peanut_Without_Added_Sugar.png",         true),
("Strawberry & Whipped Cream",      3,45,   "Strawberry whipped cream ice pop, a perfect combination of texture and flavor.",                                                                                                                       "../assets/icepops/Strawberry_&_Whipped_Cream.png",         false),
("Whipped Cream",                   1.99,   "Whipped cream ice pop, coated with semi- sweet Belgian chocolate and small pieces of caramelized peanuts.",                                                                                            "../assets/icepops/Whipped_Cream.png",                      true),
("Crispy Dulce De Leche",           3.00,   "Milk caramel ice pop, coated with Belgian white chocolate and small pieces of caramelized peanuts.",                                                                                                   "../assets/icepops/Crispy_Dulce_De_Leche.png",              true),
("Crispy Chocolate",                2.99,   "Lucciano’s chocolate ice pop, coated with semi-sweet Belgian chocolate with small pieces of caramelized peanuts.",                                                                                     "../assets/icepops/Crispy_Chocolate.png",                   true),
("Fiore Strawberry",                4.49,   "Strawberry whipped cream ice pop, coated with pink tinted Belgian white chocolate. It is decorated with multicolored sprinkles and white chocolate eyes.",                                             "../assets/icepops/Fiore_Strawberry.png",                   false),
("Oli King",                        3.00,   "King flavored ice pop, coated with Belgian white chocolate. The paws are decorated with a fine touch of stracciatella.",                                                                               "../assets/icepops/Oli_King.png",                           false),
("Smile King",                      1.99,   "King flavored ice pop, coated with Belgian white and semi-sweet chocolate. The eyes are made with the same chocolate.",                                                                                "../assets/icepops/Smile_King.png",                         true),
("Passion Fruit Cheesecake",        3,45,   "Cheesecake icepop with swirls of passion fruit coated with white chocolate.",                                                                                                                          "../assets/icepops/Passion_Fruit_Cheesecake.png",           true),
("Red Berry Sorbet",                2.99,   "Red berry sorbet. Mix of blueberries, strawberries, raspberries and blackberries from Patagonia. Coated with white chocolate and decorated with purple lines.",                                        "../assets/icepops/Red_Berry_Sorbet.png",                   false),
("Pistacchio",                      4.49,   "Pistacchio ice pop, a combination of the finest pistacchios from Bronte and Sicily, coated with a Belgian pistacchio-flavored white chocolate.",                                                       "../assets/icepops/Pistacchio.png",                         true),
("Enzo Dulce De Leche & Gianduia",  3.00,   "Milk caramel ice pop with a gianduia chocolate filling, coated with Belgian white chocolate.",                                                                                                         "../assets/icepops/Enzo_Dulce_De_Leche_&_Gianduia.png",     false),
("Tonio Cookies & Cream",           1.99,   "Whipped cream ice pop with cookies made in Italy for Lucciano’s and chocolate ganache swirls, coated with white chocolate. All decoration details are made by hand.",                                  "../assets/icepops/Tonio_Cookies_&_Cream.png",              true),
("Minion",                          3.00,   "King flavored ice pop, coated with Italian white chocolate of Belgian origin, tinted with the classic blue and yellow colors. Handmade eyes are used to add the perfect touch!",                       "../assets/icepops/Minion.png",                             true),
("Dark Double Chocolate",           2.99,   "Chocolate gelato, double coated with Belgian white chocolate and milk chocolate, sealed with golden dust., double coated with Belgian white chocolate and milk chocolate, sealed with golden dust.",   "../assets/icepops/Dark_Double_Chocolate.png",              true),
("White Double Chocolate",          3.00,   "White chocolate with milk chocolate swirls, double coated with Belgian white chocolate and milk chocolate.",                                                                                           "../assets/icepops/White_Double_Chocolate.png",             false),
("Icepop 0% Added Sugar",           3,45,   "Milk chocolate gelato covered with milk chocolate with no added sugar.",                                                                                                                               "../assets/icepops/Icepop_0%_Added_Sugar.png",              false),
("Caramel Gold",                    3.00,   "Caramel icepop coated with gold chocolate.",                                                                                                                                                           "../assets/icepops/Caramel_Gold.png",                       false),
("Sorbet Supreme 80%",              2.99,   "Vegan 80% chocolate sorbet coated with the same chocolate.",                                                                                                                                           "../assets/icepops/Sorbet_Supreme_80%.png",                 true);


-- Crear la tabla gelato
CREATE TABLE IF NOT EXISTS icepops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(4, 2) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    imagen VARCHAR() NOT NULL,
    stock BOOLEAN NOT NULL
);

-- Eliminar datos si existen
DELETE FROM gelato;
INSERT INTO gelato (nombre, precio, descripcion, imagen, stock) VALUES
("Strawberry",                          3.00,   "Made with fresh strawberries from our region.",                                                                                                                                                                                        "../assets/gelato/Strawberry.png",                          true),
("Mango",                               2.99,   "Fresh mango gelato.",                                                                                                                                                                                                                  "../assets/gelato/Mango.png",                               false),
("Passion Fruit",                       3,45,   "Fresh passion fruit gelato",                                                                                                                                                                                                           "../assets/gelato/Passion_Fruit.png",                       true),
("Lime",                                1.99,   "Gelato made with freshly sqeezed lime juice.",                                                                                                                                                                                         "../assets/gelato/Lime.png",                                true),
("Coco Rock",                           4.49,   "Malaysian coconut ice cream with white chocolate, crispy wafers and shredded coconut swirls.",                                                                                                                                         "../assets/gelato/Coco_Rock.png",                           true),
("Passion Fruit Cheesecake",            3,45,   "Cheesecake gelato with passion fruit marbling.",                                                                                                                                                                                       "../assets/gelato/Passion_Fruit_Cheesecake.png",            false),
("Lemon Pie",                           3.00,   "We transformed the famous recipe into an incredible ice cream in its honor.",                                                                                                                                                          "../assets/gelato/Lemon_Pie.png",                           false),
("Mascarpone & Berries",                4.49,   "Exclusive recipe, made in Italy for Lucciano’s with mascarpone cheese combined with swirls of berries from the Argentine Patagonia.",                                                                                                  "../assets/gelato/Mascarpone_&_Berries.png",                true),
("Cookies & Cream",                     3,45,   "Whipped cream gelato with cookie swirls, developed exclusively by Lucciano’s in Italy.",                                                                                                                                               "../assets/gelato/Cookies_&_Cream.png",                     false),
("Tiramisú",                            1.99,   "Inspired by the classic Italian dessert with a super creamy mascarpone cheese. With Lucciano’s exclusive Italian cocoa powder and delicious pieces of vanilla sponge cake dipped in coffee liqueur syrup and Colombian coffee.",       "../assets/gelato/Tiramisú.png",                            true),
("Cherry Vainilla",                     3.00,   "Vainilla cream gelato with cherry marbling.",                                                                                                                                                                                          "../assets/gelato/Cherry_Vainilla.png",                     true),
("White Chocolate Pistacchio Crock",    2.99,   "White chocolate cream gelato with crunchy italian pistacchio marbling.",                                                                                                                                                               "../assets/gelato/White_Chocolate_Pistacchio_Crock.png",    true),
("Nocciola Suprema",                    4.49,   "Gelato made with top quality italian pure hazelnuts.",                                                                                                                                                                                 "../assets/gelato/Nocciola_Suprema.png",                    false),
("King Bueno",                          3.00,   "Hazelnut gelato with hazelnut, chocolate and wafers swirls, exclusively developed for Lucciano’s in Italy.",                                                                                                                           "../assets/gelato/King_Bueno.png",                          false),
("Peanut Caramel",                      1.99,   "Peanut butter ice cream, with stracciatella chocolate and milk caramel swirls and pieces of salted peanuts.",                                                                                                                          "../assets/gelato/Peanut_Caramel.png",                      true),
("Lucciano's Chocolate Hazelnut",       3,45,   "Lucciano’s chocolate with a chocolate and hazelnut filling, developed exclusively by Lucciano’s in Italy.",                                                                                                                            "../assets/gelato/Lucciano's_Chocolate_Hazelnut.png",       true),
("Milk Caramel Chocolate Chip",         2.99,   "Milk caramel ice cream with semi-sweet Italian Stracciatella.",                                                                                                                                                                        "../assets/gelato/Milk_Caramel_Chocolate_Chip.png",         false),
("Waferino Crock",                      4.49,   "Gelato made with vanilla wafers with swirls of nocciola wafers.",                                                                                                                                                                      "../assets/gelato/Waferino_Crock.png",                      true),
("Bombón Praline",                      3.00,   "Gianduia gelato with swirls of gianduia cream with wafers and nocciola.",                                                                                                                                                              "../assets/gelato/Bombón_Praline.png",                      false),
("Stracciatella",                       1.99,   "Chantilly cream with swirls of belgium stracciatella.",                                                                                                                                                                                "../assets/gelato/Stracciatella.png",                       true),
("Sorbet Supreme 80%",                  3.00,   "Vegan 80% chocolate sorbet.",                                                                                                                                                                                                          "../assets/gelato/Sorbet_Supreme_80%.png",                   true),
("Banana Splite",                       2.99,   "Made with fresh bananas, with belgian chocolate and milk caramel swirls.",                                                                                                                                                             "../assets/gelato/Banana_Splite.png",                       true),
("Dulce De Leche",                      3.00,   "Argentinean dulce de leche premium ice cream with swirls of dulce de leche, developed exclusively by Lucciano's in Italy.",                                                                                                            "../assets/gelato/Dulce_De_Leche.png",     false),
("Chocolate Dubai",                     3,45,   "Belgian chocolate gelato with variegato layers that emulates the combination of pistachio and Kadayif, inspired by the famous Chocolate Dubai.",                                                                                       "../assets/gelato/Chocolate_Dubai.png",                     false),
("Pistacchio Cheesecake",               3.00,   "An irresistible Cheesecake gelato with a delicious Avella Pistacchio marbling and a crunchy touch of Pistacchio Crumble.",                                                                                                             "../assets/gelato/Pistacchio_Cheesecake.png",               false),
("Cremino Tropical",                    2.99,   "Mango cream gelato with passion fruit and coconut swirls.",                                                                                                                                                                            "../assets/gelato/Cremino_Tropical.png",                   true);
("White Hazelnut & Salted Caramel",     1.99,   "White hazelnut gelato with salted caramel swirls & cocoa crumble.",                                                                                                                                                                    "../assets/gelato/White_Hazelnut_&_Salted_Caramel.png",     true),
("Red Mulberry",                        1.99,   "Fresh red mulberry gelato, with red mulberry swirls.",                                                                                                                                                                                 "../assets/gelato/Red_Mulberry.png",                        true),
("Pistachio Alfajor",                   1.99,   "Inspired by the most successful alfajor of the year, a new irresistible flavour arrives: pistachio alfajor ice cream, with a delicious swirl of dulce de leche and Avella Pistachio, and pieces of our exclusive pistachio alfajor.",  "../assets/gelato/Pistachio_Alfajor.png",                   true);



-- Crear la tabla chocolate
CREATE TABLE IF NOT EXISTS chocolate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(4, 2) NOT NULL,
    imagen VARCHAR() NOT NULL,
    stock BOOLEAN NOT NULL
);

-- Eliminar datos si existen
DELETE FROM chocolate;
INSERT INTO chocolate (nombre, precio, imagen, stock) VALUES
("Chocolate 54% Con Avellanas",                 3.00,   "../assets/chocolate/Chocolate_54%_Con_Avellanas.png",                  true),
("Chocolate Blanco",                            2.99,   "../assets/chocolate/Chocolate_Blanco.png",                             false),
("Chocolate Blanco Con Caramelo Y Avellanas",   3.00,   "../assets/chocolate/Chocolate_Blanco_Con_Caramelo_Y_Avellanas.png",    false),
("Chocolate Blanco Sin Azucar",                 3,45,   "../assets/chocolate/Chocolate_Blanco_Sin_Azucar.png",                  true),
("Chocolate Con Leche",                         1.99,   "../assets/chocolate/Chocolate_Con_Leche.png",                          true),
("Chocolate Con Leche Con Almendras",           3,45,   "../assets/chocolate/Chocolate_Con_Leche_Con_Almendras.png",            false),
("Chocolate Con Leche Con Avellanas",           4.49,   "../assets/chocolate/Chocolate_Con_Leche_Con_Avellanas.png",            true),
("Chocolate Con Leche Con Dulce De Leche",      4.49,   "../assets/chocolate/Chocolate_Con_Leche_Con_DDL.png",                  true),
("Chocolate Con Leche Sin Azucar",              3,45,   "../assets/chocolate/Chocolate_Con_Leche_Sin_Azucar.png",               false),
("Chocolate Dark 70%",                          3.00,   "../assets/chocolate/Chocolate_Dark_70%.png",                           false),
("Chocolate Fruto Del Bosque",                  4.49,   "../assets/chocolate/Chocolate_Fruto_Del_Bosque.png",                   true),
("Chocolate Pistacchio Caramelizado",           3,45,   "../assets/chocolate/Chocolate_Pistacchio_Caramelizado.png",            false);
COMMIT;


-- Crear la tabla milkshakes
CREATE TABLE IF NOT EXISTS milkshakes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(4, 2) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    imagen VARCHAR() NOT NULL,
    stock BOOLEAN NOT NULL
);

-- Eliminar datos si existen
DELETE FROM milkshakes;
INSERT INTO milkshakes (nombre, precio, imagen, stock) VALUES
("Bananalicious",       1.99,   "Add a tropical touch to your Horeca menu with our Bananalicious Milkshake. The combination of the smooth, sweet flavor of 100% natural banana with a delicate hint of vanilla makes it an irresistible choice for your customers.",                                            "../assets/milkshakes/Bananalicious.png",       true),
("Cookies & Dreams",    2.39,   "Immerse yourself in a world of pure indulgence with Zumit's Frappé Cookies & Cream, a drink that promises to turn every sip into a moment of unforgettable pleasure.",                                                                                                         "../assets/milkshakes/Cookies_&_Dreams.png",    false),
("Pure Chocolate",      2.99,   "Immerse yourself in an incomparable taste experience with Zumit's Mocha Frappé. An iced drink that combines the richness of dark chocolate, the intensity of coffee and the creaminess of milk, all in a perfectly balanced blend ready to enjoy in the blink of an eye.",     "../assets/milkshakes/Pure_Chocolate.png",      false),
("Salted Caramel",      4.59,   "Embark on a journey of indulgence with Zumit's Frappé Salted Caramel, a delicious fusion of sweetness and a hint of salt that will take you to a new dimension of taste. ",                                                                                                    "../assets/milkshakes/Salted_Caramel.png",      true),
("Smooth Mocha",        2.99,   "Immerse yourself in an incomparable taste experience with Zumit's Mocha Frappé. An iced drink that combines the richness of dark chocolate, the intensity of coffee and the creaminess of milk, all in a perfectly balanced blend ready to enjoy in the blink of an eye.",     "../assets/milkshakes/Smooth_Mocha.png",        false),
("Strawberry Fantasy",  3.99,   "Zumit's Strawberry & Vanilla milkshake captures the essence of two classic flavours in a harmonious drink that promises to delight customers in any establishment.",                                                                                                           "../assets/milkshakes/Strawberry_Fantasy.png",  true)
COMMIT;


-- Crear la tabla juice
CREATE TABLE IF NOT EXISTS juice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(4, 2) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    imagen VARCHAR() NOT NULL,
    stock BOOLEAN NOT NULL
);

-- Eliminar datos si existen
DELETE FROM juice;
INSERT INTO juice (nombre, precio, imagen, stock) VALUES
("Zumo De Naranja 100% Natural HPP",        1.64,   "Zumit HPP Squeezed Orange Juice is the quintessence of simplicity and purity, offering a fresh and authentic taste in every bottle.",                                            "../assets/milkshakes/Bananalicious.png",       true),
("Zumo Cold Pressed Antiox HPP",            2.74,   "Discover the revitalising power of Zumit's Cold Pressed Antiox, a drink that combines natural flavours and antioxidant benefits in every sip.",                                                                                                         "../assets/milkshakes/Cookies_&_Dreams.png",    false),
("Zumo Cold Pressed Green Power HPP",       2.74,   "Zumit's Cold Pressed Green Power is an invigorating drink that combines the best of vegetables and fruits in a single bottle, designed to deliver a boost of energy and nutrition.",     "../assets/milkshakes/Pure_Chocolate.png",      false),
("Zumo Cold Pressed Energy HPP",            2.74,   "Zumit Cold Pressed Energy is your perfect ally for those moments when you need a natural and healthy boost.",                                                                                                    "../assets/milkshakes/Salted_Caramel.png",      true),
("Zumo Cold Pressed Boost HPP",             2.74,   "Zumit's Cold Pressed Boost is a revitalizing drink designed to naturally elevate your energy and well-being.",     "../assets/milkshakes/Smooth_Mocha.png",        false),
("Zumo De Naranja Recién Exprimada",        3.50,   "Zumit's HPP Squeezed Orange Juice offers a fresh and authentic taste in every bottle.",                                                                                                           "../assets/milkshakes/Strawberry_Fantasy.png",  true)
COMMIT;