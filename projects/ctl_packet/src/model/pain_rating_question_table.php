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
  
  // Create column
  $question_col = $column_builder
    ->setName('question')
    ->setDataType(DataType::string())
    ->setFirstLength(50)
    ->build();

  $table_builder
    ->setName("PRQ")
    ->bindColumn($question_col);

  return $table_builder;
}
