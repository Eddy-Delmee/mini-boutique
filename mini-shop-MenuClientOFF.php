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

    <!-- font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">

    <!-- css -->

    <link rel="stylesheet" href="resource/css/style.css">

</head>



<body class="body1">

    <header>
        <section class="header">
            <h1>
                SHOP-OP
            </h1>
            <p>
                Your products at low prices
            </p>
            <h2>
                THE MARKET
            </h2>
        </section>
    </header>

    <main>
        <div class="market">
            <div class="innkeeper">
                <img src="" alt="">
            </div>
            
        </div>
        <div class="d-flex flex-row-reverse">
            <div class="slate">
                <div>
                    <button type="button" class="btn btn-warning" name="cible" value="masquer"><a href="http://localhost/mini-boutique/mini-shop-MenuClient.php">Table Off</a></button>
                </div>
            </div>
        </div>

    </main>

    <footer class="lien">

        <div>
            <a href="http://localhost/mini-boutique/mini-shop-MenuAdminOFF.php">
                <div class="shopVide"></div>
            </a>
        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>