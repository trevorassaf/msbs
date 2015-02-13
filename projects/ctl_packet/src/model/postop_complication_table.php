<?php

require_once("ExternalDependencies.php");

/**
 * createPostOpComplicationTableBuilder()
 * @relationships:
 *  - many-to-many: Interval 
 */
function createSurgeryTypeTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("PostOpComplication");

  // Assemble 'surgery-type' column
  $surgery_type_col = $column_builder
    ->setName("type")
    ->setDataType(DataType::string())
    ->setFirstLength(50)
    ->build();

  $table_builder->bindColumn($surgery_type_col);

  $table_builder
    ->addElement("Acute MI")
    ->addElement("Death")
    ->addElement("Deep Vein Thrombosis")
    ->addElement("Deep Wound Infection with Hardware Removal")
    ->addElement("Deep Wound Infection without Hardware Removal")
    ->addElement("GI Bleeding, Hardware Failure")
    ->addElement("Other Medical Complications")
    ->addElement("Other Surgical Complications")
    ->addElement("Paraplegia/Quadriplegia")
    ->addElement("Pneumothorax")
    ->addElement("Pulmonary Embolism")
    ->addElement("Respiratory Failure");

  return $table_builder;
}

