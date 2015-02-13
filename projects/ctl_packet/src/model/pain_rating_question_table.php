<?php

require_once("ExternalDependencies.php");

/**
 * createPainRatingQuestionTableBuilder()
 * @relationships:
 *  - many-to-many: Region
 */
function createPainRatingQuestionTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("PainRatingQuestion");

  // Create column
  $date_col = $column_builder
    ->setName('question')
    ->setDataType(DataType::string())
    ->build();

  return $table_builder;
}
