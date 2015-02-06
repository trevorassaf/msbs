<?php

require_once(dirname(__FILE__)."/../../../../../warehouse/Import.php");

function createPatientTable() {
  $patient_table = new Table("Patient");
  $builder = new ColumnBuilder();

  // First name
  $patient_table->addColumn(
    $builder
      ->setName("first_name")
      ->setDataType(DataType::string())
      ->setFirstLength(30)
      ->build()
  );

  // Last name
  $patient_table->addColumn(
    $builder
      ->setName("last_name")
      ->build()
  );

  // Mrn
  $patient_table->addColumn(
    $builder
      ->setName("medical_record_number")
      ->setDataType(DataType::string())
      ->setFirstLength(30)
      ->build()
  );

  return $patient_table;
}

function createPostOpComplicationsTable() {
  $complications_table = new EnumTable("PostOpComplications");

  // Complication types 
  $complications_table->addElement("Acute MI");
  $complications_table->addElement("Death");
  $complications_table->addElement("Deep Vein Thrombosis");
  $complications_table->addElement("Deep Wound Infection with Hardware Removal");
  $complications_table->addElement("Deep WOund Infection without Hardware Removal");
  $complications_table->addElement("GI Bleeding, Hardware Failure");
  $complications_table->addElement("Other Medical Complications");
  $complications_table->addElement("Other Surgical Complications");
  $complications_table->addElement("Paraplegia/Quadriplegia");
  $complications_table->addElement("Pneumothorax");
  $complications_table->addElement("Pulmonary Embolism");
  $complications_table->addElement("Respiratory Failure");
  $complications_table->addElement("Stroke");
  $complications_table->addElement("Wound Dehiscence");
  $complications_table->addElement("Wound Hematoma");

  return $complications_table;
}

function createCervicalPainRatings() {
  $cervical_pain_ratings = new Table("CervicalPainRatings");
  $builder = new ColumnBuilder();
  $builder->setDataType(DataType::unsignedInt());

  // Neck pain
  $cervical_pain_ratings->addColumn(
    $builder
      ->setName("neck")
      ->build()
  );

  // Base of head   
  $cervical_pain_ratings->addColumn(
    $builder
      ->setName("head_base")
      ->build()
  );

  // Headaches
  $cervical_pain_ratings->addColumn(
    $builder
      ->setName("headaches")
      ->build()
  );

  // Arm pain 
  $cervical_pain_ratings->addColumn(
    $builder
      ->setName("arm")
      ->build()
  );

  // Shoulder pain 
  $cervical_pain_ratings->addColumn(
    $builder
      ->setName("shoulder")
      ->build()
  );
  
  // Shoulder blade pain 
  $cervical_pain_ratings->addColumn(
    $builder
      ->setName("shoulder_blade")
      ->build()
    );

  return $cervical_pain_ratings;
}

function createCervicalOrThoraxicPainRatings() {
  $cervical_or_thoraxic_pain_ratings = 
      new Table("CervicalOrThoraxicPainRatings");
  $builder = new ColumnBuilder();
  $builder->setDataType(DataType::unsignedInt()); 

  // Upper thoraxic pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("upper_throrax")
      ->build()
  );
  
  // Middle thoraxic pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("middle_throrax")
      ->build()
  );
  
  // Lower thoraxic pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("lower_throrax")
      ->build()
  );

  // Arm pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("arm")
      ->build()
  );

  // Shoulder pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("shoulder")
      ->build()
  );

  // Shoulder blade pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("shoulder_blade")
      ->build()
  );
  
  // Leg pain
  $cervical_or_thoraxic_pain_ratings->addColumn(
    $builder
      ->setName("leg")
      ->build()
  );

  return $cervical_or_thoraxic_pain_ratings;
}

function createLumbar() {
  $lumbar_pain_ratings = new Table("LumbarPainRatngs");
  $builder = new ColumnBuilder();
  $builder->setDataType(DataType::unsignedInt());

  // Back pain
  $lumbar_pain_ratings->addColumn(
    $builder
      ->setName("back")
      ->build()
  );
  
  // Leg pain
  $lumbar_pain_ratings->addColumn(
    $builder
      ->setName("leg")
      ->build()
  );
  
  // Groin pain
  $lumbar_pain_ratings->addColumn(
    $builder
      ->setName("groin")
      ->build()
  );
  
  // Testicular pain
  $lumbar_pain_ratings->addColumn(
    $builder
      ->setName("testicular")
      ->build()
    );

  return $lumbar_pain_ratings;
}

function assembleDb() {
  $ctl_db = new Database("CtlDb");
  
  $patient_table = createPatientTable();
  $ctl_db->addTable($patient_table); 

  $post_op_complications_table = createPostOpComplicationsTable();
  $ctl_db->addTable($post_op_complications_table); 

  $cervical_pain_ratings = createCervicalPainRatings(); 
  $ctl_db->addTable($cervical_pain_ratings); 

  $cervical_or_thoraxic_pain_ratings = createCervicalOrThoraxicPainRatings();
  $ctl_db->addTable($cervical_or_thoraxic_pain_ratings); 

  $lumbar_pain_ratings = createLumbar();
  $ctl_db->addTable($lumbar_pain_ratings); 

  return $ctl_db;
}

function main() {

  // Create data model for ctl questionaire 
  $arch = new Architect(
      new SqlDbBuilder(),
      new PhpAccessLayerBuilder()  
  );
  
  $ctl_db = assembleDb();

  $arch->create($ctl_db, "./");
}

main();
