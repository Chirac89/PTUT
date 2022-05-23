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