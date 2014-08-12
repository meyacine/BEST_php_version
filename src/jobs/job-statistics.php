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
	<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;">
		<h3 align="center">Your chart will be displayed here</h3>
	</div>
</form>

