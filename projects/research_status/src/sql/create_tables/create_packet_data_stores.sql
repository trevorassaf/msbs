/**
 * Data warehouses for storing packet information. 
 */
CREATE TABLE PacketDataStores (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  name VARCHAR(30) NOT NULL UNIQUE);

/**
 * Insert checkup status enum values.
 */
INSERT INTO PacketDataStores (name) VALUES ('Midas');
INSERT INTO PacketDataStores (name) VALUES ('ECW');
