CREATE DATABASE CtlDb;

CREATE TABLE CtlDb.IntervalMonth(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	month INT UNSIGNED NOT NULL);

INSERT INTO CtlDb.IntervalMonth (month) VALUES (1);
INSERT INTO CtlDb.IntervalMonth (month) VALUES (3);
INSERT INTO CtlDb.IntervalMonth (month) VALUES (6);
INSERT INTO CtlDb.IntervalMonth (month) VALUES (12);
INSERT INTO CtlDb.IntervalMonth (month) VALUES (24);


CREATE TABLE CtlDb.Interval(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	IntervalMonthId BIGINT UNSIGNED NOT NULL,
	SurgeryId BIGINT UNSIGNED NOT NULL,
	ResearcherId BIGINT UNSIGNED NOT NULL);


CREATE TABLE CtlDb.PRA(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	severity INT UNSIGNED NOT NULL,
	IntervalId BIGINT UNSIGNED NOT NULL,
	PRQId BIGINT UNSIGNED NOT NULL);


CREATE TABLE CtlDb.PRQ(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	question VARCHAR(50) NOT NULL);

INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have neck pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have pain at the base of your head?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have headaches?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have arm pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have shoulder pain");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have pain in between the shoulder blades?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have upper thoracic pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have middle thoracic pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have lower thoracic pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have leg pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have back pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have groin pain?");
INSERT INTO CtlDb.PRQ (question) VALUES ("Do you have testicular pain?");


CREATE TABLE CtlDb.Patient(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	firstName VARCHAR(30) NOT NULL,
	lastName VARCHAR(30) NOT NULL,
	mrn VARCHAR(30) NOT NULL,
	dob DATE NOT NULL);


CREATE TABLE CtlDb.POC(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	type VARCHAR(50) NOT NULL);

INSERT INTO CtlDb.POC (type) VALUES ("Acute MI");
INSERT INTO CtlDb.POC (type) VALUES ("Death");
INSERT INTO CtlDb.POC (type) VALUES ("Deep Vein Thrombosis");
INSERT INTO CtlDb.POC (type) VALUES ("Deep Wound Infection with Hardware Removal");
INSERT INTO CtlDb.POC (type) VALUES ("Deep Wound Infection without Hardware Removal");
INSERT INTO CtlDb.POC (type) VALUES ("GI Bleeding, Hardware Failure");
INSERT INTO CtlDb.POC (type) VALUES ("Other Medical Complications");
INSERT INTO CtlDb.POC (type) VALUES ("Other Surgical Complications");
INSERT INTO CtlDb.POC (type) VALUES ("Paraplegia/Quadriplegia");
INSERT INTO CtlDb.POC (type) VALUES ("Pneumothorax");
INSERT INTO CtlDb.POC (type) VALUES ("Pulmonary Embolism");
INSERT INTO CtlDb.POC (type) VALUES ("Respiratory Failure");


CREATE TABLE CtlDb.Region(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	name VARCHAR(15) NOT NULL);

INSERT INTO CtlDb.Region (name) VALUES ("cervical");
INSERT INTO CtlDb.Region (name) VALUES ("thoracic");
INSERT INTO CtlDb.Region (name) VALUES ("lumbar");


CREATE TABLE CtlDb.Researcher(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	firstName VARCHAR(20) NOT NULL,
	lastName VARCHAR(20) NOT NULL);


CREATE TABLE CtlDb.Surgeon(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	name VARCHAR(15) NOT NULL);

INSERT INTO CtlDb.Surgeon (name) VALUES ("Dr. Soo");
INSERT INTO CtlDb.Surgeon (name) VALUES ("Dr. Houseman");
INSERT INTO CtlDb.Surgeon (name) VALUES ("Dr. Claybrooks");
INSERT INTO CtlDb.Surgeon (name) VALUES ("Dr. Richards");
INSERT INTO CtlDb.Surgeon (name) VALUES ("Dr. Bono");


CREATE TABLE CtlDb.Surgery(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	dos DATE NOT NULL,
	los INT UNSIGNED NOT NULL,
	PatientId BIGINT UNSIGNED NOT NULL,
	SurgeonId BIGINT UNSIGNED NOT NULL);


CREATE TABLE CtlDb.SurgeryType(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	type VARCHAR(15) NOT NULL);

INSERT INTO CtlDb.SurgeryType (type) VALUES ("hemilaminectomy");
INSERT INTO CtlDb.SurgeryType (type) VALUES ("laminectomy");
INSERT INTO CtlDb.SurgeryType (type) VALUES ("microdisectomy");
INSERT INTO CtlDb.SurgeryType (type) VALUES ("fusion");
INSERT INTO CtlDb.SurgeryType (type) VALUES ("x-stop");
INSERT INTO CtlDb.SurgeryType (type) VALUES ("decompression");
INSERT INTO CtlDb.SurgeryType (type) VALUES ("kyphoplasty");


CREATE TABLE CtlDb.Interval_POC_join_table(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	IntervalId BIGINT UNSIGNED NOT NULL,
	POCId BIGINT UNSIGNED NOT NULL);


CREATE TABLE CtlDb.RegionPrqMapping(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	regionId BIGINT UNSIGNED NOT NULL,
	prqId BIGINT UNSIGNED NOT NULL);

INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 1);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 2);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 3);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 4);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 5);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 6);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 7);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 8);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 9);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (1, 10);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 7);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 8);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 9);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 4);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 5);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 6);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (2, 10);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (3, 11);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (3, 10);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (3, 12);
INSERT INTO CtlDb.RegionPrqMapping (regionId, prqId) VALUES (3, 13);


CREATE TABLE CtlDb.Region_Surgery_join_table(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	RegionId BIGINT UNSIGNED NOT NULL,
	SurgeryId BIGINT UNSIGNED NOT NULL);


CREATE TABLE CtlDb.Surgery_SurgeryType_join_table(
	id SERIAL,
	PRIMARY KEY(id),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	lastUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	SurgeryId BIGINT UNSIGNED NOT NULL,
	SurgeryTypeId BIGINT UNSIGNED NOT NULL);


ALTER TABLE CtlDb.Interval
	ADD FOREIGN KEY(IntervalMonthId) REFERENCES CtlDb.IntervalMonth(id);
ALTER TABLE CtlDb.Interval
	ADD FOREIGN KEY(SurgeryId) REFERENCES CtlDb.Surgery(id);
ALTER TABLE CtlDb.Interval
	ADD FOREIGN KEY(ResearcherId) REFERENCES CtlDb.Researcher(id);


ALTER TABLE CtlDb.PRA
	ADD FOREIGN KEY(IntervalId) REFERENCES CtlDb.Interval(id);
ALTER TABLE CtlDb.PRA
	ADD FOREIGN KEY(PRQId) REFERENCES CtlDb.PRQ(id);


ALTER TABLE CtlDb.Surgery
	ADD FOREIGN KEY(PatientId) REFERENCES CtlDb.Patient(id);
ALTER TABLE CtlDb.Surgery
	ADD FOREIGN KEY(SurgeonId) REFERENCES CtlDb.Surgeon(id);


ALTER TABLE CtlDb.Interval_POC_join_table
	ADD FOREIGN KEY(IntervalId) REFERENCES CtlDb.Interval(id);
ALTER TABLE CtlDb.Interval_POC_join_table
	ADD FOREIGN KEY(POCId) REFERENCES CtlDb.POC(id);


ALTER TABLE CtlDb.RegionPrqMapping
	ADD FOREIGN KEY(regionId) REFERENCES CtlDb.Region(id);
ALTER TABLE CtlDb.RegionPrqMapping
	ADD FOREIGN KEY(prqId) REFERENCES CtlDb.PRQ(id);


ALTER TABLE CtlDb.Region_Surgery_join_table
	ADD FOREIGN KEY(RegionId) REFERENCES CtlDb.Region(id);
ALTER TABLE CtlDb.Region_Surgery_join_table
	ADD FOREIGN KEY(SurgeryId) REFERENCES CtlDb.Surgery(id);


ALTER TABLE CtlDb.Surgery_SurgeryType_join_table
	ADD FOREIGN KEY(SurgeryId) REFERENCES CtlDb.Surgery(id);
ALTER TABLE CtlDb.Surgery_SurgeryType_join_table
	ADD FOREIGN KEY(SurgeryTypeId) REFERENCES CtlDb.SurgeryType(id);