<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Renta tu carro</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/renta/css/jquery-ui.css" type="text/css" media="all" />		
		<link rel="stylesheet" href="assets/renta/css/style.css" type="text/css" media="all" />
		<!--[if IE]>
		<script type="text/javascript" src="assets/renta/js/html5.js"></script>
		<link rel="stylesheet" id="stylesheet-ie" href="assets/renta/css/css_ie.css" type="text/css" media="all" />
		<![endif]-->
	</head>
	<body class="left-slider two-column" ng-app='renta'>
		<div id="conteiner">
			@include('renta.menu')
			@yield('main')
			<div class="clear"></div>
			<footer id="footer">			
				<div id="footer-menu" class="footer-content">
					<div class="widget-area">
						<div class="clear"></div>
						<div class="footer-nav footer-widget-single">
							<h3 class="widget-title">Renty</h3>
							<ul>
								<li><a href="01-home-v1.html" title="">Home</a></li>
								<li><a href="#" title="">Privacy</a></li>
								<li><a href="#" title="">Services</a></li>
								<li><a href="#" title="">Partners</a></li>
								<li><a href="#" title="">News</a></li>
							</ul>
						</div>
						<div class="footer-nav footer-widget-single">
							<h3 class="widget-title">About</h3>
							<ul>
								<li><a href="#" title="">Latest News</a></li>
								<li><a href="#" title="">Press Releases</a></li>
								<li><a href="#" title="">Careers</a></li>
								<li><a href="#" title="">Terms of Use</a></li>
							</ul>
						</div>
						<div class="footer-nav footer-widget-single">
							<h3 class="widget-title">Support</h3>
							<ul>
								<li><a href="#" title="">Contact Us</a></li>
								<li><a href="#" title="">Find Your Invois</a></li>
								<li><a href="10-faq.html" title="">FAQ</a></li>
							</ul>
						</div>
						<div class="recent_tweets footer-widget-single">
 							<h3>Recent tweets</h3>
 							<div class="recent_tweets_content"><a href="#" title="">@bestwebsoft</a> velit, vitae tincidunt orci. Proin vitae auctor lectus.</div>
 							<div class="recent_tweets_url"><a href="#" title="">http://bestwebsoft.com</a></div>
	 						<div class="recent_tweets_time">posted 2 days ago</div>	 						
 						</div>
 						<div class="support footer-widget-single">
 							<img src="images/support-icon.png" alt="" />
 							<div class="title">Online support</div>
 							<div class="phone">+1 (555) 555 - 28 - 28</div>
 							<div class="email"><a href="#" title="">sales@bestwebsoft.com</a></div>			
 						</div>
 						<div class="social-plugins">
 							<div class="fcbk_like">
 								<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.bestwebsoft.com&amp;locale=en_US&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" style="border-width:0; border:none; overflow:hidden; width:110px; height:21px; background-color: transparent;"></iframe>
							</div>
							<div class="twitter_like">
	 							<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
								<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
								</script>
							</div>
							<div class="google_plus_one">
								<div class="g-plusone" data-size="medium"></div>
								<script type="text/javascript">
								  (function() {
								    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
								    po.src = 'https://apis.google.com/assets/renta/js/plusone.js';
								    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
								  })();
								</script>								
							</div>
						</div>
						<div class="clear"></div> 						
					</div><!-- #footer-content -->
				</div>
				<div id="footer-content">
					<img class="site-logo" src="images/thumb.png" alt="" />
					<h1 class="site-title">Renty</h1>			
					<div class="company-name">Renty Company Inc,120 CA 15th Avenue - Suite 214</div>
				</div><!-- #footer-content -->
			</footer><!--end:footer-->
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


	<script type="text/javascript" src="assets/renta/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="assets/renta/js/jquery-ui.js"></script>
	<script type="text/javascript" src="node_modules/underscore/underscore-min.js"></script>
	<script type="text/javascript" src="node_modules/backbone/backbone-min.js"></script>
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

	<script type="text/javascript" src="assets/renta/js/angular.app.js"></script>
	</body>
</html>