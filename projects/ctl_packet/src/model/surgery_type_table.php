<?php

require_once("ExternalDependencies.php");

/**
 * createRegionTableBuilder()
 * @relationships:
 *  - many-to-many: Surgery 
 */
function createSurgeryTypeTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("SurgeryType");

  // Assemble 'surgery-type' column
  $surgery_type_col = $column_builder
    ->setName("type")
    ->setDataType(DataType::string())
    ->setFirstLength(15)
    ->build();

  $table_builder->bindColumn($surgery_type_col);

  // Surgery types 
  $table_builder
    ->addElement("hemilaminectomy"))
    ->addElement("laminectomy"))
    ->addElement("microdisectomy"))
    ->addElement("fusion"))
    ->addElement("x-stop"))
    ->addElement("decompression"))
    ->addElement("kyphoplasty"));

  return $table_builder;
}

