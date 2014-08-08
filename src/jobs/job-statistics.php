<blockquote>
	<p align="center">Statistics of executed Spring Batch Jobs</p>
</blockquote>
<script>
  $(function() {
    $( "#dateFrom" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $( "#dateTo" ).datepicker({ dateFormat: 'dd-mm-yy' });
  });
 </script>
<form name="statParams" ng-controller="StatController as statCtrl"
	ng-submit="statParams.$valid && statCtrl.checkDateInterval()"
	novalidate>
	<table width="100%">
		<tr bgcolor="#F8F8F8">
			<td><b>Date From:</b></td>
			<td><input type="text" id="dateFrom" name="dateFrom"
				ng-pattern='datePattern' class="dateChoise"
				ng-model="statCtrl.dateFrom" required /></td>
			<td><b>Date To:</b></td>
			<td><input type="text" id="dateTo" name="dateTo"
				ng-pattern='datePattern' class="dateChoise"
				ng-model="statCtrl.dateTo" required /></td>
			<td><input type="submit" name="validate" value="Submit" /></td>
		</tr>
	</table>
</form>
<div class="alert" role="alert"></div>
<?php
		// we use the imported utils library imported in index
		include_once"../Utils.php";
		$utils = new Utils;
		$utils->databaseConnect();
		
		//TODO REFACTOR THIS CODE USING ANGULAR
		
	?>
<!-- amCharts javascript code -->
<script type="text/javascript">
	AmCharts.makeChart("chartdiv",
		{
			"type": "pie",
			"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
			"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
			"titleField": "category",
			"valueField": "column-1",
			"allLabels": [],
			"balloon": {},
			"legend": {
				"align": "center",
				"markerType": "circle"
			},
			"titles": [],
			"dataProvider": [
			<?php 
				// listing des données
				$stmt = $utils->dbc->prepare("".
						"SELECT bje.STATUS as status, COUNT(bje.JOB_INSTANCE_ID) as totalCount ".
						"FROM BATCH_JOB_EXECUTION bje , BATCH_JOB_INSTANCE bji ".
						"WHERE ".
						"bji.JOB_INSTANCE_ID = bje.JOB_INSTANCE_ID ".
						"GROUP BY bje.STATUS ".
						"ORDER BY bje.STATUS"
				);
				$stmt->execute();
				//TODO Parse Json File using angular 
				$jsonData = "";
				while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$jsonData=$jsonData."{\"category\": \"".$ligne['status']."\",";
					$jsonData=$jsonData."\"column-1\": \"".$ligne['totalCount']."\"},";
				}
				$jsonData=substr($jsonData, 0,strlen($jsonData)-1);
				print $jsonData;
			?>
			]
		}
	);
</script>
<div id="chartdiv"
	style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
