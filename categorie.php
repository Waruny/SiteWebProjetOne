<?php
  include "config/database.php";
  $slug = $_GET['categorie'];
  $db = $pdo->open();

	try{
		$stmt = $db->prepare("SELECT * FROM categoriesproduit WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
    $catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "Il y a un problème avec la connexion: " . $e->getMessage();
	}

	$pdo->close();

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
    <link rel="stylesheet" href="css/categorie.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/png" href="img/logoIcon.png" />
    <title>Projet One</title>
  </head>

  <header>
      <?php include 'includes/navigation.php'; ?>
  </header>
  <body>
    <div class="wrapper">
      <section id="contenu">
        <div class="row">
          <div>
              <h1 class="titre-categorie"><?php echo $cat['nom_categorie']; ?></h1>
            <?php
              
              $db = $pdo->open();

              try{
                $inc = 3;	
              $stmt = $db->prepare("SELECT * FROM produits WHERE id_categorie = :catid");
              $stmt->execute(['catid' => $catid]);
              foreach ($stmt as $row) {
                $image = (!empty($row['image_produit'])) ? $row['image_produit'] : 'img/noimage.jpg';
                $inc = ($inc == 3) ? 1 : $inc + 1;
                  if($inc == 1) echo "<div class='row'>";
                  echo "

                      <div class='vignette_prod'>
                        <div class='top-vignette'>
                          <img src='".$image."' width='20%' height='230px' class='thumbnail'>
                          <h5><a href='produit.php?produit=".$row['produit_slug']."'>".$row['nom_produit']."</a></h5>
                        </div>
                        <div class='box-footer'>
                          <b>".number_format($row['prix_produit'], 2)." €</b>
                        </div>
                  ";
                  if($inc == 3) echo "</div>";
              }
              if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
            if($inc == 2) echo "<div class='col-sm-4'></div></div>";
          }
          catch(PDOException $e){
            echo "Il y a un problème avec la connexion: " . $e->getMessage();
          }

          $pdo->close();

            ?> 
          </div>
        </div>
      </section>
    </div>
  <?php include 'includes/footer.php'; ?>          
  </body>
</html>