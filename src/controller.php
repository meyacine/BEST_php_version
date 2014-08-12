<?php
include_once"Utils.php";
/**
 * @author Maamar Yacine MEDDAH
 * 
 * Best Controller, here we define all ajax calls concerning database accessing
 * 
 */
class BestControllerSvc{
	/**
	 * This method return a json wish contains job_status, and count, in the interval (dateA,dateB)
	 * It's used in the statistics display 
	 * 
	 * @param unknown $dateA "dd-mm-yyyy"
	 * @param unknown $dateB "dd-mm-yyyy"
	 */
	public static function getJobsStatusAndTotalByDateInterval($dateA, $dateB){
		// Establishing db connection
		$utils= new Utils;
		$utils->databaseConnect();
		// gathering data
		$stmt = $utils->dbc->prepare("".
				"SELECT bje.STATUS as status, COUNT(bje.JOB_INSTANCE_ID) as totalCount ".
				"FROM BATCH_JOB_EXECUTION bje , BATCH_JOB_INSTANCE bji ".
				"WHERE ".
				"bji.JOB_INSTANCE_ID = bje.JOB_INSTANCE_ID ".
				"AND bje.CREATE_TIME >= STR_TO_DATE('".$dateA."','%d-%m-%Y') ".
				"AND bje.CREATE_TIME <= STR_TO_DATE('".$dateB."','%d-%m-%Y') ".
				"GROUP BY bje.STATUS ".
				"ORDER BY bje.STATUS"
		);
		$stmt->execute();
		$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$utils = null;
		$json=json_encode($results);
		echo $json;		
	}
}
/**
 *  This part of code is kind of handler whish get from the url the method to call
 */
$method="";// i set the method to empty string, to avoid the undefined exeption
extract($_GET);
switch($method){
	case "gjsatbdi":{
		BestControllerSvc::getJobsStatusAndTotalByDateInterval($dateA, $dateB);
		break;
	}
}
header('Content-type: application/json');
?>