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
	<div class="row">
		<?php include("Vues/sidebar.php"); ?>
		

		<div class="span9">
		    <ul class="breadcrumb">
				<li><a href="index.html">Home</a> <span class="divider">/</span></li>
				<li class="active">Inscription</li>
		    </ul>
			<h3> Inscription</h3>	
			<div class="well">
			<form class="form-horizontal" >
				<h4>Votre information personnelle</h4>
				<div class="control-group">
				<label class="control-label">Titre</label>
				<div class="controls">
				<select class="span1" name="days">
					<option value="">-</option>
					<option value="1">Mr.</option>
					<option value="2">Mme.</option>
					<option value="3">Mlle.</option>
				</select>
				</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputFname1">Nom<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="inputFname1" placeholder="First Name">
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label" for="inputLnam">Prénom(s)<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="inputLnam" placeholder="Last Name">
					</div>
				 </div>
				<div class="control-group">
				<label class="control-label" for="input_email">E-mail <sup>*</sup></label>
				<div class="controls">
				  <input type="email" id="input_email" placeholder="Email">
				</div>
			  </div>	  
			<div class="control-group">
				<label class="control-label" for="inputPassword1">Mot de passe <sup>*</sup></label>
				<div class="controls">
				  <input type="password" id="inputPassword1" placeholder="Password">
				</div>
			  </div>	  

			 <!--
			<div class="alert alert-block alert-error fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
			 </div>	
			-->

				<h4>Votre coordonnés professionnelles</h4>
				
				<div class="control-group">
					<label class="control-label" for="company">Société<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="company" placeholder="Société"/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="company">NIF<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="company" placeholder="Société"/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="company">STAT<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="company" placeholder="Société"/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="company">RCS<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="company" placeholder="Société"/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="address">Adresse<sup>*</sup></label>
					<div class="controls">
					  <input type="text" id="address" placeholder="Adresse"/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="address2">Rue</label>
					<div class="controls">
					  <input type="text" id="address2" placeholder="Rue..."/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="city">Ville</label>
					<div class="controls">
					  <input type="text" id="city" placeholder="Ville"/> 
					</div>
				</div>
		
				<div class="control-group">
					<label class="control-label" for="postcode">Code Postal</label>
					<div class="controls">
					  <input type="text" id="postcode" placeholder="Code postal"/> 
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="country">Pays</label>
					<div class="controls">
					<select id="country" >
						<option value="">-</option>
						<option value="1">Madagascar</option>
						<option value="1">France</option>
						<option value="1">Etat-Unis</option>
						<option value="1">Canada</option>
						<option value="1">Chine</option>
						<option value="1">Autre</option>
					</select>
					</div>
				</div>	

				<div class="control-group">
					<label class="control-label" for="phone">Contact <sup>*</sup></label>
					<div class="controls">
					  <input type="text"  name="phone" id="phone" placeholder="Numéro téléphone"/>
					</div>
				</div>
				
			<p><sup>*</sup>  Champ obligatoire</p>
			
			<div class="control-group">
					<div class="controls">
						<input type="hidden" name="email_create" value="1">
						<input type="hidden" name="is_new_customer" value="1">
						<input class="btn btn-large btn-success" type="submit" value="S'inscrire maintenant" />
					</div>
				</div>		
			</form>
		</div>




		</div>
	</div>
</div>
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