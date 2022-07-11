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

  $limite=$_GET['nombre'];
  $depart=$_GET['depart'];

  $sql_all_product = "SELECT *, listeprix.devise as Monay FROM `article` inner join listeprix on article.devise=listeprix.id_listeprix where isPromotion=1 LIMIT ". $depart .','.$limite;
   
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
	<h3> Offre spécial de réduction 20%<small class="pull-right"> 40 produits sont disponible </small></h3>	
	<hr class="soft"/>
	<p>
		Madagascar est l'un des principaux producteurs d'artisanat de Raphia.
	</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Trier par</label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
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
			
			  <a href="product.php?id=<?=$row['id_article']?>" class="btn btn-large btn-primary"> Ajouter au panier <i class=" icon-shopping-cart"></i></a>
			  <a href="product.php?id=<?=$row['id_article']?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>

		<?php endwhile; ?>

		<hr class="soft"/>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
			<?php while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>

			<li class="span3">
			  <div class="thumbnail">
				<a href="product.php?id=<?=$row2['id_article']?>" style="height: 150px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['image']).'" alt="Aucune photo" style="height: 300px;"/>';?></a>
				<div class="caption">
				  <h5><?php echo htmlspecialchars($row2['ref']); ?></h5>
				  <p> 
					<?php echo htmlspecialchars($row2['name']); ?>
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="product.php?id=<?=$row2['id_article']?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Ajouter au panier <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?php echo htmlspecialchars(number_format($row2['prix'], 2, ',', ' ').' '.$devise.' HT'); ?></a></h4>
				</div>
			  </div>
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
				<a href="promotion.php?depart=<?=$depart-9?>&nombre=9">&lsaquo; Précedent</a></li>
				<?php endif; ?>
				<?php if ($depart < 9): ?>
				<a href="promotion.php?depart=0&nombre=9">&lsaquo; Précedent</a></li>
				<?php endif; ?>
			</li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="promotion.php?depart=<?=$depart+9?>&nombre=9">Suivant &rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>