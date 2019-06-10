<?php
require('config.php');
 
try{
    if(isset($_REQUEST["term"])){
        $sql = "SELECT * FROM produits WHERE nom_produit LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        $stmt->bindParam(":term", $term);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p>" . $row["nom_produit"] . "</p>";
            }
        } else{
            echo "<p>Aucun résultat</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: N'a pas pu être effectué $sql. " . $e->getMessage());
}
 
unset($stmt);
 
unset($pdo);
?>