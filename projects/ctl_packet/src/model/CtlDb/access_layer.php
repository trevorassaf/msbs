<?php

require_once('/Users/ITLAYER/projects/warehouse/src/php/architect/../access_layer/SqlRecord.php');

abstract class CtlDb extends SqlRecord {}

class IntervalMonth extends CtlDb {

	const self::MONTH = 'month';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::MONTH => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getMonth() { return $this->childDbFieldTable[self::self::MONTH]->getValue(); }

	public function setMonth($month) { $this->childDbFieldTable[self::self::MONTH]->setValue($month); }


}

class Interval extends CtlDb {

	const self::INTERVAL_MONTH_ID = 'intervalMonthId';
	const self::SURGERY_ID = 'surgeryId';
	const self::RESEARCHER_ID = 'researcherId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::INTERVAL_MONTH_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::SURGERY_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::RESEARCHER_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getIntervalMonthId() { return $this->childDbFieldTable[self::self::INTERVAL_MONTH_ID]->getValue(); }

	public function getSurgeryId() { return $this->childDbFieldTable[self::self::SURGERY_ID]->getValue(); }

	public function getResearcherId() { return $this->childDbFieldTable[self::self::RESEARCHER_ID]->getValue(); }

	public function setIntervalMonthId($intervalMonthId) { $this->childDbFieldTable[self::self::INTERVAL_MONTH_ID]->setValue($intervalMonthId); }

	public function setSurgeryId($surgeryId) { $this->childDbFieldTable[self::self::SURGERY_ID]->setValue($surgeryId); }

	public function setResearcherId($researcherId) { $this->childDbFieldTable[self::self::RESEARCHER_ID]->setValue($researcherId); }


}

class Pra extends CtlDb {

	const self::SEVERITY = 'severity';
	const self::INTERVAL_ID = 'intervalId';
	const self::PRQ_ID = 'prqId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::SEVERITY => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::self::INTERVAL_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::PRQ_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getSeverity() { return $this->childDbFieldTable[self::self::SEVERITY]->getValue(); }

	public function getIntervalId() { return $this->childDbFieldTable[self::self::INTERVAL_ID]->getValue(); }

	public function getPrqId() { return $this->childDbFieldTable[self::self::PRQ_ID]->getValue(); }

	public function setSeverity($severity) { $this->childDbFieldTable[self::self::SEVERITY]->setValue($severity); }

	public function setIntervalId($intervalId) { $this->childDbFieldTable[self::self::INTERVAL_ID]->setValue($intervalId); }

	public function setPrqId($prqId) { $this->childDbFieldTable[self::self::PRQ_ID]->setValue($prqId); }


}

class Prq extends CtlDb {

	const self::QUESTION = 'question';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::QUESTION => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getQuestion() { return $this->childDbFieldTable[self::self::QUESTION]->getValue(); }

	public function setQuestion($question) { $this->childDbFieldTable[self::self::QUESTION]->setValue($question); }


}

class Patient extends CtlDb {

	const self::FIRST_NAME = 'firstName';
	const self::LAST_NAME = 'lastName';
	const self::MRN = 'mrn';
	const self::DOB = 'dob';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::FIRST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::self::LAST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::self::MRN => new AccessLayerField(DataTypeName::STRING),
			self::self::DOB => new AccessLayerField(DataTypeName::DATE),
		);
	}

	public function getFirstName() { return $this->childDbFieldTable[self::self::FIRST_NAME]->getValue(); }

	public function getLastName() { return $this->childDbFieldTable[self::self::LAST_NAME]->getValue(); }

	public function getMrn() { return $this->childDbFieldTable[self::self::MRN]->getValue(); }

	public function getDob() { return $this->childDbFieldTable[self::self::DOB]->getValue(); }

	public function setFirstName($firstName) { $this->childDbFieldTable[self::self::FIRST_NAME]->setValue($firstName); }

	public function setLastName($lastName) { $this->childDbFieldTable[self::self::LAST_NAME]->setValue($lastName); }

	public function setMrn($mrn) { $this->childDbFieldTable[self::self::MRN]->setValue($mrn); }

	public function setDob($dob) { $this->childDbFieldTable[self::self::DOB]->setValue($dob); }


}

class Poc extends CtlDb {

	const self::TYPE = 'type';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::TYPE => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getType() { return $this->childDbFieldTable[self::self::TYPE]->getValue(); }

	public function setType($type) { $this->childDbFieldTable[self::self::TYPE]->setValue($type); }


}

class Region extends CtlDb {

	const self::NAME = 'name';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::NAME => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getName() { return $this->childDbFieldTable[self::self::NAME]->getValue(); }

	public function setName($name) { $this->childDbFieldTable[self::self::NAME]->setValue($name); }


}

class Researcher extends CtlDb {

	const self::FIRST_NAME = 'firstName';
	const self::LAST_NAME = 'lastName';
	const self::PASSWORD = 'password';
	const self::EMAIL = 'email';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::FIRST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::self::LAST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::self::PASSWORD => new AccessLayerField(DataTypeName::STRING),
			self::self::EMAIL => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getFirstName() { return $this->childDbFieldTable[self::self::FIRST_NAME]->getValue(); }

	public function getLastName() { return $this->childDbFieldTable[self::self::LAST_NAME]->getValue(); }

	public function getPassword() { return $this->childDbFieldTable[self::self::PASSWORD]->getValue(); }

	public function getEmail() { return $this->childDbFieldTable[self::self::EMAIL]->getValue(); }

	public function setFirstName($firstName) { $this->childDbFieldTable[self::self::FIRST_NAME]->setValue($firstName); }

	public function setLastName($lastName) { $this->childDbFieldTable[self::self::LAST_NAME]->setValue($lastName); }

	public function setPassword($password) { $this->childDbFieldTable[self::self::PASSWORD]->setValue($password); }

	public function setEmail($email) { $this->childDbFieldTable[self::self::EMAIL]->setValue($email); }


}

class Surgeon extends CtlDb {

	const self::NAME = 'name';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::NAME => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getName() { return $this->childDbFieldTable[self::self::NAME]->getValue(); }

	public function setName($name) { $this->childDbFieldTable[self::self::NAME]->setValue($name); }


}

class Surgery extends CtlDb {

	const self::DOS = 'dos';
	const self::LOS = 'los';
	const self::PATIENT_ID = 'patientId';
	const self::SURGEON_ID = 'surgeonId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::DOS => new AccessLayerField(DataTypeName::DATE),
			self::self::LOS => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::self::PATIENT_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::SURGEON_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getDos() { return $this->childDbFieldTable[self::self::DOS]->getValue(); }

	public function getLos() { return $this->childDbFieldTable[self::self::LOS]->getValue(); }

	public function getPatientId() { return $this->childDbFieldTable[self::self::PATIENT_ID]->getValue(); }

	public function getSurgeonId() { return $this->childDbFieldTable[self::self::SURGEON_ID]->getValue(); }

	public function setDos($dos) { $this->childDbFieldTable[self::self::DOS]->setValue($dos); }

	public function setLos($los) { $this->childDbFieldTable[self::self::LOS]->setValue($los); }

	public function setPatientId($patientId) { $this->childDbFieldTable[self::self::PATIENT_ID]->setValue($patientId); }

	public function setSurgeonId($surgeonId) { $this->childDbFieldTable[self::self::SURGEON_ID]->setValue($surgeonId); }


}

class SurgeryType extends CtlDb {

	const self::TYPE = 'type';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::TYPE => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getType() { return $this->childDbFieldTable[self::self::TYPE]->getValue(); }

	public function setType($type) { $this->childDbFieldTable[self::self::TYPE]->setValue($type); }


}

class IntervalToPocMapping extends CtlDb {

	const self::INTERVAL_ID = 'intervalId';
	const self::POC_ID = 'pocId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::INTERVAL_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::POC_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getIntervalId() { return $this->childDbFieldTable[self::self::INTERVAL_ID]->getValue(); }

	public function getPocId() { return $this->childDbFieldTable[self::self::POC_ID]->getValue(); }

	public function setIntervalId($intervalId) { $this->childDbFieldTable[self::self::INTERVAL_ID]->setValue($intervalId); }

	public function setPocId($pocId) { $this->childDbFieldTable[self::self::POC_ID]->setValue($pocId); }


}

class RegionPrqMapping extends CtlDb {

	const self::REGION_ID = 'regionId';
	const self::PRQ_ID = 'prqId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::REGION_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::PRQ_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getRegionId() { return $this->childDbFieldTable[self::self::REGION_ID]->getValue(); }

	public function getPrqId() { return $this->childDbFieldTable[self::self::PRQ_ID]->getValue(); }

	public function setRegionId($regionId) { $this->childDbFieldTable[self::self::REGION_ID]->setValue($regionId); }

	public function setPrqId($prqId) { $this->childDbFieldTable[self::self::PRQ_ID]->setValue($prqId); }


}

class RegionToSurgeryMapping extends CtlDb {

	const self::REGION_ID = 'regionId';
	const self::SURGERY_ID = 'surgeryId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::REGION_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::SURGERY_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getRegionId() { return $this->childDbFieldTable[self::self::REGION_ID]->getValue(); }

	public function getSurgeryId() { return $this->childDbFieldTable[self::self::SURGERY_ID]->getValue(); }

	public function setRegionId($regionId) { $this->childDbFieldTable[self::self::REGION_ID]->setValue($regionId); }

	public function setSurgeryId($surgeryId) { $this->childDbFieldTable[self::self::SURGERY_ID]->setValue($surgeryId); }


}

class SurgeryToSurgeryTypeMapping extends CtlDb {

	const self::SURGERY_ID = 'surgeryId';
	const self::SURGERY_TYPE_ID = 'surgeryTypeId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::SURGERY_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::SURGERY_TYPE_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getSurgeryId() { return $this->childDbFieldTable[self::self::SURGERY_ID]->getValue(); }

	public function getSurgeryTypeId() { return $this->childDbFieldTable[self::self::SURGERY_TYPE_ID]->getValue(); }

	public function setSurgeryId($surgeryId) { $this->childDbFieldTable[self::self::SURGERY_ID]->setValue($surgeryId); }

	public function setSurgeryTypeId($surgeryTypeId) { $this->childDbFieldTable[self::self::SURGERY_TYPE_ID]->setValue($surgeryTypeId); }


}

