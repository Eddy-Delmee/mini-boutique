<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
$sql = "CREATE DATABASE IF NOT EXISTS `mini-shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=mini-shop;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    //Création de la table categories
    $req1 = "CREATE TABLE IF NOT EXISTS `mini-shop`.`category`(
    `idCategory` INT NOT NULL AUTO_INCREMENT,
    `nameCategory` VARCHAR(50),


    PRIMARY KEY(idCategory));";
 $pdo->exec($req1);

 //Création de la table produits
 $req2 = "CREATE TABLE IF NOT EXISTS `mini-shop`.`products` (
 `idProduct` INT NOT NULL AUTO_INCREMENT ,
 `nameProduit` VARCHAR(50) NOT NULL ,
 `price` DECIMAL(15,2) NOT NULL ,
 `image` VARCHAR(50) ,
 `description` TEXT ,
 `idCategory` INT ,
 PRIMARY KEY (`idProduct`) , FOREIGN KEY(idCategory) REFERENCES `category` (`idCategory`)
);";
 $pdo->exec($req2);
 echo 'Félicitations, les tables ont bien été créées !';

}
 catch (PDOException $e){
 print "Erreur !: " . $e->getMessage() . "<br/>";
 die();
}