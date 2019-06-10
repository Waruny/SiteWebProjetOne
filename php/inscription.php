<?php
require_once "../config/database.php";
$db = $pdo->open();
 
$username = $password = $confirm_password = $mail = "";
$username_err = $password_err = $confirm_password_err = $mail_err =  "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Entrer un identifiant";
    } else{
        $sql = "SELECT id FROM utilisateurs WHERE username = :username";
        
        if($stmt = $db->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Cet identifiant est déjà pris";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Une erreure est survenue, veuillez réessayer plus tard.";
            }
        }
        unset($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer un mot de passe";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Le mot de passe doit contenir au moins 6 caractères";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Veuillez confirmer votre mot de passe";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Le mot de passe ne correspond pas";
        }
    }

    if(empty(trim($_POST["mail"]))){
        $mail_err = "Veuillez entrer une adresse mail";
    } else{
        $mail = trim($_POST["mail"]);
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($mail_err)){
        
        $sql = "INSERT INTO utilisateurs (username, password, mail) VALUES (:username, :password, :mail)";
         
        if($stmt = $db->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":mail", $param_mail, PDO::PARAM_STR);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_mail = $mail; 
            
            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Une erreure est survenue. Veuillez réessayer plus tard.";
            }
        }
         
        unset($stmt);
    }
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/logoIcon.png" />
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<header>
    <div class="franchise">
        <a href="../index.php" >Espace franchisés</a>
    </div>
    <div class="barre">
        <div class="marque">
            <a href ="../index.html">
                <img src="../img/logo_TRUBL_v2.1.png" alt="Logo TRUBL" id="logo">
            </a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="../html/qui_sommes-nous.html">Qui sommes-nous ?</a></li>
                <li><a href="../html/services.html">Nos produits</a></li>
                <li><a href="../html/franchise.html">Franchisés</a></li>
                <li><a href="../php/inscription.php">Nous rejoindre</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>    
    <div class="wrapper">
        <h2>Inscription</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Identifiant</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmation mot de passe</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Adresse mail</label>
                <input type="mail" name="mail" class="form-control" value="<?php echo $mail; ?>">
                <span class="help-block"><?php echo $mail_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Valider">
                <input type="reset" class="btn btn-default" value="Annuler">
            </div>
            <p>Vous avez déjà un compte ? <a href="login.php">Connectez-vous</a>.</p>
        </form>
    </div>    
</body>
</html>