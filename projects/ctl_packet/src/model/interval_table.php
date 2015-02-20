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

  $table_builder ->setName("Interval");
  
  return $table_builder;
}
