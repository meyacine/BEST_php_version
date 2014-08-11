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
	bestController.controller('StatController', function($http){
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
				//alert ('here we launch your query');
				 $http({
					 method: 'GET', 
					 url: "controller.php/getJobsStatusAndTotalByDateInterval(\""+this.dateFrom+"\",\""+this.dateTo+"\")", 
					 header:"Content-Type: application/json"
					 }).
				    success(function(data, status, headers, config) {
				    	alert('here we go');
				    }).
				    error(function(data, status, headers, config) {
				    	alert('Ouppss error ! ');
				    });
			}
		}
	});
})();
