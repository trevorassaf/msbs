<?php

require_once("ExternalDependencies.php");

// TODO create a configuration table specifying range of these values
/**
 * createPainRatingTableBuilder()
 * @relationships:
 *  - man-to-one: PainRatingQuestion 
 */
function createPainRatingAnswerTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("PRA");

  // Create column
  $table_builder->bindColumn(
    $column_builder
      ->setName('severity')
      ->setDataType(DataType::unsignedInt())
      ->build()
    );

  return $table_builder;
}
