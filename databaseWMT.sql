DROP TABLE customer_stocks;
DROP TABLE transaction_histories;
DROP TABLE bank_accounts;
DROP TABLE meetings;
DROP TABLE customers;
DROP TABLE financial_advisors;

CREATE TABLE financial_advisors (
id INT PRIMARY KEY AUTO_INCREMENT,
fa_first_name VARCHAR(25) NOT NULL,
fa_last_name VARCHAR(25) NOT NULL,
fa_phone_no VARCHAR(25) NOT NULL,
fa_address VARCHAR(225) NOT NULL
)ENGINE=INNODB;

CREATE TABLE customers (
id INT PRIMARY KEY AUTO_INCREMENT,
first_name VARCHAR(25) NOT NULL,
last_name VARCHAR(25) NOT NULL,
phone_number VARCHAR(25) NOT NULL,
address VARCHAR(225) NOT NULL,
fa_id INT,
FOREIGN KEY (fa_id) REFERENCES financial_advisors(id) 
)ENGINE=INNODB;


CREATE TABLE bank_accounts (
account_number INT NOT NULL,
customer_id INT NOT NULL,
iban VARCHAR(34) NOT NULL,
bank_name VARCHAR(25) NOT NULL,
bank_address VARCHAR(225) NOT NULL,
balance INT NOT NULL,
PRIMARY KEY (account_number),
FOREIGN KEY (customer_id) REFERENCES customers(id) 
)ENGINE=INNODB;


CREATE TABLE transaction_histories (
id INT AUTO_INCREMENT,
customer_id INT NOT NULL,
date_of_trans DATE NOT NULL,
account_num INT NOT NULL,
fa_id INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (customer_id) REFERENCES customers(id),
FOREIGN KEY (fa_id) REFERENCES financial_advisors(id),
FOREIGN KEY (account_num) REFERENCES bank_accounts(account_number)  
)ENGINE=INNODB;

CREATE TABLE customer_stocks (
id INT PRIMARY KEY AUTO_INCREMENT,
customer_id INT,
company VARCHAR(4) NOT NULL,
shares_no INT NOT NULL,
history_ref INT NOT NULL,
FOREIGN KEY (customer_id) REFERENCES customers(id),
FOREIGN KEY (history_ref) REFERENCES transaction_histories(id)
)ENGINE=INNODB;

CREATE TABLE meetings (
id INT PRIMARY KEY AUTO_INCREMENT,
meeting_date_time DATETIME NOT NULL,
meeting_description VARCHAR(225),
meeting_customer INT NOT NULL,
FOREIGN KEY (meeting_customer) REFERENCES customers(id)
)ENGINE=INNODB;

INSERT INTO financial_advisors (fa_first_name,fa_last_name,fa_phone_no,fa_address) VALUES ('Rob','Pooley',07898334332,'11 Grove Street, Compton, USA');

INSERT INTO customers (first_name,last_name,phone_number,address,fa_id) VALUES ('Walter','White',07838374733,'2 Mulholland Drive, London, UK',1);

INSERT INTO bank_accounts (account_number,customer_id,iban,bank_name,bank_address,balance) VALUES (1432123,1,12342345,'Large Bank lol','141 Waterloo Street, Glasgow, UK',5000);

INSERT INTO transaction_histories (customer_id,date_of_trans,account_num,fa_ID) VALUES (1,'2014-11-24',1432123,1);

INSERT INTO customer_stocks (customer_id,company,shares_no,history_ref) VALUES (1,'GOOG',3000,1);

INSERT INTO meetings (meeting_date_time,meeting_description,meeting_customer) VALUES ('2015-02-11 13:30:00','Meeting to discuss progress of investments',1);  
