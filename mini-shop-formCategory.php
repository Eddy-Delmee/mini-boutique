<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=mini-shop;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
if ($_POST) {
    $nameCategory = $_POST['nameCategory'];

     var_dump($_POST);

    if ($nameCategory != "") {
        $req1 = $pdo->prepare("
 INSERT INTO category(nameCategory)
 VALUES (:nameCategory)
 ");

        $req1->execute(array(
            ':nameCategory' => $nameCategory
        ));
    }
}
header('location:mini-shop-MenuAdmin.php');
