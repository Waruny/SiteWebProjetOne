<?php 
include "includes/session.php";
include "config/database.php";
$db = $pdo->open(); 
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/private.css">
    <link rel="stylesheet" href="css/shopping-cart.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/search-form.css">
    <link rel="icon" type="image/png" href="img/logoIcon.png" />
	<title>Accueil Projet One</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  
<body>
    <header>
        <?php include 'includes/navigation.php'; ?>
    </header>

    <div class="wrapper">	 
        <div class="content-wrapper">
        <div class="container">

            <section class="content">
            <div>
                <div>
                    <h1 class="page-header">VOTRE PANIER</h1>
                    <div>
                        <div>
                        <table class="show-cart table">
                            
						</table>
						<div>Coût total: <span class="total-cart"></span>€</div>
                        </div>
                    </div>
        			<button type="button" class="btn btn-primary">Commander</button>
                </div>
            </div>
            </section>
        </div>
        </div>
        <?php $pdo->close(); ?>
    </div>
<?php include 'includes/footer.php';?>
<script src="script/main.js"></script>
</body>
</html>