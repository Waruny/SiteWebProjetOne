<?php include "config/database.php"; ?>
<?php
	$db = $pdo->open();

	$slug = $_GET['produit'];

	try{
		 		
	    $stmt = $db->prepare("SELECT *, produits.nom_produit AS nomprod, categoriesproduit.nom_categorie AS nomcat, produits.id AS idprod, prix_produit, stock_produit, image_produit FROM produits 
                                LEFT JOIN categoriesproduit ON categoriesproduit.id=produits.id_categorie WHERE produit_slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $produit = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

?>

<!DOCTYPE html>
<html lang="fr">
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/private.css">
    <link rel="stylesheet" href="css/ficheProduit.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/search-form.css">
    <link rel="icon" type="image/png" href="img/logoIcon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Projet One</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
  </head>


  <body>
    <header>
    <?php include 'includes/navigation.php'; ?>

      <!--Bouton rechercher-->
      
      <?php include_once 'php/search-form.php';?>
      </header>

      <section id="ficheProd">
        <div id="produit">
        <img src="<?php echo $produit["image_produit"] ?>" alt="produits"> 
          
          <div id="texteProd">
            <h1><?php echo $produit['nomprod']; ?></h1>
            <p><?php echo $produit['descriptif']; ?></p>

            <div id="price">
              <p><span class="prix"><?php echo $produit['prix_produit']; ?> €</span><br/>
              <strong><span class="piece"><?php echo $produit['stock_produit']; ?></strong> pièces disponibles</span><p>
              <label>Quantité :</label><input type="number" name="howmuch" value="1" min="0">
                <button class="ajoutPanier" type = "submit">
                  <a href="#" data-name="<?php echo $produit['nomprod']; ?>" data-price="<?php echo $produit['prix_produit']; ?>" class="add-to-cart fas fa-cart-plus"> Ajouter au panier</a>
                </button>
            </div>
          </div>
        </div>
      </section>

      <!-- Nav -->
<!--<nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
    <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button></div>
    </div>
</nav>-->

  
 <!-- Modal 
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="show-cart table">
          
        </table>
        <div>Total price: $<span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Order now</button>
      </div>
    </div>
  </div>
</div> 
-->



  <?php include_once 'includes/footer.php';?> 
  <script src="script/main.js"></script>
  </body>

</html> 