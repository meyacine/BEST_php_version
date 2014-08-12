<?php
// we use the imported utils library imported in index
include_once"Utils.php";
class BestControllerSvc{
	
	public function getJobsStatusAndTotalByDateInterval($dateA, $dateB){
		// Establishing db connection
		$utils= new Utils;
		$utils->databaseConnect();
		// listing data
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
		return $json;		
	}
}
?>