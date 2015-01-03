<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Renty - Car Rental &amp; Booking HTML5 Template</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/renta/css/jquery-ui.css" type="text/css" media="all" />		
		<link rel="stylesheet" href="assets/renta/css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="assets/renta/css/jquery.slider.min.css" />	
		<!--[if IE]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" id="stylesheet-ie" href="css/css_ie.css" type="text/css" media="all" />
		<![endif]-->
	</head>
	<body class="page page-two-column" ng-app="chooseCar">
		<div id="conteiner">
			@include('renta.menu')
			<div id="progress-bar">
				<div id="progress-bar-steps">
					<div class="progress-bar-step done">
						<div class="step_number">1</div>
						<div class="step_name">Create request</div>
					</div>
					<div class="progress-bar-step current">
						<div class="step_number">2</div>
						<div class="step_name">Choose a car</div>
					</div>
					<div class="progress-bar-step">
						<div class="step_number">3</div>
						<div class="step_name">Choose extras</div>
					</div>
					<div class="progress-bar-step last">
						<div class="step_number">4</div>
						<div class="step_name">Review &amp; Book</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>				
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
			<div class="clear"></div>
		</div><!--end:conteiner-->
		<div id="overlay_block"></div>
		<div class="admin-form-content sign_register_block">
			<div class="admin-form-block">
	 			<form class="main-form admin-form" action="#">	
	 				<div class="main_form_navigation">
		 				<div id="tab_register" class="title-form back"><span class="register"><a href="#register" title="">Register</a></span></div>				
						<div id="tab_sign_in" class="title-form current"><span class="sign_in"><a href="#sign_in" title="">Sign In</a></span></div>	
					</div>			
					<div id="tab_sign_in_content" class="content-form">
						<div>
							<input id="sign_in_email" class="input_placeholder" type="text" value="" placeholder="Email address" name="sign_in_email"/>
						</div>
						<div>
							<input id="sign_in_pass" type="password" value="" name="sign_in_pass"/>
						</div>
						<div>
							<input id="remember_me_checkbox" type="checkbox" class="styled" name="remember_me" value="1"/>
							<label for="remember_me_checkbox"> Remember me next time</label>
						</div>
						<input class="admin-form-submit orange_button" type="submit" value="Continue"/>
						<div class="admin_form_link">
							<span class="forgot_passwd"><a class="tab_link_button" href="#forgot_passwd" title="">Forgot password?</a></span>
						</div>
					</div>
					<div id="tab_register_content"  class="content-form hidden">
						<div>
							<input id="register_email" class="input_placeholder" type="text" value="" placeholder="Email address" name="register_email"/>
						</div>
						<div>
							<input id="register_name" type="text" value="" name="register_name"/>
						</div>
						<div>
							<input id="register_remember_me_checkbox" type="checkbox" class="styled" name="remember_me" value="1"/>
							<label for="register_remember_me_checkbox"> Remember me next time</label>
						</div>
						<input class="admin-form-submit orange_button" type="submit" value="Continue"/>
						<div class="admin_form_link">
							<span class="sign_in"><a class="tab_link_button" href="#sign_in" title="">Already registered?</a></span>
						</div>
					</div>
					<div class="clear"></div>
				</form>				
				<div class="admin-form-separator">
					<div class="separator">Or</div>
				</div>
				<input class="connect_fb" type="button" value="Connect With Facebook"/>
				<input class="connect_twitter" type="button" value="Connect With Twitter"/>
			</div>
		</div>
		<div class="admin-form-content forgot_passwd_block"> 
			<div class="admin-form-block">
	 			<form class="main-form admin-form" action="#">	 
	 				<div class="main_form_navigation">
	 					<div id="tab_forgot_passwd" class="title-form current">Forgot Password?</div>	
	 				</div>							
					<div id="tab_forgot_passwd_content" class="content-form">
						<input id="forgot_pass_email" class="input_placeholder" type="text" value="" placeholder="Email address" name="forgot_pass_email"/>
						<div id="forgot_pass_text"> We will send you the password in few minutes.</div>
						<input class="admin-form-submit orange_button" type="submit" value="Continue"/>
						<div class="admin_form_link">
							<span class="sign_in"><a class="tab_link_button" href="#sign_in" title="">Sign In</a></span>
						</div>
					</div>
					<div class="clear"></div>
				</form>
			</div>
		</div>
		
		<script type="text/javascript" src="assets/js/angular.min.js"></script>
		<script type="text/javascript" src="assets/renta/js/angular.app.js"></script>
		<script type="text/javascript" src="assets/renta/js/choosecar.js"></script>
		
		<script type="text/javascript" src="assets/renta/js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery-ui.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery.maskedinput.js"></script>
		
		<!--[if IE]>
		<script type="text/javascript" src="assets/renta/js/placeholder_ie.js"></script>
		<![endif]-->
		<script type="text/javascript" src="assets/renta/js/jquery.meio.mask.js"></script>
		<script type="text/javascript" src="assets/renta/js/custom-form-elements.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery.selectbox-0.2.min.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery.blueberry.js"></script>
		<!-- -->
		<script type="text/javascript" src="assets/renta/js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="assets/renta/js/jquery.ui.datepicker-es.js"></script>
		<script type="text/javascript" src="assets/renta/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/renta/js/custom.js"></script>
		<script type="text/javascript" src="assets/renta/js/script.js"></script>

	</body>
</html>