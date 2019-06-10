<?php
include "config/database.php";

$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array(); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: php/login.php");
    exit;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/private.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/search-form.css">
    <link rel="icon" type="image/png" href="img/logoIcon.png" />
    <title><?php echo isset($page_title) ? $page_title : "Projet One"; ?></title> 
  </head>
  <body>
    <header>
        <?php include 'navigation.php'; ?>
    </header>