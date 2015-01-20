

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

.controller('mantoController', ['factory', '$log', '$scope', function(factory, $log, $scope){
    $scope.mantos = function (){
        $scope.mantenimientos = [];
        if($scope.placa){
            factory.all($scope.placa, "mantenimientos/").then(
                function (data){
                    $log.info(data)
                    $scope.mantenimientos = data;
                },
                function (data){
                    $log.info('error')
                }
            )
        }
    }
}])
.factory('factory', ['$q', '$http', '$log', function($q, $http, $log){
    function all(id, url){
        defer = $q.defer();
        $http.get(url + id)
        .success(function (data){
            defer.resolve(data);
        })
        .error( function (data){
            defer.reject(data);
        })
        return defer.promise;
    }
    return {
        all : all
    }
}])


.controller('carroController', ['$scope', 'factory','$log', function($scope, factory, $log){
	// $scope.modeloId = $('#modelo_id').val();
	$scope.marca 	= $("#marca_id").val();

	$scope.getModelos = function(){
		// marca = $('#marca_id').val();
		$log.info('modelos');
	    factory.all($scope.marca, "modelos/").then(
	        function (data){
	        	// $scope.modeloId = $('#modelo_id').val();
	            $log.info(data)
	            $scope.modelos = data;
	        }
	        ,
	        function (data){
	            $log.info('error')
	    	}
	    )
	}

	$scope.getModelos();
	// $scope.modeloId = $('#modelo_id').val();
}])



