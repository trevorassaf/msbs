<?php

require_once('/Users/ITLAYER/projects/warehouse/src/php/architect/../access_layer/SqlRecord.php');

abstract class CtlDb extends SqlRecord {}

class Patient extends CtlDb {

	const FIRST_NAME = 'first_name';
	const LAST_NAME = 'last_name';
	const MEDICAL_RECORD_NUMBER = 'medical_record_number';

	protected static $keys = array(
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::FIRST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::LAST_NAME => new AccessLayerField(DataTypeName::STRING),
			self::MEDICAL_RECORD_NUMBER => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getFirstName() { return $this->childDbFieldTable[self::FIRST_NAME]->getValue(); }

	public function getLastName() { return $this->childDbFieldTable[self::LAST_NAME]->getValue(); }

	public function getMedicalRecordNumber() { return $this->childDbFieldTable[self::MEDICAL_RECORD_NUMBER]->getValue(); }

	public function setFirstName($first_name) { $this->childDbFieldTable[self::FIRST_NAME]->setValue($first_name); }

	public function setLastName($last_name) { $this->childDbFieldTable[self::LAST_NAME]->setValue($last_name); }

	public function setMedicalRecordNumber($medical_record_number) { $this->childDbFieldTable[self::MEDICAL_RECORD_NUMBER]->setValue($medical_record_number); }

}

class Surgery extends CtlDb {

	const DOS = 'dos';

	protected static $keys = array(
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::DOS => new AccessLayerField(DataTypeName::TIMESTAMP),
		);
	}

	public function getDos() { return $this->childDbFieldTable[self::DOS]->getValue(); }

	public function setDos($dos) { $this->childDbFieldTable[self::DOS]->setValue($dos); }

}

class CervicalPainRatings extends CtlDb {

	const NECK = 'neck';
	const HEAD_BASE = 'head_base';
	const HEADACHES = 'headaches';
	const ARM = 'arm';
	const SHOULDER = 'shoulder';
	const SHOULDER_BLADE = 'shoulder_blade';

	protected static $keys = array(
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::NECK => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::HEAD_BASE => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::HEADACHES => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::ARM => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::SHOULDER => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::SHOULDER_BLADE => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getNeck() { return $this->childDbFieldTable[self::NECK]->getValue(); }

	public function getHeadBase() { return $this->childDbFieldTable[self::HEAD_BASE]->getValue(); }

	public function getHeadaches() { return $this->childDbFieldTable[self::HEADACHES]->getValue(); }

	public function getArm() { return $this->childDbFieldTable[self::ARM]->getValue(); }

	public function getShoulder() { return $this->childDbFieldTable[self::SHOULDER]->getValue(); }

	public function getShoulderBlade() { return $this->childDbFieldTable[self::SHOULDER_BLADE]->getValue(); }

	public function setNeck($neck) { $this->childDbFieldTable[self::NECK]->setValue($neck); }

	public function setHeadBase($head_base) { $this->childDbFieldTable[self::HEAD_BASE]->setValue($head_base); }

	public function setHeadaches($headaches) { $this->childDbFieldTable[self::HEADACHES]->setValue($headaches); }

	public function setArm($arm) { $this->childDbFieldTable[self::ARM]->setValue($arm); }

	public function setShoulder($shoulder) { $this->childDbFieldTable[self::SHOULDER]->setValue($shoulder); }

	public function setShoulderBlade($shoulder_blade) { $this->childDbFieldTable[self::SHOULDER_BLADE]->setValue($shoulder_blade); }

}

class CervicalOrThoraxicPainRatings extends CtlDb {

	const UPPER_THRORAX = 'upper_throrax';
	const MIDDLE_THRORAX = 'middle_throrax';
	const LOWER_THRORAX = 'lower_throrax';
	const ARM = 'arm';
	const SHOULDER = 'shoulder';
	const SHOULDER_BLADE = 'shoulder_blade';
	const LEG = 'leg';

	protected static $keys = array(
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::UPPER_THRORAX => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::MIDDLE_THRORAX => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::LOWER_THRORAX => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::ARM => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::SHOULDER => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::SHOULDER_BLADE => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::LEG => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getUpperThrorax() { return $this->childDbFieldTable[self::UPPER_THRORAX]->getValue(); }

	public function getMiddleThrorax() { return $this->childDbFieldTable[self::MIDDLE_THRORAX]->getValue(); }

	public function getLowerThrorax() { return $this->childDbFieldTable[self::LOWER_THRORAX]->getValue(); }

	public function getArm() { return $this->childDbFieldTable[self::ARM]->getValue(); }

	public function getShoulder() { return $this->childDbFieldTable[self::SHOULDER]->getValue(); }

	public function getShoulderBlade() { return $this->childDbFieldTable[self::SHOULDER_BLADE]->getValue(); }

	public function getLeg() { return $this->childDbFieldTable[self::LEG]->getValue(); }

	public function setUpperThrorax($upper_throrax) { $this->childDbFieldTable[self::UPPER_THRORAX]->setValue($upper_throrax); }

	public function setMiddleThrorax($middle_throrax) { $this->childDbFieldTable[self::MIDDLE_THRORAX]->setValue($middle_throrax); }

	public function setLowerThrorax($lower_throrax) { $this->childDbFieldTable[self::LOWER_THRORAX]->setValue($lower_throrax); }

	public function setArm($arm) { $this->childDbFieldTable[self::ARM]->setValue($arm); }

	public function setShoulder($shoulder) { $this->childDbFieldTable[self::SHOULDER]->setValue($shoulder); }

	public function setShoulderBlade($shoulder_blade) { $this->childDbFieldTable[self::SHOULDER_BLADE]->setValue($shoulder_blade); }

	public function setLeg($leg) { $this->childDbFieldTable[self::LEG]->setValue($leg); }

}

class LumbarPainRatngs extends CtlDb {

	const BACK = 'back';
	const LEG = 'leg';
	const GROIN = 'groin';
	const TESTICULAR = 'testicular';

	protected static $keys = array(
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::BACK => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::LEG => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::GROIN => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::TESTICULAR => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getBack() { return $this->childDbFieldTable[self::BACK]->getValue(); }

	public function getLeg() { return $this->childDbFieldTable[self::LEG]->getValue(); }

	public function getGroin() { return $this->childDbFieldTable[self::GROIN]->getValue(); }

	public function getTesticular() { return $this->childDbFieldTable[self::TESTICULAR]->getValue(); }

	public function setBack($back) { $this->childDbFieldTable[self::BACK]->setValue($back); }

	public function setLeg($leg) { $this->childDbFieldTable[self::LEG]->setValue($leg); }

	public function setGroin($groin) { $this->childDbFieldTable[self::GROIN]->setValue($groin); }

	public function setTesticular($testicular) { $this->childDbFieldTable[self::TESTICULAR]->setValue($testicular); }

}

class Region_Surgery_join_table extends CtlDb {

	const SURGERY_ID = 'Surgery_id';
	const REGION_ID = 'Region_id';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::SURGERY_ID => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::REGION_ID => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getSurgeryId() { return $this->childDbFieldTable[self::SURGERY_ID]->getValue(); }

	public function getRegionId() { return $this->childDbFieldTable[self::REGION_ID]->getValue(); }

	public function setSurgeryId($Surgery_id) { $this->childDbFieldTable[self::SURGERY_ID]->setValue($Surgery_id); }

	public function setRegionId($Region_id) { $this->childDbFieldTable[self::REGION_ID]->setValue($Region_id); }

}

class Surgery_SurgeryType_join_table extends CtlDb {

	const SURGERY_ID = 'Surgery_id';
	const SURGERYTYPE_ID = 'SurgeryType_id';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::SURGERY_ID => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::SURGERYTYPE_ID => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getSurgeryId() { return $this->childDbFieldTable[self::SURGERY_ID]->getValue(); }

	public function getSurgeryTypeId() { return $this->childDbFieldTable[self::SURGERYTYPE_ID]->getValue(); }

	public function setSurgeryId($Surgery_id) { $this->childDbFieldTable[self::SURGERY_ID]->setValue($Surgery_id); }

	public function setSurgeryTypeId($SurgeryType_id) { $this->childDbFieldTable[self::SURGERYTYPE_ID]->setValue($SurgeryType_id); }

}

class PostOpComplications_Surgery_join_table extends CtlDb {

	const SURGERY_ID = 'Surgery_id';
	const POSTOPCOMPLICATIONS_ID = 'PostOpComplications_id';

	protected static $keys = array();

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::SURGERY_ID => new AccessLayerField(DataTypeName::UNSIGNED_INT),
			self::POSTOPCOMPLICATIONS_ID => new AccessLayerField(DataTypeName::UNSIGNED_INT),
		);
	}

	public function getSurgeryId() { return $this->childDbFieldTable[self::SURGERY_ID]->getValue(); }

	public function getPostOpComplicationsId() { return $this->childDbFieldTable[self::POSTOPCOMPLICATIONS_ID]->getValue(); }

	public function setSurgeryId($Surgery_id) { $this->childDbFieldTable[self::SURGERY_ID]->setValue($Surgery_id); }

	public function setPostOpComplicationsId($PostOpComplications_id) { $this->childDbFieldTable[self::POSTOPCOMPLICATIONS_ID]->setValue($PostOpComplications_id); }

}

class Surgeon extends CtlDb {

	const VALUE = 'value';

	protected static $keys = array(
		array(self::VALUE),
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::VALUE => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getValue() { return $this->childDbFieldTable[self::VALUE]->getValue(); }

}

class Region extends CtlDb {

	const VALUE = 'value';

	protected static $keys = array(
		array(self::VALUE),
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::VALUE => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getValue() { return $this->childDbFieldTable[self::VALUE]->getValue(); }

}

class SurgeryType extends CtlDb {

	const VALUE = 'value';

	protected static $keys = array(
		array(self::VALUE),
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::VALUE => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getValue() { return $this->childDbFieldTable[self::VALUE]->getValue(); }

}

class PostOpComplications extends CtlDb {

	const VALUE = 'value';

	protected static $keys = array(
		array(self::VALUE),
	);

	protected static function genChildDbFieldTableTemplate() {
		return array(
			self::VALUE => new AccessLayerField(DataTypeName::STRING),
		);
	}

	public function getValue() { return $this->childDbFieldTable[self::VALUE]->getValue(); }

}

