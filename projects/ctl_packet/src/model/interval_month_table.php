<?php

require_once("ExternalDependencies.php");

/**
 * createIntervalMonthTable()
 * @relationships:
 *  - one-to-many: Interval  
 */
function createIntervalMonthTableBuilder() {
  $table_builder = new TableBuilder();
  $column_builder = new ColumnBuilder(); 

  $table_builder
    ->setName("IntervalMonth")
    ->bindColumn(
      $column_builder
        ->setName('month')
        ->setDataType(DataType::unsignedInt())
        ->build()
    );

  $table_builder
    ->addElement(1)
    ->addElement(3)
    ->addElement(6)
    ->addElement(12)
    ->addElement(24);

  return $table_builder;
}
