CREATE TABLE customers (
    PK_customer_ID CHAR(15),
    
    customer_lastName VARCHAR(255) NOT NULL,
    customer_firstName VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_passwordHash VARCHAR(255) NOT NULL,
    customer_accountCreationDate DATE NOT NULL,
    customer_birthday DATE NOT NULL,
    
    CONSTRAINT C_PK_customer PRIMARY KEY (PK_customer_ID),
    CONSTRAINT C_UC_customer_email UNIQUE (customer_email)
);

CREATE TABLE categories (
    PK_cat_ID CHAR(15),
    
    cat_wording VARCHAR(255) NOT NULL,
    
    CONSTRAINT C_PK_category PRIMARY KEY (PK_cat_ID)
);

CREATE TABLE subcategories (
    PK_subcat_ID CHAR(15),
    FK_subcat_cat_ID CHAR(15),
    
    subcat_wording VARCHAR(255) NOT NULL,
    
    CONSTRAINT C_PK_subcategory PRIMARY KEY (PK_subcat_ID),
    CONSTRAINT C_FK_subcategory_cat_ID FOREIGN KEY (FK_subcat_cat_ID) REFERENCES categories(PK_cat_ID)
);

CREATE TABLE products (
    PK_product_ID CHAR(15),
    FK_product_cat_ID CHAR(15) NOT NULL,
    FK_product_subcat_ID CHAR(15),
    
    product_wording VARCHAR(255) NOT NULL,
    product_price FLOAT NOT NULL,
    product_description TEXT,
    product_discountRate INT NOT NULL,
    product_alertThreshold INT NOT NULL,
    product_stock INT NOT NULL,
    
    CONSTRAINT C_PK_product PRIMARY KEY (PK_product_ID),
    CONSTRAINT C_FK_product_cat_ID FOREIGN KEY (FK_product_cat_ID) REFERENCES categories(PK_cat_ID),
    CONSTRAINT C_FK_product_subcat_ID FOREIGN KEY (FK_product_subcat_ID) REFERENCES subcategories(PK_subcat_ID)
);

CREATE TABLE pictures (
    PK_picture_ID CHAR(10),
    FK_picture_product_ID CHAR(10),
    
    picture_path VARCHAR(255) NOT NULL,
    
    CONSTRAINT C_PK_picture PRIMARY KEY (PK_picture_ID),
    CONSTRAINT C_FK_picture_product_ID FOREIGN KEY (FK_picture_product_ID) REFERENCES products(PK_product_ID)
);