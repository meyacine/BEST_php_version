<script language="javascript" type="text/javascript">
//<![CDATA[
	var jobListTable_Props = 	{
					col_0: "select", 
					onchange : true,
					paging: true,
					paging_length: 3,
					rows_counter: true,
					rows_counter_text: "Spring Batch Jobs : ",
					btn_reset: true,
					loader: true,
					loader_text: "Filtering data..."
				};
	var tfjobListTable = setFilterGrid( "jobListTable",jobListTable_Props );
//]]>
</script>
<blockquote>
	<p align="center">List of current executed Spring Batch Jobs</p>
</blockquote>
<table id="jobListTable" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<th>JOB_NAME</th>
		<th>CREATE_TIME</th>
		<th>START_TIME</th>
		<th>END_TIME</th>
		<th>STATUS</th>
		<th>EXIT_CODE</th>
		<th>EXIT_MESSAGE</th>
		<th>LAST_UPDATED</th>
		<th>JOB_CONFIGURATION_LOCATION</th>
	</tr>
 	<?php
		// we use the imported utils library imported in index
		include_once"../Utils.php";
		$utils = new Utils;
		$utils->databaseConnect();
		// listing des données
		$stmt = $utils->dbc->prepare("".
			"SELECT JOB_NAME, CREATE_TIME, START_TIME, END_TIME, STATUS, EXIT_CODE, EXIT_MESSAGE, LAST_UPDATED, JOB_CONFIGURATION_LOCATION ".
			"FROM batch_job_instance bji, batch_job_execution bje ".
			"Where bji.JOB_INSTANCE_ID = bje.JOB_INSTANCE_ID ".
			"ORDER BY CREATE_TIME DESC;"
		);	
		$stmt->execute();
		//TODO REFACTOR THIS CODE USING ANGULAR
		while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
            echo "<td>".$ligne['JOB_NAME']."</td>";
			echo "<td>".$ligne['CREATE_TIME']."</td>";
			echo "<td>".$ligne['START_TIME']."</td>";
			echo "<td>".$ligne['END_TIME']."</td>";
			echo "<td>".$ligne['STATUS']."</td>";
			echo "<td>".$ligne['EXIT_CODE']."</td>";
			echo "<td>".$ligne['EXIT_MESSAGE']."</td>";
			echo "<td>".$ligne['LAST_UPDATED']."</td>";
			echo "<td>".$ligne['JOB_CONFIGURATION_LOCATION']."</td>";
			echo "</tr>";
		}
	?>   
 	
 </table>
