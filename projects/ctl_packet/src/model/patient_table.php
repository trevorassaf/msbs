<?php

require_once("ExternalDependencies.php");

function createPatientTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder();

  // Set common configurations
  $column_builder
    ->setDataType(DataType::string())
    ->setFirstLength(30);

  // First name
  $table_builder->bindColumn(
    $column_builder
      ->setName("firstName")
      ->build()
  );

  // Last name
  $table_builder->bindColumn(
    $column_builder
      ->setName("lastName")
      ->build()
  );

  // Mrn
  $table_builder->bindColumn(
    $column_builder
      ->setName("mrn")
      ->build()
  );
  
  // Date of birth field 
  $table_builder->bindColumn(
    $column_builder
    ->setName("dob")
    ->setDataType(DataType::date())
    ->build()
  );

  return $table_builder;
}

$patient_builder = createPatientTableBuilder();
var_dump($patient_builder);
