var app = angular.module('renta', [])

app.controller('reservaController', ['reservaService', '$log', '$scope', '$rootScope', function (reservaService, $log, $scope, $rootScope){

	$scope.book = function (){
		$scope.reserva.fechaReserva = $('#fechaReserva').val(); //cambiar por fecha del dia
		$scope.reserva.fechaDevolucion = $('#fechaDevolucion').val(); //cambiar por fecha del dia + 1 dia
		$scope.reserva.lugarEntrega = $('#lugarEntrega').val();
		$scope.reserva.lugarDevolucion = $('#lugarDevolucion').val();
		reservaService.set($scope.reserva);
	}

	restaFechas = function(f1,f2)
	 {	
		var aFecha1 = f1.split('-'); 
		var aFecha2 = f2.split('-'); 
		var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
		var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
		var dif = fFecha2 - fFecha1;
		var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
		return dias;
	 }

	
		 $scope.reserva = reservaService.get();
	if($scope.reserva.carro){
		 $scope.reserva.dias = restaFechas($scope.reserva.fechaReserva.replace(' ', '-'), $scope.reserva.fechaDevolucion.replace(' ', '-'));
		 $scope.reserva.totalCarro = $scope.reserva.dias * $scope.reserva.carro.precio;
		 calcularTotal()
	}

	function calcularTotal(){
		$scope.reserva.total = $scope.reserva.totalCarro;
		$scope.reserva.extras.forEach(function (extra){
			if(extra.cobro)
				$scope.reserva.total += (extra.precio)
			else 
				$scope.reserva.total += (extra.precio * $scope.reserva.dias)
		})
		return true;
	}
	$rootScope.$on('addExtra', function(event, extra){
		$scope.reserva.extras = $scope.reserva.extras || [];
		$scope.reserva.extras.push(extra);// = $scope.reserva.extras.concat(newRoleArray);
		reservaService.set($scope.reserva);
		calcularTotal()
	})
	$scope.remove = function (index){
		$scope.reserva.extras.splice(index, 1);
		reservaService.set($scope.reserva);
		calcularTotal();
		// $log.info($scope.reserva)
	}

}])

app.factory('reservaService', ['$window', '$log', function ($window, $log){
	function get(){
		return JSON.parse($window.localStorage['fechaReserva'] || defecto());
	}

	function defecto()
	{	now = new Date();
		today  = now.getDay() + "-" + (now.getMonth() + 1) + "-" + now.getFullYear() + " " + now.getHours() + ":" + now.getMinutes();
		tomorrow = today;
		return '{"fechaReserva":"' + today + '", "fechaDevolucion":"' + tomorrow + '", "lugarEntrega" : 1,"lugarDevolucion" : 1	}';
	}

	function set(reserva){
		$window.localStorage['fechaReserva'] = JSON.stringify(reserva)
	}
	return {
		get : get,
		set : set
	}
}])


.controller('chooseCarController', ['chooseCarService', 'reservaService', '$log', '$scope', '$window', function (chooseCarService, reservaService, $log, $scope, $window){
	$scope.carros = [];
	$log.info('controlere')
	
	function search(){
		fechas = reservaService.get();
			chooseCarService.all(fechas, 1).then(function (data){
			$scope.carros = data['data'];
			// $log.info(data);
		})
	}
	$scope.seleccionar = function (carro){
		chooseCarService.set(carro);
		$window.location.href = 'choose-extras';

	}
	search();
}])

.factory('chooseCarService', ['$q', '$log', '$http', 'reservaService', function ($q, $log, $http, reservaService) {

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

	function set(carro){
		reserva = reservaService.get();
		reserva.carro = carro;
		reservaService.set(reserva);
		$log.info(reserva)
		return true;
	}

	function byId(){

	}

	return {
		all 	: all,
		byId 	: byId,
		set 	: set
	}
}])


.controller('extraController', ['getService', 'reservaService', '$scope', '$log','$rootScope', function (extraService, reservaService, $scope, $log, $rootScope){
	extraService.all('extras').then(function(data){
		$scope.extras = data['data'];
	})
	$scope.add = function (extra){ 
    	$rootScope.$emit('addExtra', extra);
	}
}])
.factory('getService', ['$http', '$q', function ($http, $q){
	function all(url){
		defer = $q.defer();
		$http.get(url)
		.success( function (data){
			defer.resolve(data);
		})
		.error( function (data){
			defer.reject(data);
		})
		return defer.promise;
	}

	function post(url, data){
		defer = $q.defer();
		$http.post(url, data)
		.success( function (data){
			defer.resolve(data);
		})
		.error( function (data){
			defer.reject(data);
		})
		return defer.promise;
	}

	return {
		all : all,
		post : post
	}
}])


.controller('revisarController', ['getService', '$scope', '$log', 'reservaService', function (getService, $scope, $log, reservaService){
	getService.all('user').then(function (user){
		$scope.user = user;
	})

	$scope.guardar = function(){
		reserva 		= reservaService.get(); //obteniendo datos de reserva
		reserva.usuario = {};
		// reserva.usuario = $scope.user.concat(); //esto seria lo ideal, pero ni modo no me sale asi

		reserva.usuario.nombre 		= $scope.user.nombre;
		reserva.usuario.email 		= $scope.user.email;	
		reserva.usuario.telefono 	= $scope.user.telefono;

		$log.info($scope.user);
		$log.info(reserva);
		getService.post('guardar', reserva);
	}
}])



