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
                  <a href="#">
                    <i class="fas fa-cart-plus"> Ajouter au panier</i>
                  </a>
                </button>
            </div>
          </div>
        </div>
      </section>
  <?php include_once 'includes/footer.php';?> 
  </body>

</html> 