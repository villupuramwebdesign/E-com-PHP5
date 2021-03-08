<?php
   
  include_once "../entities/produit.php";
  include_once "../core/produitC.php";
  include_once "../core/commandeC.php";
  include_once "../entities/commande.php";

  include_once "../core/clientC.php";
  include_once "../entities/clients.php";
  require ('pdf/fpdf.php');


session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
  

  $produitC=new produitC();
  $produit1=$produitC->recupererpanier($_SESSION['id']);
  
  $tab=array();
  $somme=0;

  foreach ($produit1 as $row) 
  {
    array_push($tab,$row['prix']*$row['quantite']);
    $somme+=$row['prix']*$row['quantite'];
  }
  
  if(isset($_POST['validercommande']) && !empty($_POST['secteur']) )
  {
    $secteur=$_POST['secteur'];
    $dateactuelle = date("Y-m-d");

    $commande1C=new commandeC();
    $commande1= new commande($dateactuelle,$somme,'en cours',$secteur,5,$_SESSION['id']);
    $commande1C->ajoutercommande($commande1);

    $lastID=$commande1C->recupererdernierID();
    $max=$lastID->fetch();
    $max_row=$max["max"];
    

    $clientC=new clientC();
    $client1=$clientC->recupererclient($_SESSION['id']);
    $client=$client1->fetch();
    $mail=$client["Email"];
   

    //$clientC->mailcommande($mail,$somme,$dateactuelle);

    $produit1=$produitC->recupererpanier($_SESSION['id']);
    
    foreach($produit1 as $row)
    {
      $produit2=new produit($row["id"],$row["nom"],$row["prix"],$row["quantite"],"Test");
      $produitC->ajoutercontenupanier($produit2,$max_row,$_SESSION['id']);
    }
     header('Location: testpdf.php');;
  } 
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

<!-- //header-bot -->



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

	</div>
</div>

<div class="checkout">
	<div class="container">
		<div>
			
				                <?PHP
									$produit2C=new produitC();
									$panier=$produit2C->recupererpanier($_SESSION['id']);

									?>
						
						
				<table class="timetable_sub">
				
				        <tr>
						
						<th>Nom du produit</th>
						<th>Image du produit</th>
						<th>Prix</th>
						<th>Quantite</th>
						<th>Total produit</th>
						</tr>

						<?PHP
						foreach($panier as $row)
						{
						  $id=$row['id'];
						  $chemin="images/produit".$id.".png"
						  ?>
						  <tr>
						  
						  <td><?PHP echo $row['nom']; ?></td>
						  <td><img  height="180px" width="160px" src="<?php echo $chemin; ?> ">
						  <td><?PHP echo $row['prix']; ?> DT</td>
						  <td><?PHP echo $row['quantite']; ?></td>
						  <td><?PHP echo $row['prix']*$row['quantite']?> DT</td>
						  </tr>
						  <?PHP
						}
						?>
				
				</table>
				</br></br>
				<center><p> Total de la commande : <?php echo $somme." DT"; ?> </p> </center>
	            <center><p> TTC : <?php echo ($somme*1.18)." DT"; ?></p></center>
	            <center> Date : <?php $date = new DateTime(); echo $date->format('Y-m-d H:i:s');?> </p></center><p>
	            <center><p>Veuillez choisir un secteur de livraison</p> </center>
	            
	            <form method="POST" action="commande.php">
	              <center>
                <select name="secteur">
                  <option value="Ariana">
                    Ariana
                  </option>
                  <option value="Ghazela">
                    Ghazela
                  </option>
                  <option value="Le Bardo">
                    Le Bardo
                  </option>
                  <option value="El Manar">
                    El Manar
                  </option>
                  <option value="El Menzah">
                    El Menzah
                  </option>
                </select>
              </center>
            </br></br></br>
         
	        <form method="POST" action="commande.php">
                
                <center><a class="item_add single-item hvr-outline-out button2"><input class="item_add single-item hvr-outline-out button2" type="submit" name="validercommande"  value="Valider"> </center></a>
            </form>
            </form>
             
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="panier.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour </a>
				</div>
				
			
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
