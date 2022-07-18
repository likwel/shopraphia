

<?php
// host : mysql-shopraphia.alwaysdata.net
//dbname : shopraphia_tsaratantana
//mdp : @laptop12
// user : 272984

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

  $today = date("Y-m-d");

  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $id=$_GET['id'];
  //$qtte=$_GET['quantité'];
  $sql_all_product = "SELECT *, listeprix.devise as Monay FROM `article` inner join listeprix on article.devise=listeprix.id_listeprix where id_article=".$id;

  $rqt_commande="SELECT * from ventes inner join article on ventes.article_id=article.id_article where etat ='Brouillon'";

  $last_doc="SELECT reference FROM `ventes` where typ='BC' and etat !='Brouillon' ORDER BY `id_facture` DESC LIMIT 1";

  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql_all_product);
   $stm_lastdoc = $pdo->query($last_doc);
   

   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>


<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
	$article_id=$row['id_article'];
	$image=$row['image'];
	$description='['.$row['ref'].'] '.$row['name'];
	$prix=$row['prix'];
	$taxe=$row['taxe'];
	$promo=$row['isPromotion'];

	$qtte=1;

	if($promo==1){
		$remise=20;
	}else{
		$remise=0;
	}

	$prixht=$prix*$taxe/100 - $prix*$remise/100;

	$soustotal=$qtte*$prix + $prixht;
	
	if ($row['Monay']=='MGA') {
		$devise='Ar';
	}
	if($row['Monay']=='EUR'){
		$devise="€";
	}
	if($row['Monay']=='USD'){
		$devise="$";
	}
	if($row['Monay']=='CNY'){
		$devise="¥";
	}

endwhile; ?>

<?php

$reference="BC/". str_pad(1 , 5,"0",STR_PAD_LEFT);

$client="WEB_CLIENT";
$adresse_client="Adresse WEB_CLIENT";
$type="DV";
$paiement="Web Money";
$origine="Demande par Web";
$etat="Brouillon";


$sql = "INSERT INTO ventes ( client, adresse_client,datefacture, typepaiment, devise, reference, article_id, quantite, prixunitaire, soustotal, typ, origine, tva, etat,remise) VALUES (:partener, :adresse, :datefacture, :paiement, :devise, :reference, :id, :qtte, :prix, :soustotal, :type, :origine, :taxe, :etat, :remise)";

$res = $pdo->prepare($sql);
$exec = $res->execute(array(":partener"=>$client,":adresse"=>$adresse_client,":datefacture"=> $today,":paiement"=> $paiement ,":devise"=>$devise ,":reference"=>$reference,":id"=>$article_id,":qtte"=>1,":prix"=>$prix,":soustotal"=>$soustotal,":type"=>$type,":origine"=>$origine,":taxe"=>$taxe,":etat"=>$etat,":remise"=>$remise));

/*
$sql = "INSERT INTO `test`(`client`, `adresse_client`) VALUES (:client,:adresse_client)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":client"=>$client,":adresse_client"=>$adresse_client));


$sql = "INSERT INTO ventes ( client, adresse_client,datefacture, typepaiment, devise, reference, article_id, quantite, prixunitaire, soustotal, typ, origine, tva) VALUES (:partener, :adresse, :datefacture, :paiement, :devise, :reference, :id, :qtte, :prix, :soustotal, :type, :origine, :taxe)";

$res = $pdo->prepare($sql);
$exec = $res->execute(array(":partener"=>$client,":adresse"=>$adresse_client,":datefacture"=> $today,":paiement"=> $paiement ,":devise"=>$devise ,":reference"=>$reference,":id"=>$article_id,":qtte"=>1,":prix"=>$prix,":soustotal"=>$soustotal,":type"=>$type,":origine"=>$origine,":taxe"=>$taxe));


$sql = "INSERT INTO ventes ( reference, client, article_id, description, quantite, prix, taxe, remise, soustotal, devise) VALUES (:reference, :client, :article_id, :description, :quantite, :prix, :taxe, :remise, :soustotal, :devise)";
$res = $pdo->prepare($sql);
$exec = $res->execute(array(":reference"=>$reference,":client"=>$client,":article_id"=> $article_id,":quantite"=> $qtte ,":prix"=>$prix ,":taxe"=>$taxe,":remise"=>$remise,":soustotal"=>$soustotal,":devise"=>$devise));

*/
try{
   //$pdo = new PDO($dsn, $username, $password);
   //$stmt = $pdo->query($sql_all_product);
   $stmt2 = $pdo->query($rqt_commande);
   

   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }

?>

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> Votre commande</li>
    </ul>
	<h3>  CARTE D'ACHAT [ <small>3 Produits </small>]<a href="list.php?depart=<?=$_GET['depart']?>&nombre=9" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continuer un achat </a></h3>	
	<hr class="soft"/>
	<table class="table table-bordered">
		<tr><th> J'AI DEJA UN COMPTE  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">E-mail</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Votre email">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Mot de passe</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Votre mot de passe">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Se connecter</button> OU <a href="register.html" class="btn">S'inscrire maintenant</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.html" style="text-decoration:underline">Mot de passe oublié ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>		
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Produit</th>
                  <th>Description</th>
                  <th>Quantité/Mise à jour</th>
				  <th>Prix</th>
                  <th>Remise (%)</th>
                  <th>Taxe (%)</th>
                  <th>Sous-total</th>
				</tr>
              </thead>
              <tbody>

              	<?php while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>

                <tr>
                  <td style="height: 20px;width: 50px;"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['image']).'" alt="Aucune image"/>';?></td>
                  <td><?php echo htmlspecialchars('['.$row2['ref'].'] '.$row2['name']); ?></td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="<?php echo htmlspecialchars($row2['quantite']); ?>" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td><?php echo htmlspecialchars($row2['prix']).' '.$devise; ?></td>
                  <td><?php echo htmlspecialchars($row2['remise']); ?></td>
                  <td><?php echo htmlspecialchars($row2['tva']); ?></td>
                  <td><?php echo htmlspecialchars($row2['soustotal']).' '.$devise;; ?></td>
                </tr>

                <?php endwhile; ?>

                <!--
				<tr>
                  <td> <img width="60" src="../themes/images/products/8.jpg" alt=""/></td>
                  <td>MASSA AST<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>$7.00</td>
                  <td>--</td>
                  <td>$1.00</td>
                  <td>$8.00</td>
                </tr>
				<tr>
                  <td> <img width="60" src="../themes/images/products/3.jpg" alt=""/></td>
                  <td>MASSA AST<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>$120.00</td>
                  <td>$25.00</td>
                  <td>$15.00</td>
                  <td>$110.00</td>
                </tr>
            -->
				
                <tr>
                  <td colspan="6" style="text-align:right">Montant HT</td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(quantite*prixunitaire) as PHT from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td> <?php echo $res['PHT'].' '.$devise ?></td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right">Remise </td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(quantite*prixunitaire*remise/100) as PHT from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td> <?php echo $res['PHT'].' '.$devise ?></td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
                 <tr>
                  <td colspan="6" style="text-align:right">TVA collectée </td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(quantite*prixunitaire*tva/100) as PHT from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td> <?php echo $res['PHT'].' '.$devise ?></td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>MONTANT TTC</strong></td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(soustotal) as PHT from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td class="label label-important" style="display:block"> <strong> <?php echo $res['PHT'].' '.$devise ?></strong></td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
				</tbody>
            </table>
		
		
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> AJOUTER </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			
	<a href="list.php?depart=<?=$_GET['depart']?>&nombre=9" class="btn btn-large"><i class="icon-arrow-left"></i> Continuer un achat </a>
	<a href="login.php" class="btn btn-large pull-right">Suivant <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
