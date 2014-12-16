/**
 * Patients
 *  - medical_record_number:
 *    - St. John's specific patient id
 */
CREATE TABLE Patients (
  id INT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  medical_record_number INT UNSIGNED NOT NULL UNIQUE,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  date_of_birth DATE NOT NULL,
  home_address VARCHAR(100) NOT NULL,
  home_phone VARCHAR(20) NOT NULL,
  is_followed BIT(1) NOT NULL DEFAULT 1,
  sex_id INT UNSIGNED NOT NULL,
  FOREIGN KEY(sex_id) REFERENCES Sexes(id));
