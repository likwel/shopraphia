<?php  
 session_start();  
/*
  $host = 'localhost';
  $dbname = 'tsaratantana';
  $username = 'root';
  $password = '';
*/
   $host = 'mysql-shopraphia.alwaysdata.net';
  $dbname = 'shopraphia_tsaratantana';
  $username = '272984';
  $password = '@laptop12';
  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>Tous les champs sont obligatoire</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username' => $_POST["username"],  
                          'password' => $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header('location:index.php?username='.$_SESSION["username"]);  
                }  
                else  
                {  
                     $message = '<label>Mot de passe incorrect</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shop Raphia | Madagascar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
				<li><a href="index.php">Home</a> <span class="divider">/</span></li>
				<li class="active">Login</li>
		    </ul>
			<h3> Login</h3>	
			<hr class="soft"/>
			
			<div class="row">
				<div class="span1"> &nbsp;</div>
				<div class="span4">
					<div class="well">
					<h5>COMPTE EXISTANT?</h5>
					<form method="post">
					  <div class="control-group">
						<label class="control-label" for="inputEmail1">Adresse e-mail</label>
						<div class="controls">
						  <input class="span3"  type="text" id="inputEmail1" placeholder="E-mail" name="username">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputPassword1">Mot de passe</label>
						<div class="controls">
						  <input type="password" class="span3"  id="inputPassword1" placeholder="Mot de passe" name="password">
						</div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <button type="submit" class="btn btn-primary" name="login">Se connecter</button>     <a href="forgetpass.html">Mot de passe oublié?</a>
						</div>
						<hr>
						<a href="register.php" class="btn block btn-primary">Créer votre compte</a> 
					  </div>
					</form>
					<strong style="color: red;text-align: center;font-style: italic;"><?php echo $message; ?></strong>
				</div>

				</div>

			</div>	

			
			
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