
<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
	<div class="well well-small"><a id="myCart" href="pannier.php"><img src="themes/images/ico-cart.png" alt="cart">Votre panier [ 
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
	 ]<span class="badge badge-warning pull-right">
	
		<?php
             
            $reponse2 = $pdo->query("SELECT sum(soustotal) as Somme , devise from ventes where origine ='Demande par Web' and etat='Brouillon'");
             while ($donnees2 = $reponse2->fetch())
                {
                ?>
                <?php 
	                if (isset($donnees2[0])) {
	                  echo number_format($donnees2[0] , 0, ',', ' ').' '.$donnees2[1].' TTC' ; 
	                }else{
	                  echo "0";
	                }
                ?>
          
                <?php
                }
            $reponse->closeCursor();
         
        ?> </span></a></div>

	<div class="well well-small"><a id="myCart" href="#">Familles des articles</a></div>
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<li class="subMenu open"><a> SACS EN RAPHIA[230]</a>
			<ul>
				<?php
             
		            $sac = $pdo->query("SELECT * from famille where mere ='SAC EN RAPHIA'");
		             while ($res = $sac->fetch())
		                {
		                ?>
		                <li><a class="active" href="list_filter.php?filtre=<?=$res['nom']?>"><i class="icon-chevron-right"></i><?php echo explode('/',$res['nom'])[1]; ?></a></li>
		                <?php
		                }
		            $reponse->closeCursor();
         
        		?>
			</ul>
		</li>
		<li class="subMenu"><a> CABAS EN RAPHIA [840] </a>
			<ul style="display:none">

				<?php
	             
			            $cabas = $pdo->query("SELECT * from famille where mere ='CABAS EN RAPHIA'");
			             while ($res1 = $cabas->fetch())
			                {
			                ?>
			                <li><a class="active" href="list_filter.php?filtre=<?=$res1['nom']?>"><i class="icon-chevron-right"></i><?php echo explode('/',$res1['nom'])[1]; ?></a></li>
			                <?php
			                }
			            $cabas->closeCursor();
	         
	        		?>													
			</ul>
		</li>
		<li class="subMenu"><a>ACCESSOIRES[1000]</a>
			<ul style="display:none">
				<?php
             
		            $accessoir = $pdo->query("SELECT * from famille where mere ='ACCESSOIRES'");
		             while ($res2 = $accessoir->fetch())
		                {
		                ?>
		                <li><a class="active" href="list_filter.php?filtre=<?=$res2['nom']?>"><i class="icon-chevron-right"></i><?php echo explode('/',$res2['nom'])[1]; ?></a></li>
		                <?php
		                }
		            $accessoir->closeCursor();
         
        		?>											
		</ul>
		</li>
		<li class="subMenu"><a >DECORATIONS[18]</a>
			<ul style="display:none">
				<?php
             
		            $deco = $pdo->query("SELECT * from famille where mere like '%DECORATIONS%'");
		             while ($res3 = $deco->fetch())
		                {
		                ?>
		                <li><a class="active" href="list_filter.php?filtre=<?=$res3['nom']?>"><i class="icon-chevron-right"></i><?php echo explode('/',$res3['nom'])[1]; ?></a></li>
		                <?php
		                }
		            $deco->closeCursor();
         
        		?>											
			</ul>
		</li>
		
		<li class="subMenu"><a >AUTRES[18]</a>
			<ul style="display:none">
				<?php
             
		            $deco = $pdo->query("SELECT * from famille where mere like '%AUTRES%'");
		             while ($res3 = $deco->fetch())
		                {
		                ?>
		                <li><a class="active" href="list_filter.php?filtre=<?=$res3['nom']?>"><i class="icon-chevron-right"></i><?php echo explode('/',$res3['nom'])[1]; ?></a></li>
		                <?php
		                }
		            $deco->closeCursor();
         
        		?>											
			</ul>
		</li>

	</ul>
	<br/>
		<div class="thumbnail">
			<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
			<div class="caption">
			  <h5>Mode de paiement</h5>
			</div>
		  </div>
</div>
<!--============================================= -->
<style type="text/css" id="enject">
.well-small{
	background-color: #3CB9C6;
}
</style>
	
