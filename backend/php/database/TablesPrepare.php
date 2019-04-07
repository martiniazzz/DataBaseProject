<?php

require "Database.php";

$pdo = Database::connect();

//STORAGE MANAGERS
$sql_managers = "CREATE TABLE IF NOT EXISTS  StorageManagers(idManager NVARCHAR(50) PRIMARY KEY,
                                                  lastName NVARCHAR(50) NOT NULL,
                                                  firstName NVARCHAR(50) NOT NULL,
                                                  midName NVARCHAR(50) NOT NULL);";
$pdo->exec($sql_managers);

//RESPONSIBLE PERSONS
$sql_resp_persons = "CREATE TABLE IF NOT EXISTS  ResponsiblePersons(idRespPerson NVARCHAR(50) PRIMARY KEY,
                                                  lastName NVARCHAR(50) NOT NULL,
                                                  firstName NVARCHAR(50) NOT NULL,
                                                  midName NVARCHAR(50) NOT NULL,
                                                  department NVARCHAR(100) NOT NULL);";
$pdo->exec($sql_resp_persons);

//PROVIDERS
$sql_providers ="CREATE TABLE IF NOT EXISTS Providers(idProvider INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                companyName NVARCHAR(100) NOT NULL, 
                                                country NVARCHAR(50) NOT NULL, 
                                                sity NVARCHAR(50) NOT NULL, 
                                                street NVARCHAR(50) NOT NULL, 
                                                buildNo INT(10) NOT NULL, 
                                                account INT(20) NOT NULL,
                                                email NVARCHAR(100) NULL);" ;
$pdo->exec($sql_providers);

//PROVIDERS PHONES
$sql_phones = "CREATE TABLE IF NOT EXISTS  Phones(phone NVARCHAR(20) PRIMARY KEY,
                                                  idProvider INT(11),
                                                  FOREIGN KEY (idProvider) REFERENCES Providers(idProvider));";
$pdo->exec($sql_phones);

//DELIVERIES
$sql_deliveries = "CREATE TABLE IF NOT EXISTS  Deliveries(idDelivery INT(20) PRIMARY KEY,
                                                  deliverDate DATE NOT NULL,
                                                  totalPrice DECIMAL(19,4) NULL,
                                                  idProvider INT(11),
                                                  idManager NVARCHAR(50),
                                                  FOREIGN KEY (idProvider) REFERENCES Providers(idProvider),
                                                  FOREIGN KEY (idManager) REFERENCES StorageManagers(idManager));";
$pdo->exec($sql_deliveries);

//MEDICINES
$sql_medicines = "CREATE TABLE IF NOT EXISTS  Medicines(idMedicine INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                  medName NVARCHAR(100) NOT NULL,
                                                  producer NVARCHAR(100) NOT NULL,
                                                  medDescript NVARCHAR(300) NOT NULL,
                                                  unitType NVARCHAR(50) NOT NULL,
                                                  unitAmount INT(5) NOT NULL,
                                                  storageTemp NVARCHAR(200) NOT NULL,
                                                  usabilityTerm INT(10) NOT NULL);";
$pdo->exec($sql_medicines);

//MEDICINE GROUPS
$sql_med_groups = "CREATE TABLE IF NOT EXISTS  MedicineGroups(idGroup INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                  shelfNo INT(11) NOT NULL,
                                                  rackNo INT(11) NOT NULL,
                                                  productDate DATE NOT NULL,
                                                  dueTo DATE NOT NULL,
                                                  delPackAmount INT(10) NOT NULL,
                                                  storageUnitAmount INT(10) NOT NULL,
                                                  pricePerPack DECIMAL(19,4) NOT NULL,
                                                  totalPrice DECIMAL(19,4) NULL,
                                                  isFinished BIT NOT NULL,
                                                  idMedicine INT(11),
                                                  idDelivery INT(11),
                                                  FOREIGN KEY (idMedicine) REFERENCES Medicines(idMedicine),
                                                  FOREIGN KEY (idDelivery) REFERENCES Deliveries(idDelivery));";
$pdo->exec($sql_med_groups);

//WRITEOFF
$sql_writeoff = "CREATE TABLE IF NOT EXISTS  WriteOff(idWriteOff INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                  woDate DATE NOT NULL,
                                                  woAmount INT(11) NOT NULL,
                                                  reason NVARCHAR(100) NOT NULL,
                                                  tShelfNo INT(11) NOT NULL,
                                                  tRackNo INT(11) NOT NULL,
                                                  idGroup INT(11),
                                                  idManager NVARCHAR(50),
                                                  FOREIGN KEY (idGroup) REFERENCES MedicineGroups(idGroup),
                                                  FOREIGN KEY (idManager) REFERENCES StorageManagers(idManager));";
$pdo->exec($sql_writeoff);

//ISSUANCE
$sql_issuance = "CREATE TABLE IF NOT EXISTS  Issuance(idIssuance INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                  iDate DATE NOT NULL,
                                                  status NVARCHAR(30) NOT NULL,
                                                  idManager NVARCHAR(50),
                                                  idRespPerson NVARCHAR(50),
                                                  FOREIGN KEY (idManager) REFERENCES StorageManagers(idManager),
                                                  FOREIGN KEY (idRespPerson) REFERENCES ResponsiblePersons(idRespPerson));";
$pdo->exec($sql_issuance);

//GIVEN MEDICINES
$sql_given_med = "CREATE TABLE IF NOT EXISTS  GivenMed(idGiven INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                  amount INT(10) NOT NULL,
                                                  idGroup INT(11),
                                                  idIssuance INT(11),
                                                  FOREIGN KEY (idGroup) REFERENCES MedicineGroups(idGroup),
                                                  FOREIGN KEY (idIssuance) REFERENCES Issuance(idIssuance));";
$pdo->exec($sql_given_med);

Database::disconnect();