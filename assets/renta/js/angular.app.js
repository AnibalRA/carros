var app = angular.module('renta', [])

app.controller('reservaController', ['reservaService', '$log', '$scope', function (reservaService, $log, $scope){
	$scope.reserva = reservaService.get();
	$scope.book = function (){
		$log.info('submitting')
		$scope.reserva.fechaReserva = $('#fechaReserva').val(); //cambiar por fecha del dia
		$scope.reserva.fechaDevolucion = $('#fechaDevolucion').val(); //cambiar por fecha del dia + 1 dia
		$scope.reserva.lugarEntrega = $('#lugarEntrega').val();
		$scope.reserva.lugarDevolucion = $('#lugarDevolucion').val();
		reservaService.set($scope.reserva);
	}

	$log.info($scope.reserva)

}])

app.factory('reservaService', ['$window', '$log', function ($window, $log){
	function get(){
		return JSON.parse($window.localStorage['fechaReserva'] || defecto());
	}

	function defecto()
	{	now = new Date();
		today  = now.getDay() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear() + " " + now.getHours() + ":" + now.getMinutes();
		tomorrow = today;
		return '{"fechaReserva":"' + today + '", "fechaDevolucion":"' + tomorrow + '", "lugarEntrega" : 1,"lugarDevolucion" : 1	}';
	}

	function set(dates){
		$log.info(dates);
		$window.localStorage['fechaReserva'] = JSON.stringify(dates)
	}
	return {
		get : get,
		set : set
	}
}])