

var app = angular.module('search', ['ui.bootstrap'])

.controller('searchController', ['$scope','searchService', '$window', function($scope, searchService, $window){
	$scope.search = undefined;
	$scope.getSearch = function (query){
		results = searchService.get(query);
		return results;
		return results.map(function(item){
			return item;
		})
	}

	$scope.onSelect = function (item, model, label){
		$window.location = item.ruta;
	}
}])

.factory('searchService', ['$http', '$q', function ($http, $q){
	function get(query){
		defer = $q.defer();
		$http.get('/admin/search/' + query)
		.success(function (data){
			defer.resolve(data);
		})
		.error (function(data){
			defer.reject(data);
		})

		return defer.promise
	}
	return {
		get : get
	}
}])