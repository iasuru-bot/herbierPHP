<?php

$id = filter_input(INPUT_GET,"id");
include_once "../config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$req=$pdo->prepare("delete from releve  WHERE id=:id");
$req->bindParam(":id", $id);

$req->execute();

header("location: ../index.php");