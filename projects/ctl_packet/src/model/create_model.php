<?php

require_once("ExternalDependencies.php");

require_once("interval_month_table.php");
require_once("interval_table.php");
require_once("pain_rating_answer_table.php");
require_once("pain_rating_question_table.php");
require_once("patient_table.php");
require_once("postop_complication_table.php");
require_once("region_table.php");
require_once("researcher_table.php");
require_once("surgeon_table.php");
require_once("surgery_table.php");
require_once("surgery_type_table.php");

/**
 * assembleDb()
 * - Create tables for ctl db.
 * @return Database : db model
 */
function assembleDb() {
  $ctl_db = new Database("CtlDb");

  // Generate table builders (w/o foreign keys and preloaded join data)
  $interval_month_table_builder = createIntervalMonthTableBuilder();
  $interval_table_builder = createIntervalTableBuilder();
  $pain_rating_answer_table_builder = createPainRatingAnswerTableBuilder();
  $pain_rating_question_table_builder = createPainRatingQuestionTableBuilder();
  $patient_table_builder = createPatientTableBuilder();
  $postop_complication_table_builder = createPostOpComplicationTableBuilder();
  $region_table_builder = createRegionTableBuilder();
  $researcher_table_builder = createResearcherTableBuilder();
  $surgeon_table_builder = createSurgeonTableBuilder();
  $surgery_table_builder = createSurgeryTableBuilder();
  $surgery_type_table_builder = createSurgeryTypeTableBuilder();

  //// Create one-to-many relationships
  // Interval month table
  TableBuilder::makeOneToMany($interval_month_table_builder, $interval_table_builder);
  
  // Interval table
  TableBuilder::makeOneToMany($interval_table_builder, $pain_rating_answer_table_builder);
  
  // Pain question table
  TableBuilder::makeOneToMany($pain_rating_question_table_builder, $pain_rating_answer_table_builder);

  // Patient table
  TableBuilder::makeOneToMany($patient_table_builder, $surgery_table_builder);
  
  // Surgeons table
  TableBuilder::makeOneToMany($surgeon_table_builder, $surgery_table_builder);

  // Surgery table
  TableBuilder::makeOneToMany($surgery_table_builder, $interval_table_builder);
  
  // Researcher table
  TableBuilder::makeOneToMany($researcher_table_builder, $interval_table_builder);

  //// Create many-to-many relationships
  // Interval <--> PostOpComplication
  $interval_postop_complication_join_builder = TableBuilder::makeManyToMany(
    $interval_table_builder,
    $postop_complication_table_builder
  );

  // Region <--> PainRatingQuestion
  $region_pain_rating_question_join_builder = createRegionPrqJoinBuilder(
    $region_table_builder,
    $pain_rating_question_table_builder
  );

  // Region <--> Surgery
  $region_surgery_join_builder = TableBuilder::makeManyToMany(
    $region_table_builder,
    $surgery_table_builder
  );
  
  // Surgery <--> SurgeryType
  $surgery_surgerytype_join_builder = TableBuilder::makeManyToMany(
    $surgery_table_builder,
    $surgery_type_table_builder
  );

  // Assemble db
  $ctl_db->setAndBuildTableBuilders(
    array(
      // Canonical tables
      $interval_month_table_builder,
      $interval_table_builder,
      $pain_rating_answer_table_builder,
      $pain_rating_question_table_builder,
      $patient_table_builder,
      $postop_complication_table_builder,
      $region_table_builder,
      $researcher_table_builder,
      $surgeon_table_builder,
      $surgery_table_builder,
      $surgery_type_table_builder,

      // Join tables
      $interval_postop_complication_join_builder,
      $region_pain_rating_question_join_builder,
      $region_surgery_join_builder,
      $surgery_surgerytype_join_builder,
    )
  );
  
  return $ctl_db;
}

/**
 * createRegionPrqJoinBuilder()
 * - Generates join table for region and prq tables.
 * @param region_table_builder : TableBuilder for region
 * @param prq_table_builder : TableBuilder for prq
 * @return TableBuilder : join table
 */
function createRegionPrqJoinBuilder($region_table_builder, $prq_table_builder) {
  $join_name = 'RegionPrqMapping';
  $region_fk_name = 'regionId';
  $prq_fk_name = 'prqId';

  // Create join table
  $join_builder = TableBuilder::makeManyToMany(
    $region_table_builder,
    $prq_table_builder,
    $join_name,
    $region_fk_name,
    $prq_fk_name
  );

  // Fetch name of region col
  $region_col_map = $region_table_builder->getColumns();

  // Fail bc we expect 1 column in region table
  assert(sizeof($region_col_map) == 1);

  $region_col_name = array_keys($region_col_map)[0];

  // Fetch name of prq col
  $prq_col_map = $prq_table_builder->getColumns();

  // Fail bc we expect 1 column in prq table
  assert(sizeof($prq_col_map) == 1);

  $prq_col_name = array_keys($prq_col_map)[0];

  //// Populate join table w/default values
  // Cervical questions
  TableBuilder::loadJoinTable(
    $region_table_builder,
    $prq_table_builder,
    $join_builder,
    $region_fk_name,
    $prq_fk_name,
    array($region_col_name => 'cervical'),
    array(
      array($prq_col_name => 'Do you have neck pain?'),
      array($prq_col_name => 'Do you have pain at the base of your head?'),
      array($prq_col_name => 'Do you have headaches?'),
      array($prq_col_name => 'Do you have arm pain?'),
      array($prq_col_name => 'Do you have shoulder pain'),
      array($prq_col_name => 'Do you have pain in between the shoulder blades?'),
      array($prq_col_name => 'Do you have upper thoracic pain?'),
      array($prq_col_name => 'Do you have middle thoracic pain?'),
      array($prq_col_name => 'Do you have lower thoracic pain?'),
      array($prq_col_name => 'Do you have leg pain?'),
    )
  );

  // Thoracic questions 
  TableBuilder::loadJoinTable(
    $region_table_builder,
    $prq_table_builder,
    $join_builder,
    $region_fk_name,
    $prq_fk_name,
    array($region_col_name => 'thoracic'),
    array(
      array($prq_col_name => 'Do you have upper thoracic pain?'),
      array($prq_col_name => 'Do you have middle thoracic pain?'),
      array($prq_col_name => 'Do you have lower thoracic pain?'),
      array($prq_col_name => 'Do you have arm pain?'),
      array($prq_col_name => 'Do you have shoulder pain'),
      array($prq_col_name => 'Do you have pain in between the shoulder blades?'),
      array($prq_col_name => 'Do you have leg pain?'),
    )
  );

  // Lumbar questions 
  TableBuilder::loadJoinTable(
    $region_table_builder,
    $prq_table_builder,
    $join_builder,
    $region_fk_name,
    $prq_fk_name,
    array($region_col_name => 'lumbar'),
    array(
      array($prq_col_name => 'Do you have back pain?'),
      array($prq_col_name => 'Do you have leg pain?'),
      array($prq_col_name => 'Do you have groin pain?'),
      array($prq_col_name => 'Do you have testicular pain?'),
    )
  );

  return $join_builder; 
}

function main() {

  // Create data model for ctl questionaire 
  $arch = new Architect(
      new SqlDbBuilder(),
      new PhpAccessLayerBuilder()  
  );
  
  $ctl_db = assembleDb();

  $arch->create($ctl_db, "./");
}

// -- MAIN
main();
