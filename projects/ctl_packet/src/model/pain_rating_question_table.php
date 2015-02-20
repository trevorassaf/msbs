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
    ->build();

  $table_builder
    ->setName("PainRatingQuestion")
    ->bindColumn($question_col);

  return $table_builder;
}
