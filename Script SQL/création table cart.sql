-- création table 'cart'

CREATE TABLE `tawagoto_test`.`cart` 
	( 
	`id_cart` INT(11) NOT NULL AUTO_INCREMENT ,
	`FK_cart_customers_ID` INT(11) NOT NULL ,
	`FK_cart_products_ID` INT(11) NOT NULL ,
	`quantity` INT NOT NULL , 
	`add_date` DATETIME NOT NULL , 
	
	PRIMARY KEY (`id_cart`),
	CONSTRAINT C_FK_cart_product_ID FOREIGN KEY (FK_cart_products_ID) REFERENCES products(PK_product_ID),
	CONSTRAINT C_FK_cart_customer_ID FOREIGN KEY (FK_cart_customers_ID) REFERENCES customers(PK_customer_ID)
	) 
	
	ENGINE = InnoDB;