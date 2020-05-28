
CREATE TABLE Confirmation
(
	id                   INTEGER NOT NULL,
	username             VARCHAR(50) NOT NULL,
	status               CHAR(1) NOT NULL
);

ALTER TABLE Confirmation
ADD CONSTRAINT XPKConfirmation PRIMARY KEY (id);

CREATE TABLE Marker
(
	id                   INTEGER NOT NULL,
	species_name         VARCHAR(50) NOT NULL,
	username             VARCHAR(50) NOT NULL,
	img                  VARCHAR(255) NULL,
	date                 VARCHAR(11) NOT NULL,
	text                 VARCHAR(500) NULL,
	latitude             DOUBLE NOT NULL,
	longitude            DOUBLE NOT NULL
);

ALTER TABLE Marker
ADD CONSTRAINT XPKMarker PRIMARY KEY (id);

ALTER TABLE `Marker` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT; 

CREATE TABLE Species
(
	species_name         VARCHAR(50) NOT NULL,
	username             VARCHAR(50) NOT NULL,
	type                 CHAR(1) NULL
);

ALTER TABLE Species
ADD CONSTRAINT XPKSpecies PRIMARY KEY (species_name);

CREATE TABLE Synonym
(
	id                   INTEGER NOT NULL,
	species_name         VARCHAR(50) NOT NULL,
	name                 VARCHAR(50) NOT NULL
);

ALTER TABLE Synonym
ADD CONSTRAINT XPKSynonym PRIMARY KEY (id);

ALTER TABLE `Synonym` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT; 


CREATE TABLE User
(
	username             VARCHAR(50) NOT NULL,
	type                 CHAR(1) NOT NULL,
	name                 VARCHAR(20) NOT NULL,
	surname              VARCHAR(20) NOT NULL,
	birth_date           CHAR(11) NOT NULL,
	mail                 VARCHAR(30) NOT NULL,
	pass                 VARCHAR(30) NOT NULL
);

ALTER TABLE User
ADD CONSTRAINT XPKUser PRIMARY KEY (username);

ALTER TABLE Confirmation
ADD CONSTRAINT R_23 FOREIGN KEY (id) REFERENCES Marker (id);

ALTER TABLE Confirmation
ADD CONSTRAINT R_25 FOREIGN KEY (username) REFERENCES User (username);

ALTER TABLE Marker
ADD CONSTRAINT R_21 FOREIGN KEY (username) REFERENCES User (username);

ALTER TABLE Marker
ADD CONSTRAINT R_22 FOREIGN KEY (species_name) REFERENCES Species (species_name);

ALTER TABLE Species
ADD CONSTRAINT R_20 FOREIGN KEY (username) REFERENCES User (username);

ALTER TABLE Synonym
ADD CONSTRAINT R_18 FOREIGN KEY (species_name) REFERENCES Species (species_name);


