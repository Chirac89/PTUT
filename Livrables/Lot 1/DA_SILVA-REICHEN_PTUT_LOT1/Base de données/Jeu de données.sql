INSERT INTO customers VALUES ('CST100000000000','DA SILVA', 'Alex', 'alexdasilva@gmail.com', 'azerty', '2022-04-01', '2002-09-04');
INSERT INTO customers VALUES ('CST100000000001', 'REICHEN', 'Anthony', 'anthonyreichen@gmail.com', '1234', '2022-04-02', '1993-04-01');
INSERT INTO customers VALUES ('CST100000000002', 'CHEFFE', 'Carlos', 'carloscheffe@gmail.com', '0000', '2022-05-10', '1999-02-02');

INSERT INTO categories VALUES ('CAT000000100000', 'Ordinateur');
INSERT INTO categories VALUES ('CAT000000100001', 'Accessoires');
INSERT INTO categories VALUES ('CAT000000100002', 'Meubles');

INSERT INTO subcategories VALUES ('SBC000000100000', 'CAT000000100000', 'PC Portable');
INSERT INTO subcategories VALUES ('SBC000000100001', 'CAT000000100001', 'Souris');
INSERT INTO subcategories VALUES ('SBC000000100002', 'CAT000000100002', 'Chaise Gaming');

INSERT INTO products VALUES ('PRD000100000000', 'CAT000000100000', 'SBC000000100000', 'Asus ROG Zephyrus', 2995.94, 
'Un PC bien mais très très cher !', 0, 15, 1);
INSERT INTO products VALUES ('PRD000100000001', 'CAT000000100001', 'SBC000000100001', 'Razer Pro Tournament', 69.99, 
NULL, 10, 19, 34);
INSERT INTO products VALUES ('PRD000100000002', 'CAT000000100002', 'SBC000000100002', 'Cloud Gaming Super Chair', 230.5, 
'Pour ne pas avoir mal au dos', 0, 10, 18);
