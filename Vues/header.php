<?php
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
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql_all_product = "SELECT * FROM famille where mere ='Mère'";
  $count_panier="SELECT sum(quantite) as Somme from ventes where origine ='Demande par Web' and etat='Brouillon'";
  
  $nombre =9;
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql_all_product);
   $stm2 = $pdo->query($count_panier);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }

  //echo number_format(20000, 2, ',', ' ') . "$";

?>

<div id="header">
  <div class="container">
  <div id="welcomeLine" class="row">
      <div class="span6">Bienvenu!<strong> 
        <?/*php if(isset($_SESSION["username"]))  
           {  
                echo $_SESSION["username"];  
           }  
           else  
           {  
                header("location:index.php");  
           } */  
           echo $_SESSION["username"];
           echo number_format(20000, 2, ',', ' ') . "$";
           ?>
   
 </strong></div>
      <div class="span6">
      <div class="pull-right">
          <a href="pannier.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> Shop Raphia | Madagascar | Tél : +26134 85 234 79</span> </a> 
      </div>
      </div>
  </div>
<!-- Navbar ================================================== -->
  <div id="logoArea" class="navbar d">
  <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
  </a>
    <div class="navbar-inner">
      <a class="brand" href="index.php" style="height: 30px;width: 20%;"><img src="themes/images/SR.PNG" alt="texte alternatif" /></a>
      
          <form class="form-inline navbar-search" method="get"  action="list_filter.php">
          <input id="srchFld" class="srchTxt search" type="text" name="filtre" placeholder="Rechercher ici..." style="padding-left: 25px;" />
            <select class="srchTxt">
              <option>Tous</option>
              <option>Sac en raphia </option>
              <option>Cabas en raphia </option>
              <option>Accessoires</option>
              <option>Décorations</option>
              <option>Autres produits</option>
          </select> 
            <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
      </form>
      <ul id="topMenu" class="nav pull-right">
       <li class=""><a href="index.php" style="color: #04c; font-size: medium;">Accueil</a></li>
       <li class=""><a href="promotion.php?depart=0&nombre=<?=$nombre?>" style="color: #04c; font-size: medium;">Promotions</a></li>
       <li class=""><a href="contact.php" style="color: #04c;font-size: medium;">Contact</a></li>

       <li class="">
       <a href="pannier.php" style="padding-right:0;color: white;font-size: large;"><i class="icon-shopping-cart" style="height: 10px;margin-top: 5px;"></i><span class="badge" style="background-color: #f89406;">
          <?php
             
                $reponse = $pdo->query("SELECT sum(quantite) as Somme from ventes where origine ='Demande par Web' and etat='Brouillon'");
                 
                 
                while ($donnees = $reponse->fetch())
                {
                ?>
                <?php 
                if (isset($donnees[0])) {
                  echo $donnees[0]; 
                }else{
                  echo "0";
                }
                
                ?>
          
                <?php
                }
            $reponse->closeCursor();
         
        ?>
       </span> </a>

      <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3>Se connecter au Shop Raphia</h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal loginFrm" action="index.php" method="post">
                <div class="control-group">                               
                  <input type="text" id="inputEmail" placeholder="Email" name="username">
                </div>
                <div class="control-group">
                  <input type="password" id="inputPassword" placeholder="Mot de passe" name="password">
                </div>
                <div class="control-group">
                  <label class="checkbox">
                  <input type="checkbox"> Souvenez moi
                  </label>
                </div>
              </form>     
              <button type="submit" class="btn btn-success" name="login">Se connecter</button>
              <button class="btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
            </div>
      </div>
      </li>
      </ul>
        
        <div style="float: left;width: 100%;">
          <div style="text-align: center;">
           <a href="list.php?depart=0&nombre=<?=$nombre?>" style="color: white;font-size: medium;"> TOUS </a>

            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
              <span style="color: white;font-size: medium;">  |  </span>
              <a href="list_filter.php?filtre=<?=$row['nom']?>" style="color: white;font-size: medium;"> <?php echo htmlspecialchars($row['nom']); ?> </a>
           <?php endwhile; ?>

          </div>
          
        </div>

    </div>

  </div>

  </div>
  </div>
<style type="text/css">
  .navbar-inner{
      min-height: 50px;
      padding-left: 20px;
      padding-right: 20px;
      background-color: #3CB9C6;
      background-image: linear-gradient(to bottom, #3CB9C6, #3CB9C6);
      background-repeat: repeat-x;
      border: 1px solid #FFF;
      border-radius: 4px;
      box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.067);
  }
  .search{
      padding-left: 20px;
  }
  </style>
