-- TODO insert other surgeon names

/**
 * Surgeons
 */
CREATE TABLE Surgeons (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_name VARCHAR(40) NOT NULL UNIQUE);

/**
 * Insert surgeon enum values.
 */
INSERT INTO Surgeons (last_name) VALUES('Soo');
