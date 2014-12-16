/**
 * Regions
 */
CREATE TABLE Regions 
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  name VARCHAR(40) NOT NULL UNIQUE);

/**
 * Insert region enum values.
 */
INSERT INTO Regions (name) VALUES ('cervical');
INSERT INTO Regions (name) VALUES ('thoracic');
INSERT INTO Regions (name) VALUES ('lumbar');
INSERT INTO Regions (name) VALUES ('sacral');
INSERT INTO Regions (name) VALUES ('coccygeal');
