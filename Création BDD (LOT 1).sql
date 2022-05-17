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
    PK_FK_promotion_product_ID INT NOT NULL,
    PK_promotion_start DATETIME NOT NULL,
    PK_promotion_end DATETIME NOT NULL,
    
    promotion_name VARCHAR(255),
    promotion_discountRate INT NOT NULL,
    
    PRIMARY KEY (PK_FK_promotion_product_ID, PK_promotion_start, PK_promotion_end),
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