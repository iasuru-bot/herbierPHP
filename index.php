<?php
session_start();

$token=uniqid();
$_SESSION["token"]=$token;

$title="Herbiers";
include "header.php";
?>
    <h1>Relevés</h1>
    <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Lieu</th>
            <th>Relevé</th>
            <th>Visualiser</th>
        </tr>
        <tr>
            <td>03/01/2022</td>
            <td>Roscanvel Z1</td>
            <td>3/4/2/7/6/8/5/6/3</td>
            <td><a target="_blank" class="btn btn-sm btn-primary" href="drawHerbier.php?">voir</a> <input type="submit" name="delete" value="Supprimer"></td>

        </tr>
        <tr>
            <td>04/01/2022</td>
            <td>Roscanvel Z2</td>
            <td>1/3/2/5/3/3/2/1/5</td>
            <td><a target="_blank" class="btn btn-sm btn-primary" href="drawHerbier.php?d=1/3/2/5/3/3/2/1/5">voir</a></td>
        </tr>
        <tr>
            <td>05/01/2022</td>
            <td>Morlaix P1</td>
            <td>5/7/8/9/7/6/8/9/8</td>
            <td><a target="_blank" class="btn btn-sm btn-primary" href="drawHerbier.php?d=5/7/8/9/7/6/8/9/8">voir</a></td>
        </tr>
        <tr>
            <td>07/01/2022</td>
            <td>Roscanvel Z1</td>
            <td>4/5/6/7/9/7/6/5/4</td>
            <td><a target="_blank" class="btn btn-sm btn-primary" href="drawHerbier.php?d=4/5/6/7/9/7/6/5/4">voir</a></td>
        </tr>
        <tr>
            <td>09/01/2022</td>
            <td>Camaret</td>
            <td>3/4/5/2/4/6/4/7/2</td>
            <td><a target="_blank" class="btn btn-sm btn-primary" href="drawHerbier.php?d=3/4/5/2/4/6/4/7/2">voir</a></td>
        </tr>
    </table>
    <hr>
    <form class="form">
        <h2>Ajouter un relevé</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="lieu" class="form-label">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" required>
                </div>
                <div class="mb-3">
                    <label for="donnees" class="form-label">Données</label>
                    <input type="text" class="form-control" id="donnees" name="donnees" required>
                </div>

                <input type="submit" class="btn btn-primary" value="OK">
            </div>
        </div>

    </form>
</div>

<?php
include "footer.php";