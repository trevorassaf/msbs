<?php

require_once("ExternalDependencies.php");

/**
 * createPostOpComplicationTableBuilder()
 * @relationships:
 *  - many-to-many: Interval 
 */
function createPostOpComplicationTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("Poc");

  // Assemble 'surgery-type' column
  $type_col = $column_builder
    ->setName("type")
    ->setDataType(DataType::string())
    ->setFirstLength(50)
    ->build();

  $table_builder->bindColumn($type_col);

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
