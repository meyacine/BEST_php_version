(function(){
	// Data Factories Services
	var BestServices = angular.module('BestServices', []);
	BestServices.factory('HttpRequestService', function($http) {
		  var HttpRequestService = {
				  async: function() {
					  var promise = $http.get('./test.php').then(function (response) {
					  return response.data;
				  });
				  return promise;
		    },
		    load: function() {
		    	console.log('helloo');
		    }
		  };
		  return HttpRequestService;
		});	
}();
