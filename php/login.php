<?php
include '../includes/session.php';
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}
 
require_once "../config/database.php";

$db = $pdo->open();
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Veuillez entrer votre identifiant";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer votre mot de passe";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM utilisateurs WHERE username = :username";
        
        if($stmt = $db->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            session_start();
    
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: ../index.php");
                        } else{
                            $password_err = "Le mot de passe est invalide";
                        }
                    }
                } else{
                    $username_err = "Aucun compte n'existe avec cet identifiant";
                }
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/logoIcon.png" />
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<header>
    <a href="../index.html">
        <img src="../img/logo_TRUBL_v2.1.png" alt="Logo TRUBL" id="logo">
    </a>
    <h1> Bienvenue sur le site de la centrale d'achat TRUBL <h1>
</header>
<body>
    <div class="wrapper">
        <h2>Identifiez-vous</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Identifiant</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Connexion">
            </div>
            <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a>.</p>
        </form>
    </div>
</body>
</html>