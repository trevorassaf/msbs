/**
 * Surgeries
 * - mjoa:
 *    - Modified Japanese Orthopedic Association
 *    - Boolean indicating whether that patient's surgery
 *      requires the mylopathy-specific questions to be asked.
 */ 
CREATE TABLE Surgeries (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  surgery_date TIMESTAMP NOT NULL,
  mjoa BIT(1) NOT NULL DEFAULT 0,
  length_stay INT UNSIGNED NOT NULL, 
  is_followed BIT(1) NOT NULL DEFAULT 1,
  surgeon_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(surgeon_id) REFERENCES Surgeons(id),
  patient_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(patient_id) REFERENCES Patients(id));

/**
 * Join table for surgical regions. 
 */
CREATE TABLE SurgeryRegions (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  surgery_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(surgery_id) REFERENCES Surgeries(id),
  region_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(region_id) REFERENCES Regions(id));

/**
 * Join table for Surgical Complications 
 */
CREATE TABLE SurgeryComplications (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  surgery_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(surgery_id) REFERENCES Surgeries(id),
  complication_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(complication_id) REFERENCES Complications(id));
