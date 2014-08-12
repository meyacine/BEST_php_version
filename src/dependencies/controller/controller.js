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
				$('.alert').html("<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">"+
						"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">" +
						"<span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>"+
						"<strong>Error!</strong> (Date To) smaller than (Date From) is that logic !." +
						"</div>");
				}
			else {				
				 $scope.method = 'GET';
				    $scope.url = "./controller.php/getJobsStatusAndTotalByDateInterval(\""+this.dateFrom+"\",\""+this.dateTo+"\")";
				    $scope.data = "";
				        $http({
				            method: $scope.method, 
				            url: $scope.url,
				            headers: {'Content-Type': 'application/json'},  
				            cache: $templateCache
				        }).
				        success(function(response) {
				            $scope.data = response.data;
				        }).
				        error(function(response) {
				            $scope.data = response || "Request failed";
				        });
			}
		}
	});
})();
