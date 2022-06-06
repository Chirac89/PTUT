-- Lors du rendu du lot 1, seule la table `products` a réellement été utilisée. Etant donné que de nombreuses modifications ont été apportées aux tables, notamment du fait que le type de toutes les clés primaires soit passé de
-- VarChar à int avec auto incrémentation, nous avons jugé préférable de supprimer les tables déjà existantes afin d'en générer de nouvelles avec le script ci-dessous

CREATE TABLE customers (
    PK_customer_ID INT NOT NULL AUTO_INCREMENT,
    
    customer_lastName VARCHAR(255) NOT NULL,
    customer_firstName VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_passwordHash VARCHAR(255) NOT NULL,
    customer_accountCreationDate DATE NOT NULL DEFAULT CURRENT_DATE,
    customer_birthday DATE NOT NULL,
    
    PRIMARY KEY (PK_customer_ID),
    CONSTRAINT C_UC_customer_email UNIQUE (customer_email)
);

ALTER TABLE customers AUTO_INCREMENT=1000000001;


CREATE TABLE categories (
    PK_cat_ID INT NOT NULL AUTO_INCREMENT,
    
    cat_name VARCHAR(255) NOT NULL,
    
    PRIMARY KEY (PK_cat_ID),
    CONSTRAINT C_UC_cat_name UNIQUE (cat_name)
);

ALTER TABLE categories AUTO_INCREMENT=1001;


CREATE TABLE subcategories (
    PK_subcat_ID INT NOT NULL AUTO_INCREMENT,
    FK_subcat_cat_ID INT NOT NULL,
    
    subcat_name VARCHAR(255) NOT NULL,
    
    PRIMARY KEY (PK_subcat_ID),
    CONSTRAINT C_FK_subcategory_cat_ID FOREIGN KEY (FK_subcat_cat_ID) REFERENCES categories(PK_cat_ID),
    CONSTRAINT C_UC_subcat_name UNIQUE (subcat_name)
);

ALTER TABLE subcategories AUTO_INCREMENT=1001;


CREATE TABLE products (
    PK_product_ID INT NOT NULL AUTO_INCREMENT,
    FK_product_cat_ID INT NOT NULL,
    FK_product_subcat_ID INT,
    
    product_name VARCHAR(255) NOT NULL,
    product_price FLOAT NOT NULL,
    product_description TEXT,
    product_alertThreshold INT NOT NULL,
    product_stock INT NOT NULL,
    
    PRIMARY KEY (PK_product_ID),
    CONSTRAINT C_FK_product_cat_ID FOREIGN KEY (FK_product_cat_ID) REFERENCES categories(PK_cat_ID),
    CONSTRAINT C_FK_product_subcat_ID FOREIGN KEY (FK_product_subcat_ID) REFERENCES subcategories(PK_subcat_ID)
);

ALTER TABLE products AUTO_INCREMENT=100001;


CREATE TABLE promotions (
    PK_promotion_ID INT NOT NULL AUTO_INCREMENT,

    promotion_start TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    promotion_end TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    promotion_name VARCHAR(255) NOT NULL,
    promotion_discountRate INT NOT NULL,
    
    PRIMARY KEY (PK_promotion_ID),
    CONSTRAINT C_UC_promotion_nameDate UNIQUE (promotion_start, promotion_end, promotion_name)
);

ALTER TABLE pictures AUTO_INCREMENT = 11;


CREATE TABLE promoted_products (
    PK_FK_promotion_ID INT NOT NULL,
    PK_FK_promotion_product_ID INT NOT NULL,
    
    PRIMARY KEY (PK_FK_promotion_ID, PK_FK_promotion_product_ID),
    CONSTRAINT C_FK_promotion_ID FOREIGN KEY (PK_FK_promotion_ID) REFERENCES promotions(PK_promotion_ID),
    CONSTRAINT C_FK_promotion_product_ID FOREIGN KEY (PK_FK_promotion_product_ID) REFERENCES products(PK_product_ID)
);


CREATE TABLE pictures (
    PK_picture_ID INT NOT NULL AUTO_INCREMENT,
    FK_picture_product_ID INT NOT NULL,
    
    picture_path VARCHAR(255) NOT NULL,
    
    PRIMARY KEY (PK_picture_ID),
    CONSTRAINT C_FK_picture_product_ID FOREIGN KEY (FK_picture_product_ID) REFERENCES products(PK_product_ID)
);

ALTER TABLE pictures AUTO_INCREMENT=100001;


CREATE TABLE reviews (
    PK_FK_review_product_ID INT NOT NULL,
    PK_FK_review_customer_ID INT NOT NULL,
    PK_review_date DATE NOT NULL,
    
    review_content TEXT,
    review_rating FLOAT NOT NULL,
    
    
    PRIMARY KEY (PK_FK_review_product_ID, PK_FK_review_customer_ID, PK_review_date),
    CONSTRAINT C_FK_review_product_ID FOREIGN KEY (PK_FK_review_product_ID) REFERENCES products(PK_product_ID),
    CONSTRAINT C_FK_review_customer_ID FOREIGN KEY (PK_FK_review_customer_ID) REFERENCES customers(PK_customer_ID)
);


CREATE TABLE adresses (
    PK_adress_number INT NOT NULL AUTO_INCREMENT,
    PK_FK_adress_customer_ID INT NOT NULL,
    
    adress_name VARCHAR(255),
    adress_street VARCHAR(255) NOT NULL,
    adress_streetComplement VARCHAR(255),
    adress_postalCode VARCHAR(255) NOT NULL ,
    adress_city VARCHAR(255) NOT NULL,
    adress_country VARCHAR(255) NOT NULL,
    
    PRIMARY KEY (PK_adress_number, PK_FK_adress_customer_ID),
    CONSTRAINT C_FK_adress_customer_ID FOREIGN KEY (PK_FK_adress_customer_ID) REFERENCES customers(PK_customer_ID)
);

ALTER TABLE adresses AUTO_INCREMENT=1;


CREATE TABLE carts (
    PK_FK_cart_customer_ID INT NOT NULL,
    PK_FK_cart_product_ID INT NOT NULL,
    
    cart_quantity INT NOT NULL,
    
    PRIMARY KEY (PK_FK_cart_customer_ID, PK_FK_cart_product_ID),
    CONSTRAINT C_FK_cart_customer_ID FOREIGN KEY (PK_FK_cart_customer_ID) REFERENCES customers(PK_customer_ID),
    CONSTRAINT C_PK_cart_product_ID FOREIGN KEY (PK_FK_cart_product_ID) REFERENCES products(PK_product_ID)
);


CREATE TABLE wishlists (
    PK_FK_whishlist_customer_ID INT NOT NULL,
    PK_FK_whishlist_product_ID INT NOT NULL,
    
    wishlist_quantity INT NOT NULL,
    
    PRIMARY KEY (PK_FK_whishlist_customer_ID, PK_FK_whishlist_product_ID),
    CONSTRAINT C_FK_whislist_customer_ID FOREIGN KEY (PK_FK_whishlist_customer_ID) REFERENCES customers(PK_customer_ID),
    CONSTRAINT C_FK_wishlist_product_ID FOREIGN KEY (PK_FK_whishlist_product_ID) REFERENCES products(PK_product_ID)
);


CREATE TABLE facturations (
    PK_facturation_ID INT NOT NULL AUTO_INCREMENT,
    FK_facturation_customer_ID INT NOT NULL,
    FK_facturation_deliveryAdress INT NOT NULL,
    
    facturation_datetime DATETIME NOT NULL,
    
   	PRIMARY KEY (PK_facturation_ID),
    CONSTRAINT C_FK_facturation_customer_ID FOREIGN KEY (FK_facturation_customer_ID) REFERENCES customers(PK_customer_ID),
    CONSTRAINT C_FK_facturation_deliveryAdress FOREIGN KEY (FK_facturation_deliveryAdress) REFERENCES adresses(PK_adress_number),
    
    CONSTRAINT C_UC_facturation_datetime_customer UNIQUE (FK_facturation_customer_ID, facturation_datetime)
);

ALTER TABLE facturations AUTO_INCREMENT=1000000001;

CREATE TABLE orders (
    PK_FK_order_facturation_ID INT NOT NULL,
    PK_FK_order_product_ID INT NOT NULL,
    
    order_price FLOAT NOT NULL,
    order_quantity INT NOT NULL,
    
    PRIMARY KEY (PK_FK_order_facturation_ID, PK_FK_order_product_ID),
    CONSTRAINT C_FK_order_facturation_ID FOREIGN KEY (PK_FK_order_facturation_ID) REFERENCES facturations(PK_facturation_ID),
    CONSTRAINT C_FK_order_product_ID FOREIGN KEY (PK_FK_order_product_ID) REFERENCES products(PK_product_ID)
);