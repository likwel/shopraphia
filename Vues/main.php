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

  //$nb_product = "SELECT count(*) FROM article";

  $sql_all_product = "SELECT * FROM article LIMIT 0,9";

  $lim=4;
  $query  = "SELECT *, listeprix.devise as Monay FROM `article` inner join listeprix on article.devise=listeprix.id_listeprix ORDER BY id_article DESC LIMIT 0,4";
  $query2  = "SELECT * FROM article ORDER BY id_article DESC LIMIT 4,4";
  $query3  = "SELECT * FROM article ORDER BY id_article DESC LIMIT 8,4";
  $query4  = "SELECT * FROM article ORDER BY id_article DESC LIMIT 12,4";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql_all_product);
   $stmt2 = $pdo->query($sql_all_product);

   $stmt3 = $pdo->query($query);
   $stmt4 = $pdo->query($query2);
   $stmt5 = $pdo->query($query3);
   $stmt6 = $pdo->query($query4);

   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<div class="span9">		
  <div class="span9">		
	<div class="well well-small">

	<h4>Nouveaux modèles <small class="pull-right" style="color: white;">200+ divers produits</small></h4>

	<div class="row-fluid">
	<div id="featured" class="carousel slide">
	<div class="carousel-inner">


	  <div class="item active">
	  <ul class="thumbnails">

	  	<?php while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
	  		<?php 
				if ($row3['Monay']=='MGA') {
					$devise='Ar';
				}
				if($row3['Monay']=='EUR'){
					$devise="€";
				}
				if($row3['Monay']=='USD'){
					$devise="$";
				}
				if($row3['Monay']=='CNY'){
					$devise="¥";
				}
			?>

		<li class="span3">
		  <div class="thumbnail">
		  <i class="tag"></i>
			<a href="product.php?id=<?=$row3['id_article']?>" style="width: 200px;height: 150px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row3['image']).'" alt="Aucune photo"/>';?></a>
			<div class="caption">
			  <h5><?php echo htmlspecialchars($row3['ref']); ?></h5>
			  <p>
			  	<?php echo htmlspecialchars($row3['name']); ?>
			  </p>
			  <h4><a class="btn" href="product.php?id=<?=$row3['id_article']?>">VOIR</a> <span class="pull-right"><?php echo htmlspecialchars(number_format($row3['prix'], 0, ',', ' ').$devise.' HT'); ?></span></h4>
			</div>
		  </div>
		</li>

		<?php endwhile; ?>

	  </ul>
	  </div>


	   <div class="item">
	  <ul class="thumbnails">

		<?php while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>

		<li class="span3">
		  <div class="thumbnail">
		  <i class="tag"></i>
			<a href="product.php?id=<?=$row4['id_article']?>" style="width: 200px;height: 150px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row4['image']).'" alt="Aucune photo"/>';?></a>
			<div class="caption">
			  <h5><?php echo htmlspecialchars($row4['ref']); ?></h5>
			  <p>
			  	<?php echo htmlspecialchars($row4['name']); ?>
			  </p>
			  <h4><a class="btn" href="product.php?id=<?=$row4['id_article']?>" >VOIR</a> <span class="pull-right"><?php echo htmlspecialchars(number_format($row4['prix'], 0, ',', ' ').$devise.' HT'); ?></span></h4>
			</div>
		  </div>
		</li>

		<?php endwhile; ?>

	  </ul>
	  </div>

	   <div class="item">
	  <ul class="thumbnails">
		<?php while($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) : ?>

		<li class="span3">
		  <div class="thumbnail">
		  <i class="tag"></i>
			<a href="product.php?id=<?=$row5['id_article']?>" style="width: 200px;height: 150px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row5['image']).'" alt="Aucune photo"/>';?></a>
			<div class="caption">
			  <h5><?php echo htmlspecialchars($row5['ref']); ?></h5>
			  <p>
			  	<?php echo htmlspecialchars($row5['name']); ?>
			  </p>
			  <h4><a class="btn" href="product.php?id=<?=$row5['id_article']?>" >VOIR</a> <span class="pull-right"><?php echo htmlspecialchars(number_format($row5['prix'], 0, ',', ' ').$devise.' HT'); ?></span></h4>
			</div>
		  </div>
		</li>

		<?php endwhile; ?>
	  </ul>
	  </div>

	   <div class="item">
	  <ul class="thumbnails">
		<?php while($row6 = $stmt6->fetch(PDO::FETCH_ASSOC)) : ?>

		<li class="span3">
		  <div class="thumbnail">
		  <i class="tag"></i>
			<a href="product.php?id=<?=$row6['id_article']?>" style="width: 200px;height: 150px;"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row6['image']).'" alt="Aucune photo"/>';?></a>
			<div class="caption">
			  <h5><?php echo htmlspecialchars($row6['ref']); ?></h5>
			  <p>
			  	<?php echo htmlspecialchars($row6['name']); ?>
			  </p>
			  <h4><a class="btn" href="product.php?id=<?=$row6['id_article']?>" >VOIR</a> <span class="pull-right"><?php echo htmlspecialchars(number_format($row6['prix'], 0, ',', ' ').$devise.' HT'); ?></span></h4>
			</div>
		  </div>
		</li>

		<?php endwhile; ?>
	  </ul>
	  </div>
	  </div>

	  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
	  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
	  </div>
	  </div>
</div>
<h4>Liste des produits </h4>
	  <ul class="thumbnails">

	  	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
	  		

		<li class="span3">
		  <div class="thumbnail">

				<input type="hidden" name="id" id="id_product" value="<?php echo htmlspecialchars($row['id_article']); ?>">
		  		<a style="width: 200px;height: 200px;" href="product.php?id=<?=$row['id_article']?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="Aucune photo"/>';?></a>
				<div class="caption">
				  <h5><?php echo htmlspecialchars($row['ref']); ?></h5>
				  <p> 
					<?php echo htmlspecialchars($row['name']); ?>
				  </p>
				 
				  <h4 style="text-align:center"><a class="btn" href="product.php?id=<?=$row['id_article']?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="addPannier.php?id=<?=$row['id_article']?>&depart=0">Ajouter au panier<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?php echo htmlspecialchars(number_format($row['prix'], 2, ',', ' ').' '.$devise.' HT'); ?></a></h4>
				</div>
		  </div>
		</li>

		<?php endwhile; ?>

	  </ul>	

	  <div class="pagination">
			<ul>
			<li><a href="#">&lsaquo; Précedent</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="list.php?depart=9&nombre=9">Suivant &rsaquo;</a></li>
			</ul>
		</div>
	<br class="clr"/>

</div>
</div>