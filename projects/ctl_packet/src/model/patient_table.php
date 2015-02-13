<?php

require_once("ExternalDependencies.php");

function createPatientTableBuilder() {
  $table_builder = new TableBuilder();
  $col_builder = new ColumnBuilder();

  // Set common configurations
  $col_builder
    ->setDataType(DataType::string())
    ->setFirstLength(30);

  // First name
  $table_builder->bindColumn(
    $col_builder
      ->setName("firstName")
      ->build()
  );

  // Last name
  $table_builder->addColumn(
    $column_builder
      ->setName("lastName")
      ->build()
  );

  // Mrn
  $table_builder->addColumn(
    $column_builder
      ->setName("mrn")
      ->build()
  );
  
  // Date of birth field 
  $table_builder->addColumn(
    $column_builder
    ->setName("dob")
    ->setDataType(DataType::date())
    ->build()
  );

  return $patient_table;

}
