/**
 * Complication types 
 */
CREATE TABLE Complications (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  name VARCHAR(80) NOT NULL UNIQUE);

/**
 * Insert complication enum types
 */
INSERT INTO Complications (name) VALUES ('Acute MI');
INSERT INTO Complications (name) VALUES ('Death');
INSERT INTO Complications (name) VALUES ('Deep Vein Thrombosis');
INSERT INTO Complications (name) VALUES ('Deep Wound Infection with Hardware Removal');
INSERT INTO Complications (name) VALUES ('Deep Wound Infection without Hardware Removal');
INSERT INTO Complications (name) VALUES ('GI Bleeding, Hardware Failure');
INSERT INTO Complications (name) VALUES ('Other Medical Complications');
INSERT INTO Complications (name) VALUES ('Other Surgical Complications');
INSERT INTO Complications (name) VALUES ('Paraplegia/Quadriplegia');
INSERT INTO Complications (name) VALUES ('Pneumothorax');
INSERT INTO Complications (name) VALUES ('Pulmonary Embolism');
INSERT INTO Complications (name) VALUES ('Respiratory Failure');
INSERT INTO Complications (name) VALUES ('Stroke');
INSERT INTO Complications (name) VALUES ('Wound Dehiscence');
INSERT INTO Complications (name) VALUES ('Wound Hematoma');
