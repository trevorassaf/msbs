/**
 * Interval types 
 */
CREATE TABLE Intervals (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  name VARCHAR(40) NOT NULL UNIQUE);

/**
 * Insert interval enum types
 */
INSERT INTO Intervals (name) VALUES ('pre-op');
INSERT INTO Intervals (name) VALUES ('1 month');
INSERT INTO Intervals (name) VALUES ('3 month');
INSERT INTO Intervals (name) VALUES ('6 month');
INSERT INTO Intervals (name) VALUES ('1 year');
INSERT INTO Intervals (name) VALUES ('2 year');
