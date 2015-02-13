<?php

require_once("ExternalDependencies.php");

/**
 * createIntervalTableBuilder()
 * @relationships:
 *  - many-to-one: Surgery
 *  - many-to-one: IntervalMonth
 */
function createIntervalTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder->setName("Interval");

  // Create column
  $date_col = $column_builder
    ->setName('date')
    ->setDataType(DataType::date())
    ->build();

  return $table_builder;
}
