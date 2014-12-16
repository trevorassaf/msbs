/**
 * Checkup statuses
 */
CREATE TABLE CheckupStatuses
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created DATETIME NOT NULL,
  last_updated DATETIME NOT NULL,
  status VARCHAR(30) NOT NULL UNIQUE);

/**
 * Insert checkup status enum values.
 */
INSERT INTO CheckupStatuses (created, last_updated, status)
  VALUES (DATETIME(), DATETIME(), '');

-- TODO Insert all status types
  
