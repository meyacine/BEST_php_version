(function(){
	var app = angular.module('best', ['bestDirectives', 'ngRoute', 'bestController']);
	// Definition du routage URL -> PAGE
	app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/jobsList', {
        templateUrl: 'jobs/job-list.php',
        controller: 'JobListCtrl'
      }).
	when('/jobsStatistics', {
        templateUrl: 'jobs/job-statistics.php',
        controller: 'JobStatisticCtrl'
      }).
	when('/jobsEvolutions', {
        templateUrl: 'jobs/job-evolutions.html',
        controller: 'JobEvolutionCtrl'
      }).
	when('/stepsList', {
        templateUrl: 'steps/step-list.html',
        controller: 'StepListCtrl'
      }).
	when('/stepsStatistics', {
        templateUrl: 'steps/step-statistics.html',
        controller: 'StepStatisticCtrl'
      }).
	when('/stepsEvolutions', {
        templateUrl: 'steps/step-evolutions.html',
        controller: 'StepEvolutionCtrl'
      }).
	otherwise({
        redirectTo: '/'
      });
	}]);
})();