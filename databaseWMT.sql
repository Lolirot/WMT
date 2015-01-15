DROP TABLE CustomerStock;
DROP TABLE TransactionHistory;
DROP TABLE BankAccount;
DROP TABLE Meetings;
DROP TABLE Customer;
DROP TABLE FinancialAdvisor;

CREATE TABLE FinancialAdvisor (
faID INT PRIMARY KEY AUTO_INCREMENT,
faFirstName VARCHAR(25) NOT NULL,
faLastName VARCHAR(25) NOT NULL,
faPhoneNo VARCHAR(25) NOT NULL,
faAddress VARCHAR(225) NOT NULL
)ENGINE=INNODB;

CREATE TABLE Customer (
customerID INT PRIMARY KEY AUTO_INCREMENT,
firstName VARCHAR(25) NOT NULL,
lastName VARCHAR(25) NOT NULL,
phoneNumber VARCHAR(25) NOT NULL,
address VARCHAR(225) NOT NULL,
faID INT,
FOREIGN KEY (faID) REFERENCES FinancialAdvisor(faID) 
)ENGINE=INNODB;


CREATE TABLE BankAccount (
accountNumber INT NOT NULL,
customerID INT NOT NULL,
iban BIGINT NOT NULL,
bankName VARCHAR(25) NOT NULL,
bankAddress VARCHAR(225) NOT NULL,
balance INT NOT NULL,
PRIMARY KEY (accountNumber),
FOREIGN KEY (customerID) REFERENCES Customer(customerID) 
)ENGINE=INNODB;


CREATE TABLE TransactionHistory (
historyRef INT AUTO_INCREMENT,
customerID INT NOT NULL,
dateOfTrans DATE NOT NULL,
accountNum INT NOT NULL,
faID INT NOT NULL,
PRIMARY KEY (historyRef),
FOREIGN KEY (customerID) REFERENCES Customer(customerID),
FOREIGN KEY (faID) REFERENCES FinancialAdvisor(faID),
FOREIGN KEY (accountNum) REFERENCES BankAccount(accountNumber)  
)ENGINE=INNODB;

CREATE TABLE CustomerStock (
customerID INT,
company VARCHAR(4) NOT NULL,
sharesNo INT NOT NULL,
historyRef INT NOT NULL,
PRIMARY KEY (customerID,historyRef),
FOREIGN KEY (customerID) REFERENCES Customer(customerID),
FOREIGN KEY (historyRef) REFERENCES TransactionHistory(historyRef)
)ENGINE=INNODB;

CREATE TABLE Meetings (
meetingRef INT PRIMARY KEY AUTO_INCREMENT,
meetingDate DATE NOT NULL,
meetingTime TIME NOT NULL,
meetingDescription VARCHAR(225),
meetingCustomer INT NOT NULL,
FOREIGN KEY (meetingCustomer) REFERENCES Customer(customerID)
)ENGINE=INNODB;

INSERT INTO FinancialAdvisor (faFirstName,faLastName,faPhoneNo,faAddress) VALUES ('Rob','Pooley',07898334332,'11 Grove Street, Compton, USA');
INSERT INTO FinancialAdvisor (faFirstName,faLastName,faPhoneNo,faAddress) VALUES ('Alan','Smith',07364756335,'2 Mulholland Drive, London, UK');

INSERT INTO Customer (firstName,lastName,phoneNumber,address,faID) VALUES ('Walter','White',07838374733,'2 Mulholland Drive, London, UK',1);

INSERT INTO BankAccount (accountNumber,customerID,iban,bankName,bankAddress,balance) VALUES (1432123,1,12342345,'Large Bank lol','141 Waterloo Street, Glasgow, UK',5000);

INSERT INTO TransactionHistory (customerID,dateOfTrans,accountNum,faID) VALUES (1,'2014-11-24',1432123,1);

INSERT INTO CustomerStock VALUES (1,'GOOG',3000,1);

INSERT INTO Meetings (meetingDate,meetingTime,meetingDescription,meetingCustomer) VALUES ('2015-02-11','13:30:00','Meeting to discuss progress of investments',1);  
