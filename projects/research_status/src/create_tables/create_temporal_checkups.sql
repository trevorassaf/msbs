/**
 * Temporal checkup types 
 */
CREATE TABLE TemporalCheckups 
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  status VARCHAR(40) NOT NULL UNIQUE);

/**
 * Insert temporal checkup enum types
 */
INSERT INTO TemporalCheckups (status) VALUES ('pre-op');
INSERT INTO TemporalCheckups (status) VALUES ('1 month');
INSERT INTO TemporalCheckups (status) VALUES ('3 month');
INSERT INTO TemporalCheckups (status) VALUES ('6 month');
INSERT INTO TemporalCheckups (status) VALUES ('1 year');
INSERT INTO TemporalCheckups (status) VALUES ('2 year');
