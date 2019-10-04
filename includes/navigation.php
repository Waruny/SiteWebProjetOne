<div class="barre">
      <div class="marque">
        <a href="index.php">
          <img src="img/logo_TRUBL_v2.1.png" alt="Logo TRUBL" id="logo">
        </a>
      </div>
      <nav class="navbar">   
        <ul>
        <div class="dropdown">
          <li><a href="#">Catégorie</a>
          <div class="dropdown-content">
            <ul>
                <?php

                try{
                  $stmt = $db->prepare("SELECT * FROM categoriesproduit");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='categorie.php?categorie=".$row['cat_slug']."'>".$row['nom_categorie']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "Il y a un problème avec la connection: " . $e->getMessage();
                }

              ?>
            </ul>
          </div>
        </div>

          <div class="dropdown">
            <li><a href="#">Contact</a>
            <div class="dropdown-content">
              <ul>
                <li><a href="html/adresse.html">Nous trouver</a></li>
                <li><a href="formulaire.php">Formulaire de contact</a></li>
              </ul>
            </div>
          </div>
          </li>

          <div class="dropdown">
            <li><a href="#">Mon compte</a></li>
            <div class="dropdown-content">
              <ul>
                <li><a href="#">Mes commandes</a></li>
                <li><a href="php/reset_password.php">Changer de mot de passe</a></li>
                <li><a href="php/logout.php">Déconnexion</a></li>
              </ul>
            </div>
          </div>
          </li> 
        </ul>
      </nav>

      <!--Bouton rechercher-->
      
      <?php include_once 'php/search-form.php';?>
      <a href="shopping-cart.php" class="shopping" data-toggle="modal"><span class="total-count" style="font-size:11px; color:#159DFF;"></span><i class="fas fa-shopping-cart" data-toggle="modal" style="font-size:2rem"></i></a>
      <button class="clear-cart btn btn-danger">Clear Cart</button>
    