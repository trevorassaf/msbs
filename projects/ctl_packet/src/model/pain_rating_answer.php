<?php

require_once("ExternalDependencies.php");

/**
 * createPainRatingAnswerTableBuilder()
 * @relationships:
 *  - many-to-one: Interval 
 *  - many-to-one: PainRatingQuestion 
 */
function createPainRatingAnswerTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("PainRatingQuestion");

  // Create column
  $date_col = $column_builder
    ->setName('value')
    ->setDataType(DataType::unsignedInt())
    ->build();

  return $table_builder;
}
