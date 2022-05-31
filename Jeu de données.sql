INSERT INTO `customers` (`customer_lastName`, `customer_firstName`, `customer_email`, `customer_passwordHash`, `customer_accountCreationDate`, `customer_birthday`) VALUES ('DA SILVA', 'Alex', 'alexdasilva@gmail.com', 'azerty', '2022-04-01', '2002-09-04');
INSERT INTO `customers` (`customer_lastName`, `customer_firstName`, `customer_email`, `customer_passwordHash`, `customer_accountCreationDate`, `customer_birthday`) VALUES ('REICHEN', 'Anthony', 'anthonyreichen@gmail.com', '1234', '2022-04-02', '1993-04-01');
INSERT INTO `customers` (`customer_lastName`, `customer_firstName`, `customer_email`, `customer_passwordHash`, `customer_accountCreationDate`, `customer_birthday`) VALUES ('CHEFFE', 'Carlos', 'carloscheffe@gmail.com', '0000', '2022-05-10', '1999-02-02');

INSERT INTO categories (cat_name) VALUES ('Ordinateur');
INSERT INTO categories (cat_name) VALUES ('Accessoires');
INSERT INTO categories (cat_name) VALUES ('Meubles');

INSERT INTO `subcategories`(`FK_subcat_cat_ID`, `subcat_name`) VALUES (1001, 'PC Portable');
INSERT INTO `subcategories`(`FK_subcat_cat_ID`, `subcat_name`) VALUES (1002, 'Souris');
INSERT INTO `subcategories`(`FK_subcat_cat_ID`, `subcat_name`) VALUES (1003, 'Chaise Gaming');

INSERT INTO `products`(`FK_product_cat_ID`, `FK_product_subcat_ID`, `product_name`, `product_price`, `product_description`, `product_alertThreshold`, `product_stock`) VALUES (1001, 1001, 'Asus ROG Zephyrus', 2995.94, 
'Un PC bien mais très très cher !', 15, 1);
INSERT INTO `products`(`FK_product_cat_ID`, `FK_product_subcat_ID`, `product_name`, `product_price`, `product_description`, `product_alertThreshold`, `product_stock`) VALUES (1002, 1002, 'Razer Pro Tournament', 69.99, 
NULL, 19, 34);
INSERT INTO `products`(`FK_product_cat_ID`, `FK_product_subcat_ID`, `product_name`, `product_price`, `product_description`, `product_alertThreshold`, `product_stock`) VALUES(1003, 1003, 'Cloud Gaming Super Chair', 230.5, 
'Pour ne pas avoir mal au dos', 10, 18);