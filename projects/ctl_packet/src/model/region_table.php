<?php

require_once("ExternalDependencies.php");

/**
 * createRegionTableBuilder()
 * @relationships:
 *  - many-to-many: Surgery 
 */
function createRegionTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  // Compose column
  $table_builder->setName("Region");
  $region_col = $column_builder
      ->setName('name')
      ->setIsReadOnly(true)
      ->setDataType(DataType::string())
      ->setFirstLength(15)
      ->build();

  $table_builder->bindColumn($region_col);

  // Create default rows
  $table_builder
    ->addElement("cervical")
    ->addElement("thoracic")
    ->addElement("lumbar");
   
  return $table_builder;
}
