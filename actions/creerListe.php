<?php

session_start();
if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
    die("vilain pirate");
}
else
    $_SESSION["token"]=uniqid();

$dateReleve = filter_input(INPUT_POST, "dateReleve");
$lieu = filter_input(INPUT_POST, "lieu");
$releve = filter_input(INPUT_POST, "releve");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$pdo->prepare("insert into releve (DateReleve, Lieu, Releve) values (:Date, :Lieu, :Releve)");
$req->bindParam(":Date", $dateReleve);
$req->bindParam(":Lieu", $lieu);
$req->bindParam(":Releve", $releve);

$req->execute();

$id=$pdo->lastInsertId();

header("location: ../index.php?id=$id");