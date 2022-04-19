<?php
session_start();
$token=uniqid();
$_SESSION["token"]=$token;
$title= "Visualisation de l'herbier";
include "header.php";

//récupération des chiffres de la relevé
$nombre = filter_input(INPUT_GET,"d");
$nombre = explode('/',$nombre);

//Définition des variables globales
$largeur1 = 3;
$largeurGrandTab2 = 3;
$largeurPetitTab2 = 3;
$largeurGrandTab3 = 30;
$largeurPetitTab3 = 3;
$nombreIterationRestante=["100","100","100","100","100","100","100","100","100"];


//retourne un tableau colorie fonction du nombre de case a colorier et de la largeur du tableau
function creerTableaucouleur($nombreCase, $largeurTab){

    $index=[];
    //création d'un tableau index permettant de savoir si on doit placer un bloc ou pas
    for ($i=0;$i<$nombreCase;$i++){
        do{
            $rand=rand(0,$largeurTab*$largeurTab-1);
        } while(in_array($rand,$index));
        $index[]=$rand;
    }
    ?>

    <tbody>
        <tr>
            <?php
            //On teste a travers le tableau d'index si la position est colorié ou non
            for ($i=0; $i<$largeurTab*$largeurTab; $i++){
                if ($i%$largeurTab==0 && $i!=0) echo "</tr><tr>";
                if (in_array($i,$index)) echo "<td class = 'vert'></td>";
                else echo "<td></td>";
            }
            ?>
        </tr>
    </tbody>

<?php }
?>
<div class="container">
    <h1>Visualisation de l'herbier</h1>
    <!---<h2>Level 1</h2>
    <table class="bordure">
        <tbody>
            <tr>
                <?php for ($i=0;$i<count($nombre);$i++){
                        if($i%$largeur1==0 && $i!=0) echo "</tr><tr>";
                        echo "<td>$nombre[$i]</td>";
                }?>
            </tr>
        </tbody>
    </table>
    <h2>Level 2</h2>
    <table class="bordure">
        <tbody>
            <tr>
                <?php
                for ($i=0;$i<count($nombre);$i++){
                    if($i%$largeurGrandTab2==0 && $i!=0) echo "</tr><tr>";
                    echo "<td><table class='petitTableau'>";
                    creerTableaucouleur($nombre[$i],$largeurPetitTab2);
                    echo "</table></td>";
                }
                ?>
            </tr>
        </tbody>
    </table>-->
    <h2>Level 3</h2>
    <table>
        <tbody>
            <tr>
                <?php
                    for ($i=0; $i<$largeurGrandTab3*$largeurGrandTab3; $i++){
                        if($i%$largeurGrandTab3==0 && $i!=0) echo "</tr><tr>";

                        //on tire un des chiffres du releve aléatoirement et il y a que 100 apparitions pour chaque chiffre
                        do{
                            $rand=rand(0,count($nombre)-1);
                        } while($nombreIterationRestante[$rand]==0);
                        $nombreIterationRestante[$rand]-=1;

                        echo "<td><table class='petitTableau'>";
                        creerTableaucouleur($nombre[$rand],$largeurPetitTab3);
                        echo "</table></td>";
                    }
                ?>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-sm btn-primary" href="index.php">Retour</a>
</div>
<?php
include "footer.php";
?>
