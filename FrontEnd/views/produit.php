<?php
include "../entities/produit.php";
include "../core/produitC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
if(isset($_POST['ajouterproduit1']) && (isset ($_POST['q1'])))
{ 
  $q1=$_POST['q1'];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(1);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>";
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>";
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
  
}


if(isset($_POST['ajouterproduit2']) &&(isset ($_POST['q2'])))
{
  $q1=$_POST['q2'];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(2);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>"; 
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>"; 
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
  
}


if(isset($_POST['ajouterproduit3']) &&(isset ($_POST['q3'])))
{
 $q1=$_POST['q3'];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(3);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>"; 
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>";
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}



if(isset($_POST['ajouterwishlist1']))
{ 
  
 
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(1);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}

if(isset($_POST['ajouterwishlist2']))
{ 
  
 
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(2);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}

if(isset($_POST['ajouterwishlist3']))
{ 
  
 
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(3);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Madame Zarrouk | Produits</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
<!-- header -->

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
					<li class=" menu__item"><a class="menu__link" href="#">Produits</a></li>
					
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
<!-- //banner-top -->
<!-- banner -->
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
			<div class="filter-price">
				<h3>Recherche par prix</h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
							<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - DT" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
					 <!---->
			</div>
			<div class="css-treeview">
				<h4>Favoris</h4>
				<ul class="tree-list-pad">
					<?PHP
					$produit1C=new produitC();
					$listeproduits=$produit1C->recupererwishlist($_SESSION['id']);

					?>
				
					<?PHP
					foreach($listeproduits as $row)
					{
					    $id=$row['id'];
                        $chemin="images/produit".$id.".png"
				    ?>
					  <center>
					   <img  height="180px" width="160px" src="<?php echo $chemin; ?> ">
					   <p><?PHP echo $row['nom']; ?> </p>
					   <p><?PHP echo $row['prix']; ?> DT</p>
					   <br>

					    	

					    <form method="POST" action="transfererpanier.php">
					        <button name="transferer" ><img src="images/transfer.png"></button>
					        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
		                </form> 
		                <br>

		                <form method="POST" action="supprimerwishlist.php">
					        <button name="supprimer" ><img src="images/Corbeille.png"></button>
					        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
		                </form> 


					  </center>
					  
					  <?PHP
					}
					?>
					
					
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Produits</h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Trier par</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Defaut</option>
						<option value="null">Nom(A - Z)</option> 
						<option value="null">Nom(Z - A)</option>
						<option value="null">Prix(High - Low)</option>
						<option value="null">Prix(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>

				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/guitare1.jpg" alt="" class="pro-image-front">
							<img src="images/guitare1.jpg" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="#" class="link-product-add-cart">Apercu</a>
											</div>
										</div>
										<span class="product-new-top">Nouveau</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="#">Guitare</a></h4>
									<div class="info-product-price">
										<span class="item_price">120 DT</span>
									</div>
									
									<form method="POST">
							        </br>Quantite :<input min="1" required="required" type="number" name="q1"></br>
								        </br><button  name="ajouterproduit1" ><img src="images/transfer.png"></button></br> 
					                </form> 
									<form method="POST"> 
								        </br><button name="ajouterwishlist1"><img src="images/add.png"></button></br>
					                </form>   												                 							
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/orgue-piano.png" alt="" class="pro-image-front">
							<img src="images/orgue-piano.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">apercu</a>
											</div>
										</div>
										<span class="product-new-top">nouveau</span>
										
						</div>
						

						<div class="item-info-product ">
									<h4><a href="single.html">Piano</a></h4>
									<div class="info-product-price">
										<span class="item_price">560 DT</span>
									</div>	
						           
									<form method="POST">
							        </br>Quantite :<input min="1" required="required" type="number" name="q2"></br>
								        </br><button  name="ajouterproduit2" ><img src="images/transfer.png"></button></br>  
					                </form> 	
					                <form method="POST"> 
								        </br><button  name="ajouterwishlist2"><img src="images/add.png"></button></br>
					                </form> 				
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/piano1.jpg" alt="" class="pro-image-front">
							<img src="images/piano1.jpg" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="#" class="link-product-add-cart">apercu</a>
											</div>
										</div>
										<span class="product-new-top">nouveau</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="#">Piano</a></h4>
									<div class="info-product-price">
										<span class="item_price">850 DT</span>
										<del>950 dt</del>
									</div>
									
									
									<form method="POST">
							        </br>Quantite :<input min="1" required="required" type="number" name="q3"></br>
								        </br><button name="ajouterproduit3" ><img src="images/transfer.png"></button></br>  
					                </form> 

									<form method="POST">
								        </br><button  name="ajouterwishlist3"><img src="images/add.png"></button></br>
					                </form> 					
						</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>	
<!-- //mens -->
<!-- //product-nav -->

</body>
</html>
<?php
}
?>
