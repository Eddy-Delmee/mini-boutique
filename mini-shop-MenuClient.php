<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=mini-shop;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req2 = $pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory");
$req2->execute();
$products = $req2->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>



<body>

    <header>
        <section>
            <h1>
                SHOP-OP
            </h1>
            <p>
                Your products at low prices
            </p>
        </section>
    </header>


    
    <h1>THE MARKET</h1>

    <!-- J'affiche mes données -->
    <table class="table">
        <?php
        // var_dump($resultat);
        foreach ($products as $value) { ?>
            <tr>
                <td><?= $value['nameProduit'] ?></td>
                <td><?= $value['price'] ?></td>
                <td><?= $value['nameCategory'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><img src="uploads/<?= $value['image'] ?>" style="width:50px"></td>
            </tr>
        <?php
        }
        ?>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>