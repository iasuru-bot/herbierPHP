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
    <div>
        <h1> Modifier le relevé</h1>
        <div class="row">
            <div class="col-6">
                <form method="post" action="actions/UpdateReleve.php"">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="DateReleve" class="form-label">Date</label>
                                <input type="text" class="form-control" id="DateReleve" name="DateReleve" value="<?php echo htmlentities($l["DateReleve"])?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="Lieu" class="form-label">Lieu</label>
                                <textarea  class="form-control" id="Lieu" name="Lieu" required><?php echo htmlentities($l["Lieu"])?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="Releve" class="form-label">Releve</label>
                                <textarea  class="form-control" id="Releve" name="Releve" required><?php echo htmlentities($l["Releve"])?></textarea>
                            </div>

                            <input type="submit" class="btn btn-warning" value="Modifier">
                            <input type="hidden" name="token" value="<?php echo $token ?>">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php }
include "footer.php";
?>



