<?php

require_once("ExternalDependencies.php");

/**
 * createSurgeonTableBuilder()
 * @relationships
 *  - one-to-many: Surgeon
 */
function createSurgeonTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("Surgeon");

  // Compose column
  $name_col_builder = $column_builder
    ->setName("name")
    ->setDataType(DataType::string())
    ->setFirstLength(15);
  
  $name_col = $name_col_builder->build();
  $table_builder->bindColumn($name_col);

  // Create default rows
  $table_builder
    ->addElement( "Dr. Soo")
    ->addElement( "Dr. Houseman")
    ->addElement( "Dr. Claybrooks")
    ->addElement( "Dr. Richards")
    ->addElement( "Dr. Bono");

  return $table_builder;
}
