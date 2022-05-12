










CREATE TABLE reviews (
    PK_FK_product_ID VARCHAR,
    PK_FK_customer_ID VARCHAR,
    PK_review_date DATE,
    
    review_content TEXT,
    review_rating FLOAT NOT NULL,
    
    
    CONSTRAINT PK_review PRIMARY KEY (PK_FK_product_ID, PK_FK_customer_ID, PK_date),
    CONSTRAINT FK_review_product_ID FOREIGN KEY (PK_FK_product_ID) REFERENCES products(PK_product_ID),
    CONSTRAINT FK_review_customer_ID FOREIGN KEY (PK_FK_customer_ID) REFERENCES customers(PK_customer_ID),
    
    CONSTRAINT CHK_review_date CHECK (PK_review_date BETWEEN 1 AND 10)
);


CREATE TABLE adresses (
    PK_adress_number int,
    PK_FK_customer_ID VARCHAR,
    
    adress_wording VARCHAR,
    adress_street VARCHAR NOT NULL,
    adress_street_complement VARCHAR,
    adress_postal_code VARCHAR NOT NULL ,
    adress_city VARCHAR NOT NULL,
    adress_country VARCHAR NOT NULL,
    
    CONSTRAINT PK_adress PRIMARY KEY (PK_adress_number, PK_FK_customer_ID),
    CONSTRAINT FK_adress_customer_ID FOREIGN KEY (PK_FK_customer_ID) REFERENCES customers(PK_customer_ID)
);


CREATE TABLE cart_elements (
    PK_FK_customer_ID VARCHAR,
    PK_FK_product_ID VARCHAR,
    
    cart_element_quantity INT NOT NULL,
    
    CONSTRAINT PK_cart PRIMARY KEY (PK_FK_customer_ID, PK_FK_product_ID),
    CONSTRAINT FK_cart_element_customer_ID FOREIGN KEY (PK_FK_customer_ID) REFERENCES customers(PK_customer_ID),
    CONSTRAINT PK_cart__element_product_ID FOREIGN KEY (PK_FK_product_ID) REFERENCES products(PK_product_ID),
    
    CONSTRAINT CHK_cart_element_quantity CHECK (cart_element_quantity > 0)
);

CREATE TABLE wishlist_elements (
    PK_FK_customer_ID VARCHAR,
    PK_FK_product_ID VARCHAR,
    
    wishlist_element_quantity INT NOT NULL,
    
    CONSTRAINT PK_wishlist PRIMARY KEY (PK_FK_customer_ID, PK_FK_product_ID),
    CONSTRAINT FK_whislist_element_customer_ID FOREIGN KEY (PK_FK_customer_ID) REFERENCES customers(PK_customer_ID),
    CONSTRAINT FK_wishlist__element_product_ID FOREIGN KEY (PK_FK_product_ID) REFERENCES products(PK_product_ID),
    
    CONSTRAINT CHK_wishlist_element_quantity CHECK (wishlist_element_quantity > 0)
);

CREATE TABLE transactions (
    PK_transation_ID VARCHAR,
    FK_customer_ID VARCHAR NOT NULL,
    FK_delivery_adress VARCHAR NOT NULL,
    
    transaction_datetime DATE NOT NULL,
    
    CONSTRAINT PK_transaction PRIMARY KEY (PK_transaction_ID),
    CONSTRAINT FK_transaction_customer_ID FOREIGN KEY (FK_customer_ID) REFERENCES customers(PK_customer_ID),
    CONSTRAINT FK_transaction_delivery_adress FOREIGN KEY (FK_delivery_adress) REFERENCES adresses(PK_adress_ID),
    
    CONSTRAINT UNIQUE_transaction_date_customer UNIQUE (FK_customer_ID, transaction_datetime)
);

CREATE TABLE transaction_elements (
    PK_FK_transaction_ID VARCHAR,
    PK_FK_product_ID VARCHAR,
    
    transaction_element_price FLOAT NOT NULL,
    transaction_element_quantity INT NOT NULL,
    
    CONSTRAINT PK_transaction_element PRIMARY KEY (PK_FK_transaction_ID, PK_FK_product_ID),
    CONSTRAINT FK_transaction_element_transaction_ID FOREIGN KEY (PK_FK_transaction_ID) REFERENCES transactions(PK_transaction_ID),
    CONSTRAINT FK_transaction__element_product_ID FOREIGN KEY (PK_FK_product_ID) REFERENCES products(PK_product_ID),
    
    CONSTRAINT CHK_transaction_element_quantity CHECK (transaction_element_quantity > 0),
    CONSTRAINT CHK_transaction_element_price CHECK (transaction_element_price >= 0)
);

CREATE TABLE logs (
    PK_ip_adress VARCHAR,
    PK_FK_customer_ID VARCHAR,
    
    log_session_starting TIME NOT NULL,
    log_session_ending TIME NOT NULL,
    
    CONSTRAINT PK_log PRIMARY KEY (PK_ip_adress, PK_FK_customer_ID),
    CONSTRAINT FK_log_customer_id FOREIGN KEY (PK_FK_customer_ID) REFERENCES customers(PK_customer_ID),
    
    CONSTRAINT CHK_log_session CHECK (log_session_starting < log_session_ending)
);

/*===============================================================================================================*/

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


