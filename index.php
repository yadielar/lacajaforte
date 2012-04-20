<?php 

$fblogin = true;

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>La Caja Forte - Kia</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div id="container">
	<div id="main" class="clearfix">
		<div id="header">
			<div id="logo"><img src="images/logo_lacajaforte.png" width="317" height="270"/></div>
			<h1 id="slogan">¡Ingresa tu código y gana premios<br> al instante!</h1>
		</div>
		<div id="feedback">
			<div id="lock"></div>
			<div id="progress"><div id="switch"></div></div>
			<div id="output" class="correct"><span></span></div>
		</div><!--end of #feedback-->
	</div><!--end of #main-->
	<div id="interface" class="clearfix">
		<?php if ($fblogin): ?>
			<div id="instructions">
				<h2>Escribe tu c&oacute;digo aqu&iacute;</h2>
				<p>¿No tienes tu código? Obténlo <a href="#">aquí</a>.</p>
			</div>
		<?php else : ?>
			<div id="fb-login">
				<p>Con&eacute;ctate para continuar.</p>
				<a href="#"><img src="images/facebook-login-button.png"></a>
			</div>
		<?php endif; ?>
		
		<div id="code" <?php if (!$fblogin) : echo 'class="disabled"'; endif; ?>><!-- Use class="disabled" when not logged in to Facebook -->
			<div class="padder clearfix">
				<form id="secretcode" action="verify_code.php" method="post">
					<div class="box"><input id="k1" name="k1" type="text" maxlength="1" autofocus="autofocus"/></div>
					<div class="box"><input id="k2" name="k2" type="text" maxlength="1"/></div>
					<div class="box"><input id="k3" name="k3" type="text" maxlength="1"/></div>
					<div class="box"><input id="k4" name="k4" type="text" maxlength="1"/></div>
					<div class="box"><input id="k5" name="k5" type="text" maxlength="1"/></div>
					<a id="code-enter" class="ir" href="#">Enter</a>
				</form>
			</div>
		</div>
	</div><!--end of #interface-->
	<div id="win">
		<h3 class="message"></h3>
		<p class="prize"></p>
		<p class="wincode">C&Oacute;DIGO: <span></span></p>
		<p class="info">&iexcl;DALE! Visita nuestra exhibici&oacute;n en Plaza del Sol en Bayam&oacute;n con una identificaci&oacute;n con foto vigente y copia de este mensaje para reclamar tu premio. Para m&aacute;s informaci&oacute;n escr&iacute;be a <a href="mailto:kiamotorspr@gmail.com">kiamotorspr@gmail.com</a>.</p>
	</div><!--end of #win-->
</div>
<div id="footer"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

<script type="text/javascript" src="js/plugins/jquery.autotab-1.1b.js"></script>
<script src="js/script.js"></script>

<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
