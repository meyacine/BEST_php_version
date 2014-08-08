<!DOCTYPE html>
<html lang="en" ng-app="best">
<head>
	<meta charset="UTF-8">
	<title>BEST : Batch Extended Supervision Tool</title>
	<meta author="Maamar Yacine MEDDAH"></meta>
	<!-- used styleSheets-->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/filtergrid.css" rel="stylesheet">
	<link href="css/best.css" rel="stylesheet">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<!-- required js libraries -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/angular.js"></script>
	<script src="js/angular-route.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/tablefilter_all_min.js"></script>
	<!-- amCharts javascript sources -->
	<script type="text/javascript" src="js/amcharts.js"></script>
	<script type="text/javascript" src="js/pie.js"></script>
	
	<script src="dependencies/app.js"></script>
	<script src="js/best.js"></script>		
	<script src="dependencies/directive/bestDirectives.js"></script>	
	<script src="dependencies/controller/controller.js"></script>
</head>
<body>	
		<best-menu></best-menu>	
		<div ng-view class="view-frame"></div>
</body>
</html>                                		