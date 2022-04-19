<?php
session_start();

$token=uniqid();
$_SESSION["token"]=$token;

$title="Herbiers";
include "header.php";
include_once "config.php";

$id = filter_input(INPUT_GET,"id");

$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD,Config::UTILISATEUR,Config::MOTDEPASSE);

$req = $pdo->prepare("SELECT * FROM releve WHERE id=:id");
$req->bindParam(":id",$id);

$req->execute();

$lignes = $req->fetchAll();
if (count($lignes)!=1){
    http_response_code(404);
    die;
}
foreach ($lignes as $l){?>
<div class="container">
    <h1> Modifier le relevé</h1>
    <form method="post" action="actions/UpdateReleve.php">
        Date : <input type="text" required name="DateReleve" maxlength="100" value="<?php echo htmlentities($l["DateReleve"])?>">
        <br>
        Lieu : <textarea cols="80" rows="5" name="Lieu" ><?php echo htmlentities($l["Lieu"])?></textarea>
        <br>
        Relevé : <textarea cols="80" rows="5" name="Releve" ><?php echo htmlentities($l["Releve"])?></textarea>
        <input type="submit" value="OK"/>
        <input type="hidden" name="token" value="<?php echo $token?>">
        <input type="hidden" name="id" value="<?php echo $id?>">
    </form>
</div>
<?php }
include "footer.php";
?>



