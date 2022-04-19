<?php

session_start();
if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
    die("vilain pirate");
}
else
    $_SESSION["token"]=uniqid();

$id = filter_input(INPUT_POST, "id");
$dateReleve = filter_input(INPUT_POST, "DateReleve");
$lieu = filter_input(INPUT_POST, "Lieu");
$releve = filter_input(INPUT_POST, "Releve");

include_once "../config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$pdo->prepare("UPDATE releve SET  DateReleve=:Date, Lieu=:Lieu, Releve=:Releve  WHERE id=:id");
$req->bindParam(":id", $id);
$req->bindParam(":Date", $dateReleve);
$req->bindParam(":Lieu", $lieu);
$req->bindParam(":Releve", $releve);

$req->execute();

header("location: ../index.php");
