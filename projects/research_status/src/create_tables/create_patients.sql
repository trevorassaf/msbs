/**
 * Patients
 *  - mrn:
 *    - medical resource number
 *    - id of patient issued by hospital 
 */
CREATE TABLE Patients
  id UNSIGNED INT NOT NULL AUTO_INCREMENT UNIQUE,
  PRIMARY KEY(id),
  created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_updated_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  mrn UNSIGNED INT NOT NULL UNIQUE,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  date_of_birth DATE NOT NULL,
  home_address VARCHAR(100) NOT NULL,
  home_phone VARCHAR(20) NOT NULL,
  sex_id UNSIGNED INT NOT NULL,
  FOREIGN KEY(sex_id) REFERENCES Sexes(id));
