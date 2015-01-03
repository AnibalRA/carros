
angular.module('chooseCar', ['renta'])

.controller('chooseCarController', ['chooseCarService', 'reservaService', '$log', '$scope', function (chooseCarService, reservaService, $log, $scope){
	$scope.carros = [];
	$log.info('controlere')
	

	function search(){
		fechas = reservaService.get();
			chooseCarService.all(fechas, 1).then(function (data){
			$scope.carros = data['data'];
			// $log.info(data);
		})
	}


	search();
}])

.factory('chooseCarService', ['$q', '$log', '$http', function ($q, $log, $http) {

	function all(fechas, page){
		$log.info('service')
		defer = $q.defer();
		$http.get('cars/'+ fechas.fechaReserva.replace(/\//gi, '-') +'/'+ fechas.fechaDevolucion.replace(/\//gi, '-') +'?page=' + page)
		.success( function (data){
			defer.resolve(data);
		})
		.error (function (data){
			defer.reject();
		})
		return defer.promise;
	}

	function byId(){

	}

	return {
		all : all,
		byId : byId
	}
}])