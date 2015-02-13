<?php

require_once("ExternalDependencies.php");

/**
 * createSurgeryTableBuilder()
 * @relationships:
 *  - many-to-many: SurgeryType, Region 
 *  - many-to-one: Surgeon 
 */
function createSurgeryTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("Surgery");

  // Date of surgery field
  $table_builder->addColumn(
    $column_builder
      ->setName("dos")
      ->setDataType(DataType::date())
      ->build()
  );
  
  // Length of stay field
  $table_builder->addColumn(
    $column_builder
      ->setName("los")
      ->setDataType(DataType::unsignedInt())
      ->build()
  );

  return $table_builder;
}
