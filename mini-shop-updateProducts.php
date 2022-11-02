<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=mini-shop;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);


$idProduct = $_GET['idProduct'];

$req1 = $pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory WHERE idProduct=$idProduct");
$req1->execute();
$product = $req1->fetch(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM category ");
$req2->execute();
$categories = $req2->fetchAll(PDO::FETCH_ASSOC);

// var_dump($product);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form enctype="multipart/form-data" action="mini-shop-updateformProduct.php" method="post">
        <input type=""hidden" name="idProduct" value="<?=$idProduct?>">
        <input type="text" name="nameProduit" placeholder="nameProduit" value="<?= $product['nameProduit'] ?>">
        <input type="text" name="price" placeholder="price" value="<?= $product['price'] ?>">
        <input type="text" name="description" placeholder="description" value="<?= $product['description'] ?>">

        <select name="idCategory">
        <option value="<?php echo $product['idCategory'] ?>"><?php echo $product['nameCategory'] ?></option>
            <?php
            foreach ($categories as $key => $value) { ?>
                <option value="<?php echo $value['idCategory'] ?>"><?php echo $value['nameCategory'] ?></option>
            <?php
            }
            ?>
        </select>

        <input type="file" name="image" placeholder="image" value="<?= $product['image'] ?>">
        <input type="submit" value="modify the product">
    </form>
</body>

</html>