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
		<script type="text/javascript" src="/layout/scripts/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery-ui-1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.base64.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.validate.js"></script>
		<script type="text/javascript" src="/layout/scripts/jquery.validate.additional.methods.js"></script>
		<script type="text/javascript" src="/layout/scripts/layout.js"></script>
		<script type="text/javascript" src="/layout/scripts/inputData.js"></script>
		<script src="ace/ace.js" type="text/javascript" charset="utf-8"></script>
		<script src="ace/range.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="/layout/scripts/c1.js"></script>

	</head>
	<body id="top">
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
		      	@if(isset($currentUser) && $currentUser->r3)
		        	<li class="active last" style="padding: 15px 20px;background-color:#b2c629; color:#ffffff;">Bienvenido {{{$currentUser->name}}}</li>
		        @endif
		      </ul>
		    </div>
		    <br class="clear" />
		  </div>
		</div>
		<!-- ####################################################################################################### -->
		
		<div class="wrapper col3">
  			<div id="container">

				
				<div id="content">
					@yield('content')
		
				</div>
				<div id="column">
					<div class="holder">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						@if($currentUser->a21)
							<img src="/images/apple.png">
						@endif
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