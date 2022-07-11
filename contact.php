<!--
<?php
    if (isset($_POST['mail'])) {
        $retour = mail('eliefenohasina@gmail.com', $_POST['objet'], $_POST['msg'], 'From:'.$_POST['from'] . "\r\n" . 'Par : ' . $_POST['nom']);
        if($retour){
            $message='<p>Votre message a bien été envoyé.</p>';
        }else{
        	$message='<p>Message non envoyé.</p>';
        }
    }
?>
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shop Raphia | Madagascar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <!-- <link rel="shortcut icon" href="themes/images/ico/favicon.ico"> -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
	<?php include("Vues/header.php"); ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
		<hr class="soften">
		<h1>Visitez nous</h1>
		<hr class="soften"/>	
		<div class="row">
			<div class="span4">
			<h4>Détails d'adresse & Contact </h4>
			<p>	II E 14 GBGA Tsarahonenana,<br/> 101, ANTANANARIVO MADAGASCAR
				<br/><br/>
				info@shopraphia.com<br/>
				﻿Tél  : +261 85 234 79<br/>
				Site :www.shopraphia.com
			</p>		
			</div>
				
			<div class="span4">
			<h4>Heurs d'ouverture</h4>
				<h5> Lundi - Vendredi</h5>
				<p>08:00am - 06:00pm<br/><br/></p>
				<h5>Samedi</h5>
				<p>08:00am - 12:00am<br/><br/></p>
			</div>
			<div class="span4">
			<h4>Contactez-vous</h4>
			<form class="form-horizontal" method="post">
	        <fieldset>
	          <div class="control-group">
	           
	              <input type="text" placeholder="Votre nom" class="input-xlarge" name="nom" />
	           
	          </div>
			   <div class="control-group">
	           
	              <input type="text" placeholder="Votre e-mail" class="input-xlarge" name="from" />
	           
	          </div>
			   <div class="control-group">
	           
	              <input type="text" placeholder="Objet" class="input-xlarge" name="objet" />
	          
	          </div>
	          <div class="control-group">
	              <textarea rows="3" id="textarea" class="input-xlarge" placeholder="Votre message" name="msg"></textarea>
	           
	          </div>
	            <button class="btn btn-large" type="submit" name="mail">Envoyer le Message</button>

	        </fieldset>
	      </form>
			</div>
		</div>
		<div class="row">
		<div class="span12">
		<iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14&amp;output=embed"></iframe><br />
		<small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">Voir map plus grand</a></small>
		</div>
		</div>-18.905283, 47.548242
	</div>
	</div>
	<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<?php include("Vues/footer.php"); ?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>

</div>
<span id="themesBtn"></span>
</body>
</html>