/**
 * Checkup Information
 */
CREATE TABLE CheckupInfos
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  is_complete BIT(1) NOT NULL DEFAULT 0,
  update_time TIMESTAMP NOT NULL,
  checkup_temporal_type_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(temporal_checkup_id) REFERENCES TemporalCheckups(id),
  status_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(status_id) REFERENCES CheckupStatuses(id));
