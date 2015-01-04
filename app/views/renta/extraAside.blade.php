
<aside id="secondary" class="sidebar-left" ng-controller="reservaController">	
	<div class="widget">
		<h3 class="widget-title">
			<img src="images/order_info.png" alt="" />
			Mi Reserva
		</h3>
		<h4>
			Carro <span ng-bind="reserva.carro.precio | currency"></span>
			<a href="{{route('chooseCar')}}" title="">Edit</a>
		</h4>
		<div class="widget-content main-block product-widget-mini">								
			<div class="product-img">
				<img src="http://placehold.it/105x55" alt="" />
			</div>
			<div class="product-info">
				<div class="entry-format">
					<div ng-bind="reserva.carro.marca"></div>
					<span ng-bind="reserva.carro.modelo"></span>
				</div>
				<div class="features">

					<p></span><img src="images/passenger-icon.png" alt="" /> <span  ng-bind="reserva.carro.capacidad"></p>
					<p ><img src="images/suitcase-icon.png" alt=""/> <span ng-bind="reserva.carro.equipamiento"></span></p>
					<p> <img src="images/transmission-icon.png" alt="" /> <span ng-bind="reserva.carro.transmision"></span> </p>
					<p><img src="images/air-icon.png" alt="" /> aire acondicionado </p>
					<p ><img src="images/km_l-icon.png" alt="" /> <span ng-bind="reserva.carro.kmGalon"> </span> km/l</p>						
				</div>
			</div>
			</div>

		<div class="subtotal_content">
			<div class="subtotal">				
				Subtotal: <span class="price" ng-bind=" reserva.totalCarro | currency"></span>
			</div>
		</div>
		<h4 class="extras">Extras</h4>
		<div class="widget-content widget-extras" ng-repeat="extra in reserva.extras track by $index" style="position:relative">	
			<a href="" ng-click="remove($index)" style="   				position: absolute;
																	    right: 0px;
																	    top: 0px;
																	    padding: 0px 3px;
																	    background-color: rgb(252, 211, 211);
																	    color: rgb(174, 53, 53);
																	    font-size: smaller;">
				X
				</a>							
			<p ><span ng-bind="extra.nombre"></span> <span class="price" ng-bind="extra.precio | currency"></span></p>
		</div>

		<div class="widget-footer widget-footer-total">
			Total: <span class="price" ng-bind="reserva.total | currency"></span>
		</div>
		<h4>
			Date &amp; Location
			<a href="{{route('home')}}" title="">Edit</a>
		</h4>
		<div class="widget-content widget-info">									
			<h4>Fecha reserva </h4>
			<p ng-bind="reserva.fechaReserva"></p>
			<h4>Fecha devolución</h4>
			<p ng-bind="reserva.fechaDevolucion"></p>
			<h4>Lugar de entrega y devolución </h4>
			<p ng-bind="reserva.lugarEntrega ">
				<span ng-bind="  reserva.lugarDevolucion"> </span>
			</p>
		</div>
	</div>															
</aside>	