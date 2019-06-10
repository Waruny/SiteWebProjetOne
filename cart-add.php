<?php
	include 'includes/session.php';

	$db = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$quantite = $_POST['quantite'];

	if(isset($_SESSION['user'])){
		$stmt = $db->prepare("SELECT *, COUNT(*) AS numrows FROM lignecommande WHERE user_id=:user_id AND produit_id=:produit_id");
		$stmt->execute(['utilisateur_id'=>$user['id'], 'produit_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $db->prepare("INSERT INTO lignecommande (utilisateur_id, produit_id, quantite_ligne) VALUES (:utilisateur_id, :produit_id, :quantite_ligne)");
				$stmt->execute(['utilisateur_id'=>$user['id'], 'produit_id'=>$id, 'quantite_ligne'=>$quantity]);
				$output['message'] = 'Produit ajouté au panier';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Produit déjà dans le panier';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['produit_id']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Produit déjà dans le panier';
		}
		else{
			$data['produit_id'] = $id;
			$data['quantite'] = $quantite;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Produit ajouté au panier';
			}
			else{
				$output['error'] = true;
				$output['message'] = "Impossible d'ajouter le produit au panier";
			}
		}

	}

	$pdo->close();
	echo json_encode($output);

?>