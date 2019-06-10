<?php
	include '../config/database.php';
	session_start();

	if(isset($_SESSION['user'])){
		$db = $pdo->open();

		try{
			$stmt = $db->prepare("SELECT * FROM utilisateurs WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "Il y a problème de connection : " . $e->getMessage();
		}

		$pdo->close();
	}
?>