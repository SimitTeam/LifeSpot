
CREATE TABLE confirmation
(
	id                   INTEGER NOT NULL,
	username             VARCHAR(50) NOT NULL,
	status               CHAR(1) NOT NULL
);

ALTER TABLE confirmation
ADD CONSTRAINT XPKconfirmation PRIMARY KEY (id);

CREATE TABLE marker
(
	id                   INTEGER NOT NULL,
	species_name         VARCHAR(50) NOT NULL,
	username             VARCHAR(50) NOT NULL,
	date                 VARCHAR(11) NOT NULL,
	text                 VARCHAR(500) NULL,
	latitude             DOUBLE NOT NULL,
	longitude            DOUBLE NOT NULL
);

ALTER TABLE marker
ADD CONSTRAINT XPKmarker PRIMARY KEY (id);

ALTER TABLE `marker` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT; 

CREATE TABLE species
(
	species_name         VARCHAR(50) NOT NULL,
	username             VARCHAR(50) NOT NULL,
	type                 CHAR(1) NULL
);

ALTER TABLE species
ADD CONSTRAINT XPKspecies PRIMARY KEY (species_name);

CREATE TABLE synonym
(
	id                   INTEGER NOT NULL,
	species_name         VARCHAR(50) NOT NULL,
	name                 VARCHAR(50) NOT NULL
);

ALTER TABLE synonym
ADD CONSTRAINT XPKsynonym PRIMARY KEY (id);

ALTER TABLE `synonym` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT; 


CREATE TABLE user
(
	username             VARCHAR(50) NOT NULL,
	type                 CHAR(1) NOT NULL,
	name                 VARCHAR(20) NOT NULL,
	surname              VARCHAR(20) NOT NULL,
	birth_date           CHAR(11) NOT NULL,
	mail                 VARCHAR(30) NOT NULL,
	pass                 VARCHAR(30) NOT NULL
);

ALTER TABLE user
ADD CONSTRAINT XPKuser PRIMARY KEY (username);

ALTER TABLE confirmation
ADD CONSTRAINT R_23 FOREIGN KEY (id) REFERENCES marker (id);

ALTER TABLE confirmation
ADD CONSTRAINT R_25 FOREIGN KEY (username) REFERENCES user (username);

ALTER TABLE marker
ADD CONSTRAINT R_21 FOREIGN KEY (username) REFERENCES user (username);

ALTER TABLE marker
ADD CONSTRAINT R_22 FOREIGN KEY (species_name) REFERENCES species (species_name);

ALTER TABLE species
ADD CONSTRAINT R_20 FOREIGN KEY (username) REFERENCES user (username);

ALTER TABLE synonym
ADD CONSTRAINT R_18 FOREIGN KEY (species_name) REFERENCES species (species_name);


