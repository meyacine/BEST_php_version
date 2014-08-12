(function(){
	var bestController = angular.module('bestController', []);
	bestController.controller('JobListCtrl', function(){
	});
	bestController.controller('JobStatisticCtrl', function(){
	});
	bestController.controller('JobEvolutionCtrl', function(){
	});
	bestController.controller('StepListCtrl', function(){
	});
	bestController.controller('StepStatisticCtrl', function(){
	});
	bestController.controller('StepEvolutionCtrl', function(){
	});
	bestController.controller('StatController', function($scope, $http, $templateCache){
		this.dateFrom = "";
		this.dateTo = "";
		this.checkDateInterval = function(){
			if (this.dateFrom>this.dateTo)
				{
				$('#chartdiv').
				html("<center><span id=\"animationSandbox\" style=\"display: block;\" class=\"rubberBand animated\"><img src=\"./css/images/seriously.png\"></span><span id=\"animationSandbox\" style=\"display: block;\" class=\"zoomIn animated\"><h2>(Date To) smaller than (Date From) is that logic !.</h2></span></center>");
				}
			else {		
				 	$scope.method = 'GET';
				    $scope.url = "./controller.php?method=gjsatbdi&dateA="+this.dateFrom+"&dateB="+this.dateTo;
				    $scope.data = "";
			        $http({
			            method: $scope.method, 
			            url: $scope.url,
			            headers: {'Content-Type': 'application/json'}
			        }).
			        success(
			        		function(response) 
			        		{
			        			// it should diplay your chart :p
			        			displayPieChart(response);				        			
			        		}
			        		
	        		).
			        error(function(response) {
			            $scope.data = response || "Request failed";
			        });
			}
		}
	});
	function displayPieChart(data)
	{
		var chartData = [];
        $.each(data, function(i, result) {
            chartData.push(result);
        });
        this.statusChart = new AmCharts.AmPieChart();
        this.statusChart.titleField = "status";
        this.statusChart.valueField = "totalCount";
        this.statusChart.dataProvider = chartData;
        var legend = new AmCharts.AmLegend();
        legend.align="center";
        legend.markerType="circle";
        this.statusChart.addLegend(legend);
        this.statusChart.balloonText = "[[status]] <span style = 'font-size:14px'> <b> [[value]] </b> ([[percents]]%)</span> ";
        this.statusChart.write("chartdiv");
        /*this.statusChart.addListener("clickGraphItem", function(event)
        		{
    				alert("nada");
        		});*/
        if (data.length==0) $('#chartdiv').html("<center><span id=\"animationSandbox\" style=\"display: block;\" class=\"rubberBand animated\"><img src=\"./css/images/sorry.png\"></span><span id=\"animationSandbox\" style=\"display: block;\" class=\"zoomIn animated\"><h2>This period seems to be empty from batch executions</h2></span></center>");
	}
})();


