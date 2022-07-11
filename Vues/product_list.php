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

  $limite=$_GET['nombre'];
  $depart=$_GET['depart'];

  // récupérer tous les utilisateurs

  $sql_all_product = "SELECT *, listeprix.devise as Monay FROM `article` inner join listeprix on article.devise=listeprix.id_listeprix LIMIT ". $depart .','.$limite;
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql_all_product);
   $stmt2 = $pdo->query($sql_all_product);
   
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
		<li class="active">Listes des produits</li>
    </ul>
	<h3> Tous les produits<small class="pull-right"> 40 produits sont disponible </small></h3>	
	<hr class="soft"/>
	<p>
		Madagascar est l'un des principaux producteurs d'artisanat de Raphia.
	</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Trier par</label>
			<select>
              <option>Nom du produit A - Z</option>
              <option>Nom du produit Z - A</option>
              <option>Stock du produit</option>
              <option>Prix le plus bas produit</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
			<?php 
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
		?>
		<div class="row">	  
			<div class="span2">
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="Aucune photo"/>';?>
			</div>
			<div class="span4">
				<h3><?php echo htmlspecialchars($row['ref']); ?></h3>				
				<hr class="soft"/>
				<h5><?php echo htmlspecialchars($row['name']); ?></h5>
				<p>
				<?php echo htmlspecialchars($row['description']); ?>
				</p>
				<a class="btn btn-small pull-right" href="product.php?id=<?=$row['id_article']?>">Voir Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> <?php echo htmlspecialchars(number_format($row['prix'], 2, ',', ' ').' '.$devise.' HT'); ?></h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br/>
			
			  <a href="addPannier.php?id=<?=$row['id_article']?>&depart=<?=$_GET['depart']?>" class="btn btn-large btn-primary"> Ajouter au panier <i class=" icon-shopping-cart"></i></a>
			  <a href="product.php?id=<?=$row['id_article']?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>

		<?php endwhile; ?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
			<?php while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>

			<li class="span3">
				<form method="post" action="list.php?depart=0&nombre=9">

			  <div class="thumbnail">
				<a href="product.php?id=<?=$row2['id_article']?>" style="height: 150px;width: 150px; float: top;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['image']).'" alt="Aucune photo"/>';?></a>
				<div class="caption">
				  <h5><?php echo htmlspecialchars($row2['ref']); ?></h5>
				  <p> 
					<?php echo htmlspecialchars($row2['name']); ?>
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="product.php?id=<?=$row2['id_article']?>"> <i class="icon-zoom-in"></i></a> 
				   
				   <a class="btn" href="addPannier.php?id=<?=$row2['id_article']?>&depart=<?=$_GET['depart']?>">Ajouter au panier <i class="icon-shopping-cart"></i></a> 
				   

				   <!--
				   <form method="post" action="list.php?depart=<?=$_GET['depart']?>&nombre=9">
				   		<input type="hidden" name="id">
				   		<button class="btn" type="submit" name="addPannier">Add to <i class="icon-shopping-cart"></i></button>
				   	
				   </form>
				   -->

				   <a class="btn btn-primary" href="#"><?php echo htmlspecialchars(number_format($row2['prix'], 2, ',', ' ').' '.$devise.' HT'); ?></a></h4>
				</div>
			  </div>

			  </form>

			</li>
			<?php endwhile; ?>
		  </ul>
	<hr class="soft"/>

	

	</div>
</div>

	<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination">
			<ul>
			<li>
				<?php if ($depart >= 9): ?>
				<a href="list.php?depart=<?=$depart-9?>&nombre=9">&lsaquo; Précedent</a></li>
				<?php endif; ?>
				<?php if ($depart < 9): ?>
				<a href="list.php?depart=0&nombre=9">&lsaquo; Précedent</a></li>
				<?php endif; ?>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="list.php?depart=<?=$depart+9?>&nombre=9">Suivant &rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>

<?php 

$today = date("Y-m-d");

/*
if(isset($_POST['addPannier'])){

	$reference="BC_WEB";
	$client="WEB_CLIENT";
	$adresse_client="Adresse WEB_CLIENT";
	$type="BC";
	$paiement="Web Money";
	$origine="Demande par Web";
	$etat="Brouillon";


	$sql = "INSERT INTO ventes ( client, adresse_client,datefacture, typepaiment, devise, reference, article_id, quantite, prixunitaire, soustotal, typ, origine, tva, etat) VALUES (:partener, :adresse, :datefacture, :paiement, :devise, :reference, :id, :qtte, :prix, :soustotal, :type, :origine, :taxe, :etat)";

	$res = $pdo->prepare($sql);
	$exec = $res->execute(array(":partener"=>$client,":adresse"=>$adresse_client,":datefacture"=> $today,":paiement"=> $paiement ,":devise"=>$devise ,":reference"=>$reference,":id"=>$article_id,":qtte"=>1,":prix"=>$prix,":soustotal"=>$soustotal,":type"=>$type,":origine"=>$origine,":taxe"=>$taxe,":etat"=>$etat));
}
*/
?>