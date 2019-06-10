<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: php/login.php");
    exit;
}

include "config/database.php";

$db = $pdo->open();
?>

<!DOCTYPE html>
<html lang="fr">
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/private.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/search-form.css">
    <link rel="icon" type="image/png" href="img/logoIcon.png" />
    <title>Accueil Projet One</title> 
  </head>
  <body>
    <header>
        <?php include 'includes/navigation.php'; ?>
    </header>
    <div class="space"></div>
      <section id="promos">
        <h1>Promotions</h1>
          <?php 
            $reponse = $db->query('SELECT * FROM produits ORDER BY date_produit ASC limit 3');
            while($donnees = $reponse->fetch()){
            ?>
            <div class="product">
              <img src="<?php echo $donnees["image_produit"] ?>" alt="produits">           
              <?php echo "<a href='produit.php?produit=".$donnees['produit_slug']."'>".$donnees['nom_produit']."</a>"; ?>
              <span class="product-price"><?php echo $donnees["prix_produit"]; ?>€</span>
              <button class="ajout-panier" >
            </div>
          <?php } 
            $reponse->closeCursor();
          ?>
      </section>
      <div class="space"></div>

      <section id="new">
        <h1>Nouveautés</h1>
          <?php
            $reponse2 = $db->query('SELECT * FROM produits ORDER BY date_produit DESC limit 2');
            while($donnees = $reponse2->fetch()){
            ?>
            <div class="new-product">
              <img src="<?php echo $donnees["image_produit"] ?>" alt="produits">           
              <?php echo "<a href='produit.php?produit=".$donnees['produit_slug']."'>".$donnees['nom_produit']."</a>"; ?>
              <span class="product-price"><?php echo $donnees["prix_produit"]; ?>€</span>
            </div>
          <?php } 
            $reponse2->closeCursor();
          ?>
      </section>
      <div class="space"></div>
    
  <?php include 'includes/footer.php';?>
  <script src="script/main.js"></script>
  </body>

</html> 