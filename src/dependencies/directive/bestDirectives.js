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
})();