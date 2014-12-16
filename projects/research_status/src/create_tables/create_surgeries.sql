/**
 * Surgeries
 * - mjoa:
 *    - Modified Japanese Orthopedic Association
 *    - Boolean indicating whether that patient's surgery
 *      requires research questions to be asked.
 */ 
CREATE TABLE Surgeries
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  surgery_date TIMESTAMP NOT NULL,
  completed_postop BIT(1) NOT NULL DEFAULT 0,
  mjoa BIT(1) NOT NULL DEFAULT 0,
  length_stay UNSIGNED INT NOT NULL, 
  region_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(region_id) REFERENCES Regions(id),
  surgeon_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(surgeon_id) REFERENCES Surgeons(id));

/**
 * Regions of surgery. 
 */
CREATE TABLE SurgeryRegions
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  surgery_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(surgery_id) REFERENCES Surgeries(id),
  region_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(region_id) REFERENCES Regions(id));
