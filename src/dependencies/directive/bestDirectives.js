(function(){
	var app = angular.module('bestDirectives', []);
	
	// menu directive using the controller whish uses the menu.json file definition
	app.directive('bestMenu', function() {
		return {
			restrict: 'E',
			templateUrl: 'best-menu.html',
			controller:function($http){
				var menuPages = this;
				menuPages.pagesDefinition = [];
				$http.get('./json/menus.json').success(function(data){
					menuPages.pagesDefinition = data;
				});
			},
			controllerAs:'pages'
			};			
	});
	app.directive('jobList', function(){
		return {
			restrict: 'E',
			templateUrl: 'job-list.html',
			controller:function($scope,$http){
				var jobsList = this;
				jobsList.list = [];
				$scope.method = 'GET';
			    $scope.url = "./controller.php?method=gjl";
			    $scope.data = "";
			    $http(
		        		{
				            method: $scope.method, 
				            url: $scope.url,
				            headers: {'Content-Type': 'application/json'}
		        		}).
		        success(
		        		function(response) 
		        		{
		        			jobsList.list = response;				        			
		        		}			        		
        		).error(function(response) {$scope.data = response || "Request failed";});
			},
			controllerAs: 'jobsListCtrl'
		};
	});
})();