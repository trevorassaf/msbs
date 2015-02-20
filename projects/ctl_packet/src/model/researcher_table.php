<?php

require_once('ExternalDependencies.php');

/**
 * createResearcherTableBuilder()
 */
function createResearcherTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 
  $column_builder
    ->setDataType(DataType::string())
    ->setFirstLength(20);

  $table_builder
    ->setName("Researcher")
    ->bindColumn(
      $column_builder
        ->setName('firstName')
        ->build()
    )
    ->bindColumn(
      $column_builder
        ->setName('lastName')
        ->build()
    );
}
