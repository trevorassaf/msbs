/**
 * Checkup Information
 */
CREATE TABLE Interviews (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  update_time TIMESTAMP NOT NULL,
  surgery_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(surgery_id) REFERENCES Surgeries(id),
  interval_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(interval_id) REFERENCES Intervals(id),
  is_complete BIT(1) NOT NULL DEFAULT 0,
  packet_data_store_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(packet_data_store_id) REFERENCES PacketDataStores(id));
