USE helado_express;

CREATE TABLE IF NOT EXISTS
    products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        category VARCHAR(50) NOT NULL,
        name VARCHAR(50) NOT NULL,
        price DECIMAL(4, 2) NOT NULL,
        old_price DECIMAL(4, 2),
        description VARCHAR(300) NOT NULL,
        image VARCHAR(100) NOT NULL,
        attributes VARCHAR(100) NOT NULL,
        stock BOOLEAN NOT NULL
    );
DELETE FROM products;

INSERT INTO
    products (
        category,
        name,
        price,
        old_price,
        description,
        image,
        attributes,
        stock
    )
VALUES
    -- !!!!!!!!!! ICE CREAMS !!!!!!!!!!
    (
        "ice_creams",
        "Strawberry",
        3.00,
        4.00,
        "Made with fresh strawberries from our region.",
        "./assets/ice_creams/Strawberry.png",
        "berries, discount",
        true
    ),
    (
        "ice_creams",
        "Mango",
        2.99,
        null,
        "Fresh mango ice-cream.",
        "./assets/ice_creams/Mango.png",
        "fruits",
        false
    ),
    (
        "ice_creams",
        "Passion Fruit",
        3.45,
        null,
        "Fresh passion fruit ice-cream",
        "./assets/ice_creams/Passion_Fruit.png",
        "fruits",
        true
    ),
    (
        "ice_creams",
        "Lime",
        1.99,
        2.50,
        "Gelato made with freshly sqeezed lime juice.",
        "./assets/ice_creams/Lime.png",
        "fruits, discount",
        true
    ),
    (
        "ice_creams",
        "Coco Rock",
        4.49,
        null,
        "Malaysian coconut ice cream with white chocolate, crispy wafers and shredded coconut swirls.",
        "./assets/ice_creams/Coco_Rock.png",
        "fruits, white-chocolate",
        true
    ),
    (
        "ice_creams",
        "Passion Fruit Cheesecake",
        3.45,
        4.00,
        "Cheesecake ice-cream with passion fruit marbling.",
        "./assets/ice_creams/Passion_Fruit_Cheesecake.png",
        "fruits, discount",
        false
    ),
    (
        "ice_creams",
        "Lemon Pie",
        3.00,
        null,
        "We transformed the famous recipe into an incredible ice cream in its honor.",
        "./assets/ice_creams/Lemon_Pie.png",
        "fruits",
        false
    ),
    (
        "ice_creams",
        "Mascarpone & Berries",
        4.49,
        5.00,
        "Exclusive recipe, made in Italy for Lucciano’s with mascarpone cheese combined with swirls of berries from the Argentine Patagonia.",
        "./assets/ice_creams/Mascarpone_&_Berries.png",
        "berries, discount",
        true
    ),
    (
        "ice_creams",
        "Cookies & Cream",
        3.45,
        null,
        "Whipped cream ice-cream with cookie swirls, developed exclusively by Lucciano’s in Italy.",
        "./assets/ice_creams/Cookies_&_Cream.png",
        "white-chocolate, special",
        false
    ),
    (
        "ice_creams",
        "Tiramisú",
        1.99,
        null,
        "Inspired by the classic Italian dessert with a super creamy mascarpone cheese. With Lucciano’s exclusive Italian cocoa powder and delicious pieces of vanilla sponge cake dipped in coffee liqueur syrup and Colombian coffee.",
        "./assets/ice_creams/Tiramisú.png",
        "special",
        true
    ),
    (
        "ice_creams",
        "Cherry Vainilla",
        3.00,
        null,
        "Vainilla cream ice-cream with cherry marbling.",
        "./assets/ice_creams/Cherry_Vainilla.png",
        "berries",
        true
    ),
    (
        "ice_creams",
        "White Chocolate Pistacchio Crock",
        2.99,
        null,
        "White chocolate cream ice-cream with crunchy italian pistacchio marbling.",
        "./assets/ice_creams/White_Chocolate_Pistacchio_Crock.png",
        "white-chocolate, nuts, special",
        true
    ),
    (
        "ice_creams",
        "Nocciola Suprema",
        4.49,
        6.00,
        "Gelato made with top quality italian pure hazelnuts.",
        "./assets/ice_creams/Nocciola_Suprema.png",
        "chocolate, special, discount",
        false
    ),
    (
        "ice_creams",
        "King Bueno",
        3.00,
        null,
        "Hazelnut ice-cream with hazelnut, chocolate and wafers swirls, exclusively developed for Lucciano’s in Italy.",
        "./assets/ice_creams/King_Bueno.png",
        "white-chocolate, nuts",
        false
    ),
    (
        "ice_creams",
        "Lucciano's Chocolate Hazelnut",
        3.45,
        null,
        "Lucciano’s chocolate with a chocolate and hazelnut filling, developed exclusively by Lucciano’s in Italy.",
        "./assets/ice_creams/Lucciano's_Chocolate_Hazelnut.png",
        "chocolate, nuts",
        true
    ),
    (
        "ice_creams",
        "Milk Caramel Chocolate Chip",
        2.99,
        null,
        "Milk caramel ice cream with semi-sweet Italian Stracciatella.",
        "./assets/ice_creams/Milk_Caramel_Chocolate_Chip.png",
        "caramel, chocolate, special",
        false
    ),
    (
        "ice_creams",
        "Bombón Praline",
        3.00,
        null,
        "Gianduia ice-cream with swirls of gianduia cream with wafers and nocciola.",
        "./assets/ice_creams/Bombón_Praline.png",
        "chocolate, nuts",
        false
    ),
    (
        "ice_creams",
        "Stracciatella",
        1.99,
        null,
        "Chantilly cream with swirls of belgium stracciatella.",
        "./assets/ice_creams/Stracciatella.png",
        "white-chocolate",
        true
    ),
    (
        "ice_creams",
        "Sorbet Supreme 80%",
        3.00,
        null,
        "Vegan 80% chocolate sorbet.",
        "./assets/ice_creams/Sorbet_Supreme_80.png",
        "chocolate, special, special offer",
        true
    ),
    (
        "ice_creams",
        "Banana Splite",
        2.99,
        null,
        "Made with fresh bananas, with belgian chocolate and milk caramel swirls.",
        "./assets/ice_creams/Banana_Splite.png",
        "fruits, white-chocolate",
        true
    ),
    (
        "ice_creams",
        "Dulce De Leche",
        3.00,
        null,
        "Argentinean dulce de leche premium ice cream with swirls of dulce de leche, developed exclusively by Lucciano's in Italy.",
        "./assets/ice_creams/Dulce_De_Leche.png",
        "caramel, special",
        false
    ),
    (
        "ice_creams",
        "Chocolate Dubai",
        3.45,
        3.99,
        "Belgian chocolate ice-cream with variegato layers that emulates the combination of pistachio and Kadayif, inspired by the famous Chocolate Dubai.",
        "./assets/ice_creams/Chocolate_Dubai.png",
        "chocolate, special, discount",
        false
    ),
    (
        "ice_creams",
        "Pistacchio Cheesecake",
        3.00,
        null,
        "An irresistible Cheesecake ice-cream with a delicious Avella Pistacchio marbling and a crunchy touch of Pistacchio Crumble.",
        "./assets/ice_creams/Pistacchio_Cheesecake.png",
        "special, nuts",
        false
    ),
    -- !!!!!!!!!! ICE BARS !!!!!!!!!!
    (
        "ice_bars",
        "Strawberry",
        3.00,
        null,
        "Ice pop made with fresh strawberries from our region.",
        "./assets/ice_bars/Strawberry.png",
        "berries, ice pop",
        true
    ),
    (
        "ice_bars",
        "Lemon",
        2.99,
        null,
        "Ice pop made with freshly squeezed lemon juice.",
        "./assets/ice_bars/Lemon.png",
        "fruits",
        true
    ),
    (
        "ice_bars",
        "Passion Fruit",
        3.45,
        null,
        "Fresh passion fruit ice_creams.",
        "./assets/ice_bars/Passion_Fruit.png",
        "fruits, ice pop",
        true
    ),
    (
        "ice_bars",
        "Mango",
        1.99,
        null,
        "Fresh mango ice_creams.",
        "./assets/ice_bars/Mango.png",
        "fruits, ice pop",
        true
    ),
    (
        "ice_bars",
        "King Nero",
        4.49,
        null,
        "Ice pop made of hazelnuts with hazelnut, chocolate and wafer swirls, developed exclusively for Lucciano's in Italy.",
        "./assets/ice_bars/King_Nero.png",
        "chocolate",
        true
    ),
    (
        "ice_bars",
        "Cookies And Cream",
        3.45,
        null,
        "Ice pop made with whipped cream, with chocolate ganache and chocolate cookie swirls, decorated with stracciatella coated cookies.",
        "./assets/ice_bars/Cookies_And_Cream.png",
        "chocolate, cookies",
        false
    ),
    (
        "ice_bars",
        "Mascarpone & Berries",
        3.00,
        null,
        "Ice pop made of Italian mascarpone with a Patagonian berry swirl.",
        "./assets/ice_bars/Mascarpone_&_Berries.png",
        "berries",
        false
    ),
    (
        "ice_bars",
        "Peanut Without Added Sugar",
        4.49,
        null,
        "Peanut icepop without added sugar.",
        "./assets/ice_bars/Peanut_Without_Added_Sugar.png",
        "special, nuts",
        true
    ),
    (
        "ice_bars",
        "Strawberry & Whipped Cream",
        3.45,
        null,
        "Strawberry whipped cream ice pop, a perfect combination of texture and flavor.",
        "./assets/ice_bars/Strawberry_&_Whipped_Cream.png",
        "berries",
        false
    ),
    (
        "ice_bars",
        "Whipped Cream",
        1.99,
        null,
        "Whipped cream ice pop, coated with semi- sweet Belgian chocolate and small pieces of caramelized peanuts.",
        "./assets/ice_bars/Whipped_Cream.png",
        "chocolate, nuts, caramel, special offer",
        true
    ),
    (
        "ice_bars",
        "Crispy Dulce De Leche",
        3.00,
        null,
        "Milk caramel ice pop, coated with Belgian white chocolate and small pieces of caramelized peanuts.",
        "./assets/ice_bars/Crispy_Dulce_De_Leche.png",
        "white-chocolate, nuts, caramel",
        true
    ),
    (
        "ice_bars",
        "Crispy Chocolate",
        2.99,
        null,
        "Lucciano’s chocolate ice pop, coated with semi-sweet Belgian chocolate with small pieces of caramelized peanuts.",
        "./assets/ice_bars/Crispy_Chocolate.png",
        "chocolate, nuts, caramel",
        true
    ),
    (
        "ice_bars",
        "Fiore Strawberry",
        4.49,
        null,
        "Strawberry whipped cream ice pop, coated with pink tinted Belgian white chocolate. It is decorated with multicolored sprinkles and white chocolate eyes.",
        "./assets/ice_bars/Fiore_Strawberry.png",
        "special, berries",
        false
    ),
    (
        "ice_bars",
        "Oli King",
        3.00,
        null,
        "King flavored ice pop, coated with Belgian white chocolate. The paws are decorated with a fine touch of stracciatella.",
        "./assets/ice_bars/Oli_King.png",
        "special, chocolate, white-chocolate",
        false
    ),
    (
        "ice_bars",
        "Smile King",
        1.99,
        null,
        "King flavored ice pop, coated with Belgian white and semi-sweet chocolate. The eyes are made with the same chocolate.",
        "./assets/ice_bars/Smile_King.png",
        "special, chocolate, white-chocolate",
        true
    ),
    (
        "ice_bars",
        "Passion Fruit Cheesecake",
        3.45,
        3.90,
        "Cheesecake icepop with swirls of passion fruit coated with white chocolate.",
        "./assets/ice_bars/Passion_Fruit_Cheesecake.png",
        "fruits, white-chocolate, discount",
        true
    ),
    (
        "ice_bars",
        "Red Berry Sorbet",
        2.99,
        null,
        "Red berry sorbet. Mix of blueberries, strawberries, raspberries and blackberries from Patagonia. Coated with white chocolate and decorated with purple lines.",
        "./assets/ice_bars/Red_Berry_Sorbet.png",
        "white-chocolate, berries",
        false
    ),
    (
        "ice_bars",
        "Pistacchio",
        4.49,
        null,
        "Pistacchio ice pop, a combination of the finest pistacchios from Bronte and Sicily, coated with a Belgian pistacchio-flavored white chocolate.",
        "./assets/ice_bars/Pistacchio.png",
        "nuts, white-chocolate",
        true
    ),
    (
        "ice_bars",
        "Enzo Dulce De Leche & Gianduia",
        3.00,
        null,
        "Milk caramel ice pop with a gianduia chocolate filling, coated with Belgian white chocolate.",
        "./assets/ice_bars/Enzo_Dulce_De_Leche_&_Gianduia.png",
        "special, white-chocolate",
        false
    ),
    (
        "ice_bars",
        "Tonio Cookies & Cream",
        1.99,
        null,
        "Whipped cream ice pop with cookies made in Italy for Lucciano’s and chocolate ganache swirls, coated with white chocolate. All decoration details are made by hand.",
        "./assets/ice_bars/Tonio_Cookies_&_Cream.png",
        "special, cookies",
        true
    ),
    (
        "ice_bars",
        "Minion",
        3.00,
        4.00,
        "King flavored ice pop, coated with Italian white chocolate of Belgian origin, tinted with the classic blue and yellow colors. Handmade eyes are used to add the perfect touch!",
        "./assets/ice_bars/Minion.png",
        "special, white-chocolate, discount",
        true
    ),
    (
        "ice_bars",
        "Dark Double Chocolate",
        2.99,
        null,
        "Chocolate ice_creams, double coated with Belgian white chocolate and milk chocolate, sealed with golden dust., double coated with Belgian white chocolate and milk chocolate, sealed with golden dust.",
        "./assets/ice_bars/Dark_Double_Chocolate.png",
        "white-chocolate, chocolate, special",
        true
    ),
    (
        "ice_bars",
        "White Double Chocolate",
        3.00,
        null,
        "White chocolate with milk chocolate swirls, double coated with Belgian white chocolate and milk chocolate.",
        "./assets/ice_bars/White_Double_Chocolate.png",
        "chocolate",
        false
    ),
    (
        "ice_bars",
        "Icepop 0% Added Sugar",
        3.45,
        null,
        "Milk chocolate ice_creams covered with milk chocolate with no added sugar.",
        "./assets/ice_bars/Icepop_0_Added_Sugar.png",
        "chocolate, special",
        false
    ),
    (
        "ice_bars",
        "Caramel Gold",
        3.00,
        null,
        "Caramel icepop coated with gold chocolate.",
        "./assets/ice_bars/Caramel_Gold.png",
        "chocolate",
        false
    ),
    (
        "ice_bars",
        "Sorbet Supreme 80%",
        2.99,
        3.50,
        "Vegan 80% chocolate sorbet coated with the same chocolate.",
        "./assets/ice_bars/Sorbet_Supreme_80.png",
        "chocolate, special, discount",
        true
    ),
    -- !!!!!!!! COOKIES !!!!!!!!
    (
        "cookies",
        "Caja Dark Chocolate 70%",
        4.99,
        null,
        "Descripción",
        "./assets/cookies/Caja_Dark_Chocolate_70.png",
        "dark-chocolate",
        true
    ),
    (
        "cookies",
        "Caja Mix Box",
        5.99,
        null,
        "Descripción",
        "./assets/cookies/Caja_Mix_Box.png",
        "special, nuts, white-chocolate, dark-chocolate, caramel",
        true
    ),
    (
        "cookies",
        "Caja Semisweet",
        4.49,
        5.00,
        "Descripción",
        "./assets/cookies/Caja_Semisweet.png",
        "caramel, discount",
        true
    ),
    (
        "cookies",
        "Caja White Chocolate",
        3.99,
        null,
        "Descripción",
        "./assets/cookies/Caja_White_Chocolate.png",
        "white-chocolate, special offer",
        true
    ),
    (
        "cookies",
        "Caja White Chocolate & Walnut",
        5.49,
        null,
        "Descripción",
        "./assets/cookies/Caja_White_Chocolate_&_Walnut.png",
        "white-chocolate, nuts, caramel",
        true
    ),
    -- !!!!!!!! CHOCOLATES !!!!!!!!
    (
        "chocolates",
        "Chocolate 54% Con Avellanas",
        3.00,
        null,
        "description",
        "./assets/chocolates/Chocolate_54_Con_Avellanas.png",
        "algo",
        true
    ),
    (
        "chocolates",
        "Chocolate Blanco",
        2.99,
        null,
        "description",
        "./assets/chocolates/Chocolate_Blanco.png",
        "nuts, milk",
        false
    ),
    (
        "chocolates",
        "Chocolate Blanco Con Caramelo Y Avellanas",
        3.00,
        null,
        "description",
        "./assets/chocolates/Chocolate_Blanco_Con_Caramelo_Y_Avellanas.png",
        "white",
        false
    ),
    (
        "chocolates",
        "Chocolate Blanco Sin Azucar",
        3.45,
        null,
        "description",
        "./assets/chocolates/Chocolate_Blanco_Sin_Azucar.png",
        "white, caramel, nuts",
        true
    ),
    (
        "chocolates",
        "Chocolate Con Leche",
        1.99,
        null,
        "description",
        "./assets/chocolates/Chocolate_Con_Leche.png",
        "white, special",
        true
    ),
    (
        "chocolates",
        "Chocolate Con Leche Con Almendras",
        3.45,
        null,
        "description",
        "./assets/chocolates/Chocolate_Con_Leche_Con_Almendras.png",
        "milk",
        false
    ),
    (
        "chocolates",
        "Chocolate Con Leche Con Avellanas",
        4.49,
        null,
        "description",
        "./assets/chocolates/Chocolate_Con_Leche_Con_Avellanas.png",
        "milk, nuts",
        true
    ),
    (
        "chocolates",
        "Chocolate Con Leche Con Dulce De Leche",
        4.49,
        null,
        "description",
        "./assets/chocolates/Chocolate_Con_Leche_Con_DDL.png",
        "milk, nuts",
        true
    ),
    (
        "chocolates",
        "Chocolate Con Leche Sin Azucar",
        3.45,
        null,
        "description",
        "./assets/chocolates/Chocolate_Con_Leche_Sin_Azucar.png",
        "milk, special, special offer",
        false
    ),
    (
        "chocolates",
        "Chocolate Dark 70%",
        3.00,
        null,
        "description",
        "./assets/chocolates/Chocolate_Dark_70.png",
        "dark",
        false
    ),
    (
        "chocolates",
        "Chocolate Fruto Del Bosque",
        4.49,
        null,
        "description",
        "./assets/chocolates/Chocolate_Fruto_Del_Bosque.png",
        "berries, special",
        true
    ),
    (
        "chocolates",
        "Chocolate Pistacchio Caramelizado",
        3.45,
        null,
        "description",
        "./assets/chocolates/Chocolate_Pistacchio_Caramelizado.png",
        "special, caramel, nuts",
        false
    ),
    -- !!!!!!!! MILKSHAKES !!!!!!!!
    (
        "milkshakes",
        "Bananalicious",
        1.99,
        null,
        "Add a tropical touch to your Horeca menu with our Bananalicious Milkshake. The combination of the smooth, sweet flavor of 100% natural banana with a delicate hint of vanilla makes it an irresistible choice for your customers.",
        "./assets/milkshakes/Bananalicious.png",
        "fruits, vanilla",
        true
    ),
    (
        "milkshakes",
        "Cookies & Dreams",
        2.39,
        null,
        "Immerse yourself in a world of pure indulgence with Zumit's Frappé Cookies & Cream, a drink that promises to turn every sip into a moment of unforgettable pleasure.",
        "./assets/milkshakes/Cookies_&_Dreams.png",
        "chocolate, cookies",
        false
    ),
    (
        "milkshakes",
        "Pure Chocolate",
        2.99,
        null,
        "Immerse yourself in an incomparable taste experience with Zumit's Mocha Frappé. An iced drink that combines the richness of dark chocolate, the intensity of coffee and the creaminess of milk, all in a perfectly balanced blend ready to enjoy in the blink of an eye.",
        "./assets/milkshakes/Pure_Chocolate.png",
        "chocolate, caramel",
        false
    ),
    (
        "milkshakes",
        "Salted Caramel",
        4.59,
        null,
        "Embark on a journey of indulgence with Zumit's Frappé Salted Caramel, a delicious fusion of sweetness and a hint of salt that will take you to a new dimension of taste. ",
        "./assets/milkshakes/Salted_Caramel.png",
        "special, caramel, special offer",
        true
    ),
    (
        "milkshakes",
        "Smooth Mocha",
        2.99,
        null,
        "Immerse yourself in an incomparable taste experience with Zumit's Mocha Frappé. An iced drink that combines the richness of dark chocolate, the intensity of coffee and the creaminess of milk, all in a perfectly balanced blend ready to enjoy in the blink of an eye.",
        "./assets/milkshakes/Smooth_Mocha.png",
        "coffee, chocolate",
        false
    ),
    (
        "milkshakes",
        "Strawberry Fantasy",
        3.99,
        null,
        "Zumit's Strawberry & Vanilla milkshake captures the essence of two classic flavours in a harmonious drink that promises to delight customers in any establishment.",
        "./assets/milkshakes/Strawberry_Fantasy.png",
        "berries",
        true
    ),
    -- !!!!!!!! JUICES !!!!!!!!
    (
        "juices",
        "Zumo De Naranja 100% Natural HPP",
        1.64,
        null,
        "Zumit HPP Squeezed Orange Juice is the quintessence of simplicity and purity, offering a fresh and authentic taste in every bottle.",
        "./assets/juices/Naranja.png",
        "orange",
        true
    ),
    (
        "juices",
        "Zumo Cold Pressed Antiox HPP",
        2.74,
        null,
        "Discover the revitalising power of Zumit's Cold Pressed Antiox, a drink that combines natural flavours and antioxidant benefits in every sip.",
        "./assets/juices/Antiox.png",
        "cold-pressed",
        false
    ),
    (
        "juices",
        "Zumo Cold Pressed Green Power HPP",
        2.74,
        null,
        "Zumit's Cold Pressed Green Power is an invigorating drink that combines the best of vegetables and fruits in a single bottle, designed to deliver a boost of energy and nutrition.",
        "./assets/juices/Green_Power.png",
        "cold-pressed",
        false
    ),
    (
        "juices",
        "Zumo Cold Pressed Energy HPP",
        2.74,
        null,
        "Zumit Cold Pressed Energy is your perfect ally for those moments when you need a natural and healthy boost.",
        "./assets/juices/Energy.png",
        "cold-pressed",
        true
    ),
    (
        "juices",
        "Zumo Cold Pressed Boost HPP",
        2.74,
        null,
        "Zumit's Cold Pressed Boost is a revitalizing drink designed to naturally elevate your energy and well-being.",
        "./assets/juices/Boost.png",
        "cold-pressed",
        false
    ),
    (
        "juices",
        "Zumo De Naranja Recién Exprimada",
        3.50,
        null,
        "Zumit's HPP Squeezed Orange Juice offers a fresh and authentic taste in every bottle.",
        "./assets/juices/Naranja_2_litros.png",
        "special, orange",
        true
    ),
    -- !!!!!!!! SMOOTHIES !!!!!!!!
    (
        "smoothies",
        "Aguacate Mix",
        3.00,
        null,
        "Ice pop made with fresh strawberries from our region.",
        "./assets/smoothies/Aguacate_Mix.png",
        "fruits, vegetables",
        true
    ),
    (
        "smoothies",
        "Berries Paradies",
        2.99,
        null,
        "Ice pop made with freshly squeezed lemon juice.",
        "./assets/smoothies/Berries_Paradies.png",
        "berries",
        false
    ),
    (
        "smoothies",
        "Blue Lightning",
        3.45,
        null,
        "Fresh passion fruit ice_creams.",
        "./assets/smoothies/Blue_Lightning.png",
        "fruits",
        true
    ),
    (
        "smoothies",
        "Caribbean Passion",
        1.99,
        null,
        "Fresh mango ice_creams.",
        "./assets/smoothies/Caribbean_Passion.png",
        "fruits",
        true
    ),
    (
        "smoothies",
        "Colada Jungle",
        4.49,
        null,
        "Ice pop made of hazelnuts with hazelnut, chocolate and wafer swirls, developed exclusively for Lucciano's in Italy.",
        "./assets/smoothies/Colada_Jungle.png",
        "fruits",
        true
    ),
    (
        "smoothies",
        "Delightful",
        3.45,
        null,
        "Ice pop made with whipped cream, with chocolate ganache and chocolate cookie swirls, decorated with stracciatella coated cookies.",
        "./assets/smoothies/Delightful.png",
        "fruits, berries",
        false
    ),
    (
        "smoothies",
        "Dragon Fruit_Mix",
        3.00,
        null,
        "Ice pop made of Italian mascarpone with a Patagonian berry swirl.",
        "./assets/smoothies/Dragon_Fruit_Mix.png",
        "fruits, berries",
        false
    ),
    (
        "smoothies",
        "Ginger Boost",
        4.49,
        null,
        "Peanut icepop without added sugar.",
        "./assets/smoothies/Ginger_Boost.png",
        "fruits",
        true
    ),
    (
        "smoothies",
        "Green Power",
        3.45,
        null,
        "Strawberry whipped cream ice pop, a perfect combination of texture and flavor.",
        "./assets/smoothies/Green_Power.png",
        "vegetables, fruits",
        false
    ),
    (
        "smoothies",
        "Squeeze Nature",
        1.99,
        null,
        "Whipped cream ice pop, coated with semi- sweet Belgian chocolate and small pieces of caramelized peanuts.",
        "./assets/smoothies/Squeeze_Nature.png",
        "vegetables, fruits,",
        true
    ),
    (
        "smoothies",
        "Tropical Heaven",
        3.00,
        null,
        "Milk caramel ice pop, coated with Belgian white chocolate and small pieces of caramelized peanuts.",
        "./assets/smoothies/Tropical_Heaven.png",
        "fruits",
        true
    ),
    (
        "smoothies",
        "Vitality",
        2.99,
        3.50,
        "Lucciano’s chocolate ice pop, coated with semi-sweet Belgian chocolate with small pieces of caramelized peanuts.",
        "./assets/smoothies/Vitality.png",
        "berries, fruits, discount",
        true
    ),
    (
        "smoothies",
        "Watermelon Summer",
        4.49,
        null,
        "Strawberry whipped cream ice pop, coated with pink tinted Belgian white chocolate. It is decorated with multicolored sprinkles and white chocolate eyes.",
        "./assets/smoothies/Watermelon_Summer.png",
        "berries, fruits, special offer",
        false
    );

CREATE TABLE IF NOT EXISTS
    sells (
        id INT AUTO_INCREMENT PRIMARY KEY,
        products VARCHAR(200) NOT NULL,
        total_price DECIMAL(5, 2) NOT NULL,
        id_user INT NOT NULL,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        tel VARCHAR(10),
        address VARCHAR(100),
        purchase_date DATE NOT NULL
    );

DELETE FROM sells;

INSERT INTO
    sells (
        products,
        total_price,
        id_user,
        username,
        email,
        tel,
        address,
        purchase_date
    )
VALUES
    (
        "Chocolates x 2",
        7.49,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-14"
    ),
    (
        "Cookies x 3",
        13.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-14"
    ),
    (
        "Ice creams x 2",
        9,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-14"
    ),
    (
        "Ice Bars x 2",
        10,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-14"
    ),
    (
        "Smoothies x 5",
        15,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-14"
    ),
    (
        "Milkshakes x 1",
        2.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-04-14"
    ),
    (
        "Chocolates x 4",
        8.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-07-14"
    ),
    (
        "Juices x 2",
        3.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-05-14"
    ),
    (
        "Cookies x 2",
        5.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-05-23"
    ),
    (
        "Ice Creams x 2 Cookies x 3",
        10.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2023-11-14"
    ),
    (
        "Chocolates x 2 Ice Bars x 1",
        11.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-11"
    ),
    (
        "Cookies x 1 Juices x 3",
        13.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2015-10-14"
    ),
    (
        "Ice Creams x 5 Ice Bars x 6",
        55.50,
        1,
        "root",
        "root@email.com",
        "123456789",
        "c/ Root Av",
        "2021-11-14"
    ),
    (
        "Chocolates x 2",
        7.49,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2025-01-14"
    ),
    (
        "Cookies x 3",
        13.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2015-11-11"
    ),
    (
        "Ice creams x 2",
        9,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-10"
    ),
    (
        "Ice Bars x 2",
        10,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2015-11-14"
    ),
    (
        "Smoothies x 5",
        15,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2015-11-14"
    ),
    (
        "Milkshakes x 1",
        2.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2024-12-14"
    ),
    (
        "Chocolates x 4",
        8.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2022-11-24"
    ),
    (
        "Juices x 2",
        3.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2021-11-15"
    ),
    (
        "Cookies x 2",
        5.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2023-11-11"
    ),
    (
        "Ice Creams x 2 Cookies x 3",
        10.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-12"
    ),
    (
        "Chocolates x 2 Ice Bars x 1",
        11.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2025-10-14"
    ),
    (
        "Cookies x 1 Juices x 3",
        13.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2023-11-14"
    ),
    (
        "Ice Creams x 5 Ice Bars x 6",
        55.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2024-11-14"
    ),
    (
        "Chocolates x 2",
        7.49,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2025-01-14"
    ),
    (
        "Cookies x 3",
        13.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2015-11-11"
    ),
    (
        "Ice creams x 2",
        9,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-10"
    ),
    (
        "Ice Bars x 2",
        10,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2015-11-14"
    ),
    (
        "Smoothies x 5",
        15,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2015-11-14"
    ),
    (
        "Milkshakes x 1",
        2.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2024-12-14"
    ),
    (
        "Chocolates x 4",
        8.50,
        2,
        "reis",
        "reis@email.com",
        "123456789",
        "c/ Root Av",
        "2022-11-24"
    ),
    (
        "Juices x 2",
        3.50,
        3,
        "vadim",
        "vadim@email.com",
        "123456789",
        "c/ Root Av",
        "2021-11-15"
    ),
    (
        "Cookies x 2",
        5.50,
        3,
        "vadim",
        "vadim@email.com",
        "123456789",
        "c/ Root Av",
        "2023-11-11"
    ),
    (
        "Ice Creams x 2 Cookies x 3",
        10.50,
        3,
        "vadim",
        "vadim@email.com",
        "123456789",
        "c/ Root Av",
        "2025-11-12"
    ),
    (
        "Chocolates x 2 Ice Bars x 1",
        11.50,
        3,
        "vadim",
        "vadim@email.com",
        "123456789",
        "c/ Root Av",
        "2025-10-14"
    ),
    (
        "Cookies x 1 Juices x 3",
        13.50,
        3,
        "vadim",
        "vadim@email.com",
        "123456789",
        "c/ Root Av",
        "2023-11-14"
    ),
    (
        "Ice Creams x 5 Ice Bars x 6",
        55.50,
        3,
        "vadim",
        "vadim@email.com",
        "123456789",
        "c/ Root Av",
        "2024-11-14"
    );

CREATE TABLE IF NOT EXISTS
    users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL,
        password CHAR(64) NOT NULL,
        isAdmin BOOLEAN
    );

INSERT INTO
    users (email, username, password, isAdmin)
VALUES
    (
        "root@email.com",
        "root",
        "$2y$10$GjfZDDSll.xyzdoNDK15/.j3gj.l./OPk.2NZwZDYMEmh7u204CKG",
        true
    ),
    (
        "reis@email.com",
        "Reis",
        "$2y$10$2TQgx4LC9827JY4f8zbjYOjeiPH.8voF83heJ77sIsnn0gWn9unSe",
        true
    ),
    (
        "vadim@email.com",
        "Vadim",
        "$2y$10$sGI86HHtVZ9PxTCVEYyffOOtsVIjQflYhh56is6C2q.TvBBYXZ9Za",
        false
    );

CREATE TABLE IF NOT EXISTS
    reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_user INT NOT NULL,
        username VARCHAR(50) NOT NULL,
        review VARCHAR(300) NOT NULL,
        post_date DATE NOT NULL
    );

DELETE FROM reviews;

INSERT INTO
    reviews (id_user, username, review, post_date)
VALUES
    (3, "vadim", "This store is awesome!", "2025-01-01"),
    (1, "root", "Tasty!", "2025-02-02"),
    (3, "vadim", "Very good!", "2025-03-03");

CREATE TABLE IF NOT EXISTS
    mails (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        message VARCHAR(300) NOT NULL,
        email VARCHAR(50) NOT NULL,
        post_date Date NOT NULL
    );

DELETE FROM mails;

INSERT INTO
    mails (title, message, email, post_date)
VALUES
    (
        "About problem",
        "Lorem Ipsim.",
        "root@email.com",
        "2025-11-01"
    ),
    (
        "Something else",
        "Lorem Ipsim.",
        "root@email.com",
        "2025-01-01"
    ),
    (
        "Store review",
        "Lorem Ipsim.",
        "root@email.com",
        "2025-02-01"
    ),
    (
        "Example",
        "Lorem Ipsim.",
        "root@email.com",
        "2025-03-01"
    );

COMMIT;