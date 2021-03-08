<?php
include "../entities/produit.php";
include "../core/produitC.php";
include_once "../core/commandeC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
  $produit=new produitC;
  $count=$produit->countpanier($_SESSION['id']);
?> 

<!DOCTYPE html>
<html>

<head>
	<title>Madame Zarrouk | Panier</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../views/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart -->
		<script src="js/simpleCart.min.js"></script>
	<!-- cart -->
	<!-- for bootstrap working -->
		<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	<script src="js/jquery.easing.min.js"></script>
</head>

<body>




<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
	             <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class=" menu__item"><a class="menu__link" href="produit.php">Produits</a></li>
					
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="panier.php">
					     <?php
					          $produit=new produitC;
					          $count=$produit->countpanier($_SESSION['id']);
					          foreach($count as $row)
					            {
					              echo '<div>'.$row["cnt"].'</div>';
					            }
                         ?>
						<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
				</a>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	

<div class="checkout">


	<div class="container">
		<div>
			
				<?php
				    $c=intval($row["cnt"]);
				    if($c==0)
				     {
				?>
				        
			        <div class="cart_empty_msg">
			        <h2>Panier vide</h2>
			        </div>
			    <?php  
				     }
				?>

				
				<?php
				
				if($c!=0)
			    {
			    ?>
			    
			    <?PHP
				$produit=new produitC();
				$listeproduits=$produit->afficherproduits();

				?>
				<table class="timetable_sub">
					
				
				<thead>
					<tr>
						
						
						<th>Nom du produit</th>
					
						<th>Image du produit</th>
						
						<th>Prix</th>
						
						<th>Quantite</th>
					

						<th>Supprimer</th>

					</tr>
				</thead>

<?PHP
foreach($listeproduits as $row){
  $id=$row['id'];
  $chemin="images/produit".$id.".png"
  ?>
  <tr>


  <td><?PHP echo $row['nom']; ?></td>
  <td><img  height="180px" width="160px" src="<?php echo $chemin; ?> ">
  <td><?PHP echo $row['prix']; ?> DT</td>  
  <td>
    <form method="POST" action="modifierproduit.php">
    	<input type="number" min="1" required="required" value="<?PHP echo $row['quantite']; ?>" name="quantite">
        <button name="Modifier" ><img src="images/valider1.png"></button>
        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
    </form> 


  </td>

   <td>
 
  <form method="POST" action="supprimerproduit.php">
        <button name="supprimer" ><img src="images/Corbeille.png"></button>
        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
  </form> 

  </td>

  </tr>
  <?PHP
}
?>
				</table>

				
<?php
}
?>

		
		
<div class="checkout-left">	
		
		<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
			<a href="produit.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour </a>
		</div>
				<form method="POST" action="commande.php">
					<center><a class="item_add single-item hvr-outline-out button2"><input type="submit" class="item_add single-item hvr-outline-out button2" name="valider" value="Passer une commande"></a></center>
			    </form>
			    
			    </br>
				</br>

				<form method="POST" action="listecommande.php">
					<center>
						<a class="item_add single-item hvr-outline-out button2"><input type="submit" class="item_add single-item hvr-outline-out button2" name="contenur" value="Historique"></a>
					</center>
					<center>
						<button><img src="images/not.png">  <?php
				          $c=new commandeC;
				          $count=$c->notification($_SESSION['id']);
				          foreach($count as $row)
				            {
				              echo '<div>'.$row["cnt"].'</div>';
				            }
				          ?></button>
					</center>

					 
		        </form> 

      
</div>
			
			
	</div>
</div>	
<!-- //check out -->
<!-- //product-nav -->



</body>
</html>
<?php
}
?>
