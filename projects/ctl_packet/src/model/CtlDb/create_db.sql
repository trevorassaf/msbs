CREATE DATABASE CtlDb;

CREATE TABLE CtlDb.Patient(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	first_name VARCHAR(30) NOT NULL,
	last_name VARCHAR(30) NOT NULL,
	medical_record_number VARCHAR(30) NOT NULL);

CREATE TABLE CtlDb.Surgery(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	dos TIMESTAMP NOT NULL);

CREATE TABLE CtlDb.CervicalPainRatings(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	neck INT UNSIGNED NOT NULL,
	head_base INT UNSIGNED NOT NULL,
	headaches INT UNSIGNED NOT NULL,
	arm INT UNSIGNED NOT NULL,
	shoulder INT UNSIGNED NOT NULL,
	shoulder_blade INT UNSIGNED NOT NULL);

CREATE TABLE CtlDb.CervicalOrThoraxicPainRatings(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	upper_throrax INT UNSIGNED NOT NULL,
	middle_throrax INT UNSIGNED NOT NULL,
	lower_throrax INT UNSIGNED NOT NULL,
	arm INT UNSIGNED NOT NULL,
	shoulder INT UNSIGNED NOT NULL,
	shoulder_blade INT UNSIGNED NOT NULL,
	leg INT UNSIGNED NOT NULL);

CREATE TABLE CtlDb.LumbarPainRatngs(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	back INT UNSIGNED NOT NULL,
	leg INT UNSIGNED NOT NULL,
	groin INT UNSIGNED NOT NULL,
	testicular INT UNSIGNED NOT NULL);

CREATE TABLE CtlDb.Surgeon(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	value VARCHAR(14) NOT NULL, 
	UNIQUE KEY(value));

INSERT INTO CtlDb.Surgeon (value) VALUES ("Dr. Soo");
INSERT INTO CtlDb.Surgeon (value) VALUES ("Dr. Houseman");
INSERT INTO CtlDb.Surgeon (value) VALUES ("Dr. Claybrooks");
INSERT INTO CtlDb.Surgeon (value) VALUES ("Dr. Richards");


CREATE TABLE CtlDb.Region(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	value VARCHAR(15) NOT NULL, 
	UNIQUE KEY(value));

INSERT INTO CtlDb.Region (value) VALUES ("cervical");
INSERT INTO CtlDb.Region (value) VALUES ("thoracic");
INSERT INTO CtlDb.Region (value) VALUES ("lumbar");
INSERT INTO CtlDb.Region (value) VALUES ("thoracolumbar");
INSERT INTO CtlDb.Region (value) VALUES ("cervicothoracic");


CREATE TABLE CtlDb.SurgeryType(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	value VARCHAR(15) NOT NULL, 
	UNIQUE KEY(value));

INSERT INTO CtlDb.SurgeryType (value) VALUES ("hemilaminectomy");
INSERT INTO CtlDb.SurgeryType (value) VALUES ("laminectomy");
INSERT INTO CtlDb.SurgeryType (value) VALUES ("microdisectomy");
INSERT INTO CtlDb.SurgeryType (value) VALUES ("fusion");
INSERT INTO CtlDb.SurgeryType (value) VALUES ("x-stop");
INSERT INTO CtlDb.SurgeryType (value) VALUES ("decompression");
INSERT INTO CtlDb.SurgeryType (value) VALUES ("kyphoplasty");


CREATE TABLE CtlDb.PostOpComplications(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	value VARCHAR(45) NOT NULL, 
	UNIQUE KEY(value));

INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Acute MI");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Death");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Deep Vein Thrombosis");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Deep Wound Infection with Hardware Removal");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Deep WOund Infection without Hardware Removal");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("GI Bleeding, Hardware Failure");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Other Medical Complications");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Other Surgical Complications");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Paraplegia/Quadriplegia");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Pneumothorax");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Pulmonary Embolism");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Respiratory Failure");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Stroke");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Wound Dehiscence");
INSERT INTO CtlDb.PostOpComplications (value) VALUES ("Wound Hematoma");


ALTER TABLE CtlDb.Surgery
	ADD COLUMN Patient_id BIGINT UNSIGNED NOT NULL,
	ADD FOREIGN KEY(Patient_id) REFERENCES CtlDb.Patient(id);

ALTER TABLE CtlDb.Surgery
	ADD COLUMN Surgeon_id BIGINT UNSIGNED NOT NULL,
	ADD FOREIGN KEY(Surgeon_id) REFERENCES CtlDb.Surgeon(id);

CREATE TABLE CtlDb.Region_Surgery_join_table(
        Surgery_id BIGINT UNSIGNED NOT NULL,
        Region_id BIGINT UNSIGNED NOT NULL,
        FOREIGN KEY(Surgery_id) REFERENCES CtlDb.Surgery(id),
        FOREIGN KEY(Region_id) REFERENCES CtlDb.Region(id));

CREATE TABLE CtlDb.Surgery_SurgeryType_join_table(
        Surgery_id BIGINT UNSIGNED NOT NULL,
        SurgeryType_id BIGINT UNSIGNED NOT NULL,
        FOREIGN KEY(Surgery_id) REFERENCES CtlDb.Surgery(id),
        FOREIGN KEY(SurgeryType_id) REFERENCES CtlDb.SurgeryType(id));

CREATE TABLE CtlDb.PostOpComplications_Surgery_join_table(
        Surgery_id BIGINT UNSIGNED NOT NULL,
        PostOpComplications_id BIGINT UNSIGNED NOT NULL,
        FOREIGN KEY(Surgery_id) REFERENCES CtlDb.Surgery(id),
        FOREIGN KEY(PostOpComplications_id) REFERENCES CtlDb.PostOpComplications(id));

ALTER TABLE CtlDb.CervicalPainRatings
	ADD COLUMN Surgery_id BIGINT UNSIGNED NOT NULL,
	ADD FOREIGN KEY(Surgery_id) REFERENCES CtlDb.Surgery(id);

ALTER TABLE CtlDb.CervicalOrThoraxicPainRatings
	ADD COLUMN Surgery_id BIGINT UNSIGNED NOT NULL,
	ADD FOREIGN KEY(Surgery_id) REFERENCES CtlDb.Surgery(id);

ALTER TABLE CtlDb.LumbarPainRatngs
	ADD COLUMN Surgery_id BIGINT UNSIGNED NOT NULL,
	ADD FOREIGN KEY(Surgery_id) REFERENCES CtlDb.Surgery(id);

