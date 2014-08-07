<blockquote>
	<p align="center">Statistics of executed Spring Batch Jobs</p>
</blockquote>
<table>
	<form id="jobParameter">	
		<tr>
			<td>TODO FORM WITH ANGULAR VALIDATION</td>
			<td>TODO FORM WITH ANGULAR VALIDATION</td>
		</tr>
	</form>
</table>



<?php
		// we use the imported utils library imported in index
		include_once"../Utils.php";
		$utils = new Utils;
		$utils->databaseConnect();
		// listing des données
		$stmt = $utils->dbc->prepare("".
			"SELECT JOB_NAME, CREATE_TIME, START_TIME, END_TIME, STATUS, EXIT_CODE, EXIT_MESSAGE, LAST_UPDATED, JOB_CONFIGURATION_LOCATION ".
			"FROM batch_job_instance bji, batch_job_execution bje ".
			"Where bji.JOB_INSTANCE_ID = bje.JOB_INSTANCE_ID;"
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