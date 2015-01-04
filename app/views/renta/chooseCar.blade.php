@extends('renta.template')

	@section('main')
		@include('renta.progressBar')
		<div id="main">
			@include('renta.updateFechas')
			<div id="primary">					
				<div class="clear"></div>
				@include('renta.filtros')
				<div id="content" class="sidebar-middle">
					<div class="widget main-widget product-widget">
						<div class="content-overlay">
							<img class="ajax-loader" src="images/ajax-loader.gif" alt="" />
						</div>
						@include('renta.carsJS')						
					</div>
					<div class="pagination">
						<div class="left"></div>
						<div class="current">1</div>
						<div>2</div>
						<div>3</div>
						<div>...</div>
						<div>10</div>
						<div class="right"></div>
						<p class="clear"></p>
					</div>
				</div>				
				<div class="clear"></div>
			</div>	
		</div>
	@stop