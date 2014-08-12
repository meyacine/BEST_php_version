<?php
/**
 * @author Maamar Yacine MEDDAH 
 * Test for the controller methods
 */
require_once '../src/controller.php';
$bestCtrl = new BestControllerSvc();
$bestCtrl->getJobsStatusAndTotalByDateInterval("01-08-2014", "08-08-2014"); 

?>