<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: PlusBusiness
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Aprendiendo arreglos PHP con ARCS.</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="/layout/styles/layout.css" type="text/css" />
		<link href="/jquery-ui-1.11.4/jquery-ui.css" rel="stylesheet">
		<style>
			.buttonRight{
				float:right;
				margin-right:20px;
			}
			.buttonLeft{
				float:left;
			}
			.code{
				margin: 20px;
				width: 560px;
				
			}
			#exercise{
				margin: 20px;
				width: 560px;
			}
			.nextButton{

				float:right;
				background-color:#95ad19;
				height:40px;
				width:200px; 
				font-weight: 900;

			}
			.yellowButton{

				background-color:#FFa500;
				height:30px;
				width:171px; 

			}
			.greenButton{

				background-color:#95ad19;
				height:40px;
				width:171px; 
				font-weight: 900;

			}
			.blueButton{

				background-color:#ADD8E6;
				height:40px;
				width:171px; 
				font-weight: 900;

			}
			pre {
			    white-space: pre-wrap;       /* CSS 3 */
			    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
			    white-space: -pre-wrap;      /* Opera 4-6 */
			    white-space: -o-pre-wrap;    /* Opera 7 */
			    word-wrap: break-word;       /* Internet Explorer 5.5+ */
			}
			#inputData label, #reinputData label {
				display:block;
				clear:both;
			}
			.passedFront{
				position:absolute; 
				z-index:50; 
				background-image: url('/images/done.gif'); 
				background-repeat: no-repeat;
				background-position: center center; 
				background-size:contain; 
				display:none;
			}
			@if(isset($currentUser) && $currentUser && $currentUser->a1)
				.ace-tm{
					background-color: {{$a1SuperLightBackground}};
				}
				#container{
					background-color: {{$a1SuperLightBackground}} !important;
					padding: 20px;
				}
				.wrapper.col3{
					background-color: {{$a1StrongBackground}};	
				}
				#column .holder{
					background-color: {{$a1SuperLightBackground}};
				}
			@endif
			[data-code] {line-height: 15}

			.phpVariable{
				
				color: #000;
				font-weight: 500;
				padding-left:5px;
				padding-right:5px;
				font-family: courier;
				@if(isset($currentUser) && $currentUser && $currentUser->a1)
					background-color:{{$a1LightBackground}};
				@endif
			}
		</style>
		<style type="text/css" media="screen">
			body {
				overflow: hidden;
			}
		</style>
		<script type="text/javascript" src="/layout/scripts/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery-ui-1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.base64.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.validate.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.validate.additional.methods.js"></script>
		<script type="text/javascript" src="/layout/scripts/layout.js"></script>
		<script type="text/javascript" src="/layout/scripts/inputData.js"></script>
		<script type="text/javascript" src="/ace/ace.js"></script>
		
		
		<script type="text/javascript" src="/layout/scripts/codeExercise.js"></script>
		<script type="text/javascript" src="/layout/scripts/codeHidePhp.js"></script>
		<script type="text/javascript" src="/layout/scripts/codeDisableAlerts.js"></script>
		<script type="text/javascript" src="/layout/scripts/codeRestrictedEdit.js"></script>
		<script type="text/javascript" src="/layout/scripts/code.js"></script>
		<script type="text/javascript" src="/layout/scripts/pager.js"></script>
		<script type="text/javascript" src="/layout/scripts/timer.js"></script>
		<script type="text/javascript" src="/layout/scripts/clearCache.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.cookie.js"></script>

		<script type="text/javascript" src="/layout/scripts/styling/phpVariables.js"></script>
		

		<script src='https://www.google.com/recaptcha/api.js?&hl=es'></script>
	</head>
	<body id="top" style="font-size:120%">
		@if(isset($step) && isset($page))
			<div data-localInfo data-step="{{$step}}" data-page="{{$page}}"></div>
		@endif
		<!-- ####################################################################################################### -->
		<div class="wrapper col1">
		  <div id="header">
		    <div id="logo">
		    	<a href="/">
			    	<img src="/images/knolic.png" alt="knolic" style="max-height:60px;"/>
			    </a>
		    </div>
		    <div id="topnav">
		      <ul>
		      	<li class="active last" style="padding: 15px 20px;background-color:#b2c629; color:#ffffff;">Bienvenido
			      	@if(isset($currentUser) && $currentUser->r3)
			        	 {{{$currentUser->name}}}
			        @endif
		        </li>
		        @if(isset($currentUser) && $currentUser)
			        <li>
			        	<a href="{{route('logout')}}">Cerrar sesión</a>
			        </li>
		        @endif
		      </ul>
		    </div>
		    <br class="clear" />
		  </div>
		</div>
		<!-- ####################################################################################################### -->
		<!-- ['#fff2cc', '#fce5cd', '#f4cccc', '#d9d2e9', '#cfe2f3', '#d9ead3'] -->
		<div class="wrapper col3" >
  			<div id="container">

				
				<div id="content">
					@include('template.navigation')
					<br class="clear" />
					@yield('content')
					<br class="clear" />
					@include('template.navigation')
				</div>
				@if(isset($currentUser) && $currentUser->a21)
					<div id="column">
						<div class="holder">
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							
								<img src="/images/apple.png">
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
						</div>
					</div>
				@endif
				
				<br class="clear">
			</div>
		</div>
		<!-- ####################################################################################################### -->
		<div class="wrapper col4">
		  <div id="footer">
		    <div class="box1">
		      <h2>Knolic</h2>
		      <!--img class="imgl" src="../images/demo/imgl.gif" alt="" /-->
		      <p>Knolic fue creado con la intención de comprobar y optimizar el uso de ARCS en la enseñanza de leguajes formales de programación, en este caso especifico, los arreglos de PHP</p>
		      <p>Cualquier sugerencia será bienvenida.</p>
		      <p>Disfrute su aprendizaje!</p>
		    </div>
		    <div class="box contactdetails">
		      <h2>Información de contacto</h2>
		      <ul>
		        <li>Universidad de San Carlos de Guatemala</li>
		        <li>Facultad de Ingenieria</li>
		        <li>Escuela de Ciencias y Sistemas</li>
		        <li>Seminario de Investigación</li>
		        <li>Email: <a href="#" data-email="{{{$email}}}" title ="Haz click para ver"> Haz click para ver</a></li>
		        <li>Carnet: 200614739</li>
		      </ul>
		    </div>
		    <div class="box flickrbox">
		      <h2>Enlaces relacionados</h2>
		      <div class="wrap">
		        <div class="fix"></div>
		        <div class="flickr_badge_image" id="PHP logo">
		        	<table style="margin:0px; border:0px none; padding: 0px;">
		        		<tr><td width="80" height="80" align="center"  style="margin:0px; border:0px none; padding: 0px; vertical-align:middle;">
		        			<a href="php.net" target="_blank"><img src="/images/php.png" alt="PHP Logo" style="max-width:80px; max-height:80px;"/></a></td></tr></table></div>
		        <div class="flickr_badge_image"><a href="http://www.arcsmodel.com/" title="Modelo ARCS" target="_blank"><img src="/images/arcs.png" alt="ARCS Logo" /></a></div>
		        <div class="flickr_badge_image" id="flickr_badge_image3"><a href="http://www.usac.edu.gt/" title="Universidad de San Carlos de Guatemala" target="_blank"><img src="/images/usac.png" alt="USAC logo" /></a></div>
		        <div class="flickr_badge_image" id="flickr_badge_image4"><a href="#"></a></div>
		        <div class="flickr_badge_image" id="flickr_badge_image5"><a href="#"></a></div>
		        <div class="flickr_badge_image" id="flickr_badge_image6"><a href="#"></a></div>
		        <div class="fix"></div>
		      </div>
		    </div>
		    <br class="clear" />
		  </div>
		</div>
		<!-- ####################################################################################################### -->
		<div class="wrapper col5">
		  <div id="copyright">
		    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">knolic.com</a></p>
		    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
		    <br class="clear" />
		  </div>
		</div>

	</body>
</html>
<!-- http://www.arcsmodel.com/ -->