<?php
session_start();

$token=uniqid();
$_SESSION["token"]=$token;

$title="Herbiers";
include "header.php";
?>
<h1>Relevés</h1>
    <?php

    include_once "config.php";

?>
<div>
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Relevé</th>
            <th>Visualiser</th>
        </tr>

        <?php
            $pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
    $req = $pdo->prepare("select * from releve");
    $req->execute();
    $lignes = $req->fetchAll();
foreach ($lignes as $l) {
    ?>

        <tr>
            <td><?php echo htmlentities($l["id"]) ?></td>
            <td><?php echo htmlentities($l["DateReleve"]) ?></td>
            <td><?php echo htmlentities($l["Lieu"]) ?></td>
            <td><?php echo htmlentities($l["Releve"]) ?></td>
            <td><a class="btn btn-sm btn-primary" href="herbier_draw.php?d=<?php echo $l["Releve"] ?>">Voir</a>
            <a class="btn btn-sm btn-primary" href="./actions/supprimerListe.php?id=<?php echo $l["id"]?>">Supprimer</a>
            <a class="btn btn-sm btn-primary" href="update.php?id=<?php echo $l["id"]?>">Modifier</a></td>
        </tr>


    <?php
}
?>
    </table>
</div>
<h2>Ajouter un relevé</h2>
<div class="row">
    <div class="col-6">
        <form method="post" action="actions/creerListe.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="DateReleve" class="form-label">Date</label>
                        <input type="date" class="form-control" id="DateReleve" name="dateReleve" required>
                    </div>
                    <div class="mb-3">
                        <label for="Lieu" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="Lieu" name="lieu" required>
                    </div>
                    <div class="mb-3">
                        <label for="Releve" class="form-label">Releve</label>
                        <input type="text" class="form-control" id="Releve" name="releve" required>
                    </div>

                    <input type="submit" class="btn btn-primary" value="OK">
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>
    </div>
</div>
<?php
include "footer.php";