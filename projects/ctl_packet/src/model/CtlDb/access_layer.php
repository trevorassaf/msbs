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

	const self::_INTERVAL_MONTH_ID = 'IntervalMonthId';
	const self::_SURGERY_ID = 'SurgeryId';
	const self::_RESEARCHER_ID = 'ResearcherId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::_INTERVAL_MONTH_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_SURGERY_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_RESEARCHER_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getIntervalMonthId() { return $this->childDbFieldTable[self::self::_INTERVAL_MONTH_ID]->getValue(); }

	public function getSurgeryId() { return $this->childDbFieldTable[self::self::_SURGERY_ID]->getValue(); }

	public function getResearcherId() { return $this->childDbFieldTable[self::self::_RESEARCHER_ID]->getValue(); }

	public function setIntervalMonthId($IntervalMonthId) { $this->childDbFieldTable[self::self::_INTERVAL_MONTH_ID]->setValue($IntervalMonthId); }

	public function setSurgeryId($SurgeryId) { $this->childDbFieldTable[self::self::_SURGERY_ID]->setValue($SurgeryId); }

	public function setResearcherId($ResearcherId) { $this->childDbFieldTable[self::self::_RESEARCHER_ID]->setValue($ResearcherId); }


}

class PRA extends CtlDb {

	const self::SEVERITY = 'severity';
	const self::_INTERVAL_ID = 'IntervalId';
	const self::_P_R_Q_ID = 'PRQId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::SEVERITY => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::self::_INTERVAL_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_P_R_Q_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getSeverity() { return $this->childDbFieldTable[self::self::SEVERITY]->getValue(); }

	public function getIntervalId() { return $this->childDbFieldTable[self::self::_INTERVAL_ID]->getValue(); }

	public function getPRQId() { return $this->childDbFieldTable[self::self::_P_R_Q_ID]->getValue(); }

	public function setSeverity($severity) { $this->childDbFieldTable[self::self::SEVERITY]->setValue($severity); }

	public function setIntervalId($IntervalId) { $this->childDbFieldTable[self::self::_INTERVAL_ID]->setValue($IntervalId); }

	public function setPRQId($PRQId) { $this->childDbFieldTable[self::self::_P_R_Q_ID]->setValue($PRQId); }


}

class PRQ extends CtlDb {

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

class POC extends CtlDb {

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

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::FIRST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::self::LAST_NAME => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getFirstName() { return $this->childDbFieldTable[self::self::FIRST_NAME]->getValue(); }

	public function getLastName() { return $this->childDbFieldTable[self::self::LAST_NAME]->getValue(); }

	public function setFirstName($firstName) { $this->childDbFieldTable[self::self::FIRST_NAME]->setValue($firstName); }

	public function setLastName($lastName) { $this->childDbFieldTable[self::self::LAST_NAME]->setValue($lastName); }


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
	const self::_PATIENT_ID = 'PatientId';
	const self::_SURGEON_ID = 'SurgeonId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::DOS => new AccessLayerField(DataTypeName::DATE),
			self::self::LOS => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::self::_PATIENT_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_SURGEON_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getDos() { return $this->childDbFieldTable[self::self::DOS]->getValue(); }

	public function getLos() { return $this->childDbFieldTable[self::self::LOS]->getValue(); }

	public function getPatientId() { return $this->childDbFieldTable[self::self::_PATIENT_ID]->getValue(); }

	public function getSurgeonId() { return $this->childDbFieldTable[self::self::_SURGEON_ID]->getValue(); }

	public function setDos($dos) { $this->childDbFieldTable[self::self::DOS]->setValue($dos); }

	public function setLos($los) { $this->childDbFieldTable[self::self::LOS]->setValue($los); }

	public function setPatientId($PatientId) { $this->childDbFieldTable[self::self::_PATIENT_ID]->setValue($PatientId); }

	public function setSurgeonId($SurgeonId) { $this->childDbFieldTable[self::self::_SURGEON_ID]->setValue($SurgeonId); }


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

class Interval_POC_join_table extends CtlDb {

	const self::_INTERVAL_ID = 'IntervalId';
	const self::_P_O_C_ID = 'POCId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::_INTERVAL_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_P_O_C_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getIntervalId() { return $this->childDbFieldTable[self::self::_INTERVAL_ID]->getValue(); }

	public function getPOCId() { return $this->childDbFieldTable[self::self::_P_O_C_ID]->getValue(); }

	public function setIntervalId($IntervalId) { $this->childDbFieldTable[self::self::_INTERVAL_ID]->setValue($IntervalId); }

	public function setPOCId($POCId) { $this->childDbFieldTable[self::self::_P_O_C_ID]->setValue($POCId); }


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

class Region_Surgery_join_table extends CtlDb {

	const self::_REGION_ID = 'RegionId';
	const self::_SURGERY_ID = 'SurgeryId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::_REGION_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_SURGERY_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getRegionId() { return $this->childDbFieldTable[self::self::_REGION_ID]->getValue(); }

	public function getSurgeryId() { return $this->childDbFieldTable[self::self::_SURGERY_ID]->getValue(); }

	public function setRegionId($RegionId) { $this->childDbFieldTable[self::self::_REGION_ID]->setValue($RegionId); }

	public function setSurgeryId($SurgeryId) { $this->childDbFieldTable[self::self::_SURGERY_ID]->setValue($SurgeryId); }


}

class Surgery_SurgeryType_join_table extends CtlDb {

	const self::_SURGERY_ID = 'SurgeryId';
	const self::_SURGERY_TYPE_ID = 'SurgeryTypeId';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::self::_SURGERY_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
			self::self::_SURGERY_TYPE_ID => new AccessLayerField(DataTypeName::FOREIGN_KEY),
		);
	}

	public function getSurgeryId() { return $this->childDbFieldTable[self::self::_SURGERY_ID]->getValue(); }

	public function getSurgeryTypeId() { return $this->childDbFieldTable[self::self::_SURGERY_TYPE_ID]->getValue(); }

	public function setSurgeryId($SurgeryId) { $this->childDbFieldTable[self::self::_SURGERY_ID]->setValue($SurgeryId); }

	public function setSurgeryTypeId($SurgeryTypeId) { $this->childDbFieldTable[self::self::_SURGERY_TYPE_ID]->setValue($SurgeryTypeId); }


}

