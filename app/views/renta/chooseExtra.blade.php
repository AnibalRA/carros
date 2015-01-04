@extends('renta.template')

	@section('main')
		@include('renta.progressBar')			
			<div id="main">
				<div id="primary">					
					<div class="clear"></div>
					@include('renta.extraAside')
					@include('renta.extras')			
					<div class="clear"></div>
				</div>	
			</div>
			<div class="clear"></div>
		</div><!--end:conteiner-->
	@stop