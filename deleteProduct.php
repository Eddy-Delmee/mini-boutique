<h1>Suppression d'une donnée</h1>
<?php

$id = $_GET['idProduct'];

try {
$pdo = new PDO('mysql:host=localhost;dbname=mini-shop;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$sql = "DELETE FROM products WHERE idProduct=$id";
$sth = $pdo->prepare($sql);
$sth->execute();
$count = $sth->rowCount();
print('Effacement de ' . $count . ' entrées.');
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}

header('location:mini-shop-MenuAdmin.php');

?>