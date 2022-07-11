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
  $id=$_GET['id'];
  $sql_all_product = "SELECT *, listeprix.devise as Monay FROM `article` inner join listeprix on article.devise=listeprix.id_listeprix where id_article=".$id;
  // $rqt="SELECT sum(qtte) as stock from (select sum(stock) qtte from stock group by id_article union select qtte from article order by id_article ) as tb where id_article='.$id'. group by id_article";
  //$rqt="SELECT sum(stock) as dispo from stock where id_article='.$id.'group by id_article";

  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql_all_product);
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
    <li><a href="list.php?depart=0&nombre=9">Produits</a> <span class="divider">/</span></li>
    <li class="active">Details de produit</li>
    </ul>	
	<div class="row">	  
		<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
			<div id="gallery" class="span3">
            <a href="../themes/images/products/large/f1.jpg" title="Photos">
            	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="Aucune image"/>';?>
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item">
                   <a href="../themes/images/products/large/f3.jpg" > <img style="width:29%" src="../themes/images/products/large/f3.jpg" alt=""/></a>
                   <a href="../themes/images/products/large/f1.jpg"> <img style="width:29%" src="../themes/images/products/large/f1.jpg" alt=""/></a>
                   <a href="../themes/images/products/large/f2.jpg"> <img style="width:29%" src="../themes/images/products/large/f2.jpg" alt=""/></a>
                  </div>
                </div>
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>

			<div class="span6">
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
				<h3><?php echo htmlspecialchars($row['name']); ?></h3>
				<small>Référence : <?php echo htmlspecialchars($row['ref']); ?></small>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm" action="pannier.php">
				  <div class="control-group">
					<label class="control-label"><span>Prix : <?php echo htmlspecialchars(number_format($row['prix'], 2, ',', ' ').' '.$devise).' HT'; ?></span></label>
					<div class="controls">
					<input type="number" class="span1" placeholder="Qtté"/>
					  <a type="submit" class="btn btn-large btn-primary pull-right" name="addPannier" href="addPannier.php?id=<?=$row['id_article']?>&depart=<?=$row['id_article']?>"> Ajouter au panier <i class=" icon-shopping-cart"></i></a>
					</div>
				  </div>
				</form>
				<label>Taxe collectée : <?php echo htmlspecialchars($row['taxe'].' %'); ?></label>
				<hr class="soft"/>

				<h4><?php echo htmlspecialchars($row['stock']); ?> articles en stock</h4>

				<form class="form-horizontal qtyFrm pull-right">
				  <div class="control-group">
					<label class="control-label"><span>Couleur</span></label>
					<div class="controls">
					  <select class="span2">
						  <option>Black</option>
						  <option>Red</option>
						  <option>Blue</option>
						  <option>Brown</option>
						</select>
					</div>
				  </div>
				</form>
				<hr class="soft clr"/>
				<strong>Description :</strong><br><br>
				<p>
				<?php echo htmlspecialchars($row['description']); ?>
				</p>
				
				<a class="btn btn-small pull-right" href="#detail">Plus de details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Details du Produit</a></li>
              <li><a href="#profile" data-toggle="tab">Relation Producits</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Information du Produit</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Details du produit</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Famille</td><td class="techSpecTD2"><?php echo htmlspecialchars($row['categorie']); ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Type</td><td class="techSpecTD2"><?php echo htmlspecialchars($row['typ']); ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Codebare</td><td class="techSpecTD2"> <?php echo htmlspecialchars($row['barrecode']); ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Unité</td><td class="techSpecTD2"> <?php echo htmlspecialchars($row['unite']); ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Date de création</td><td class="techSpecTD2"><?php echo htmlspecialchars($row['date_creation']); ?></td></tr>
				</tbody>
				</table>
				
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>
          <?php endwhile; ?>	

	</div>
</div>
