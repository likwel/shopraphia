

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
  
  $rqt_commande="SELECT * from ventes inner join article on ventes.article_id=article.id_article where etat ='Brouillon'";

  try{
   $pdo = new PDO($dsn, $username, $password);
   
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
		<tr><th> REMPLIRE PAR VOTRE INFORMATION </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Nom de la société</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Société">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Adresse de la société</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Adresse">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Adresse E-mail</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Votre email">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Contact rapide</label>
				  <div class="controls">
					<input type="text" id="inputPassword1" placeholder="Votre contact">
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

              		<?php 
              		if ($row2['devise']==1) {
						$devise='Ar';
					}
					if($row2['devise']==2){
						$devise="€";
					}
					if($row2['devise']==3){
						$devise="$";
					}
					if($row2['devise']==4){
						$devise="¥";
					}
              		 ?>

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
                  <td colspan="6" style="text-align:right">MONTANT HT</td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(quantite*prixunitaire) as PHT , devise from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td> 
				                <?php 
				                	if(isset($res)){
				                		echo $res['PHT'].' '.$res['devise'];
				                	}else{
				                		echo '0';
				                	}
				                ?>
			                </td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right">Remise </td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(quantite*prixunitaire*remise/100) as PHT , devise from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td> 
				                <?php 
				                	if(isset($res)){
				                		echo $res['PHT'].' '.$res['devise'];
				                	}else{
				                		echo '0';
				                	}
				                ?>
			                </td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
                 <tr>
                  <td colspan="6" style="text-align:right">TVA collectée </td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(quantite*prixunitaire*tva/100) as PHT, devise from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td> 
				                <?php 
				                	if(isset($res)){
				                		echo $res['PHT'].' '.$res['devise'];
				                	}else{
				                		echo '0';
				                	}
				                ?>
			                </td>
			                <?php
			                }
			            $reponse->closeCursor();
	         
	        		?>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>MONTANT TTC</strong></td>
                  <?php
	             
			            $sac = $pdo->query("SELECT sum(soustotal) as PHT, devise from ventes where origine='Demande par Web' and etat='Brouillon'");
			             while ($res = $sac->fetch())
			                {
			                ?>
			                <td class="label label-important" style="display:block"> <strong> 
				                <?php 
				                	if(isset($res)){
				                		echo $res['PHT'].' '.$res['devise'];
				                	}else{
				                		echo '0';
				                	}
				                ?>
			                </td>
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
				<input type="text" class="input-medium" placeholder="CODE" value="">
				<button type="submit" class="btn"> AJOUTER </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			
	<a href="list.php?depart=<?=$_GET['depart']?>&nombre=9" class="btn btn-large"><i class="icon-arrow-left"></i> Continuer un achat </a>
	<a href="login.php" class="btn btn-large pull-right">Confirmer votre commande <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
