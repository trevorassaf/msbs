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
  TableBuilder::makeOneToMany($surgeons_table_builder, $surgery_table_builder);

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
  $region_pain_rating_question_join_builder = createRegionPrqJoinBuilder($region_table_builder, $pain_rating_question_table_builder);

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


  

  
  // Create one-to-many foreign key constraints
  TableBuilder::makeOneToMany($patient_table_builder, $surgery_table_builder);
  TableBuilder::makeOneToMany($surgeon_table_builder, $surgery_table_builder);
  TableBuilder::makeOneToMany($surgery_table_builder, $interval_table_builder);
  TableBuilder::makeOneToMany($interval_month_table_builder, $interval_table_builder);
  TableBuilder::makeOneToMany($interval_table_builder, $pain_rating_answer_table_builder);
  TableBuilder::makeOneToMany($pain_rating_questions_table_builder, $pain_rating_answer_table_builder);

  // Create join tables 
  $surgery_type_join_builder = TableBuilder::makeManyToMany($surgery_type_table_builder, $surgery_table_builder);
  $surgery_region_join_builder = TableBuilder::makeManyToMany($region_table_builder, $surgery_table_builder);
  $postop_interval_join_builder = TableBuilder::makeManyToMany($interval_table_builder, $postop_complication_table_builder);

  // Create join table builders
  $region_question_join_builder = TableBuilder::makeManyToMany($region_table_builder, $pain_rating_question_table_builder);
  loadRegionQuestionJoinBuilder($);

  // Bind tables to database
  $ctl_db->setTables(
    array(
      // Canonical tables
      $patient_table_builder->build(),
      $surgeon_table_builder->build(),
      $surgery_table_builder->build(),
      $region_table_builder->build(),
      $postop_complication_builder->build(),
      $pain_rating_table_builder->build(),
      $interval_month_table_builder->build(),
      $pain_rating_question_table_builder->build(),
      $pain_rating_answer_table_builder->build(),

      // Join tables
      $surgery_type_join_builder->build(),
      $surgery_region_join_builder->build(),
      $postop_interval_join_builder->build(),
      $region_question_join_builder->build(),
    )
  );



  $surgeon_table = createSurgeonTable();
  $ctl_db->addEnum($surgeon_table);

  $surgery_table = createSurgeryTable();
  $ctl_db->addTable($surgery_table);

  // One patient may undergo multiple surgeries
  $ctl_db->addTableMapping(
      $patient_table,
      $surgery_table,
      TableMappingType::ONE_TO_MANY
  );

  // One surgeon may conduct multiple surgeries
  $ctl_db->addTableMapping(
      $surgeon_table,
      $surgery_table,
      TableMappingType::ONE_TO_MANY
  );

  // Surgery region
  $region_table = createRegionTable();
  $ctl_db->addEnum($region_table);

  $ctl_db->addTableMapping(
    $surgery_table,
    $region_table,
    TableMappingType::MANY_TO_MANY
  );

  // Surgery type
  $surgery_type_table = createSurgeryTypeTable();
  $ctl_db->addEnum($surgery_type_table);
  
  $ctl_db->addTableMapping(
    $surgery_table,
    $surgery_type_table,
    TableMappingType::MANY_TO_MANY
  );

  // Post-op complications
  $post_op_complications_table = createPostOpComplicationsTable();
  $ctl_db->addEnum($post_op_complications_table); 
  $ctl_db->addTableMapping(
      $surgery_table,
      $post_op_complications_table,
      TableMappingType::MANY_TO_MANY
  );

  // Cervical pain raitings
  $cervical_pain_ratings = createCervicalPainRatings(); 
  $ctl_db->addTable($cervical_pain_ratings); 
  $ctl_db->addTableMapping(
      $surgery_table,
      $cervical_pain_ratings,
      TableMappingType::ONE_TO_MANY
  );

  // Cervical or thoraxic pain ratings
  $cervical_or_thoraxic_pain_ratings = createCervicalOrThoraxicPainRatings();
  $ctl_db->addTable($cervical_or_thoraxic_pain_ratings); 
  $ctl_db->addTableMapping(
      $surgery_table,
      $cervical_or_thoraxic_pain_ratings,
      TableMappingType::ONE_TO_MANY
  );

  // Lumbar pain ratings
  $lumbar_pain_ratings = createLumbar();
  $ctl_db->addTable($lumbar_pain_ratings); 
  $ctl_db->addTableMapping(
      $surgery_table,
      $lumbar_pain_ratings,
      TableMappingType::ONE_TO_MANY
  );

  return $ctl_db;
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
