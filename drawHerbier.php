<?php
session_start();
$token=uniqid();
$_SESSION["token"]=$token;
$title= "Visualisation de l'herbier";
include "header.php";
//$nombre = filter_input(INPUT_GET,"d");
$nombre="0/1/3/9/8/1/2/3/6";
$nombre = explode('/',$nombre);
$largeur1 = 3;
$largeur2 = 3;
$largeur3 = 30;



function creerTableaucouleur($nombrecase,$largeurtableau){

    $index=[];
    //création d'un tableau index permettant de savoir si on doit placer un bloc ou pas
    for ($i=0;$i<$nombrecase;$i++){
        do{ $rand=rand(0,$largeurtableau*$largeurtableau-1);}
        while(in_array($rand,$index));
        $index[]=$rand;
    }
    ?>

    <tbody>
        <tr>
            <?php
            for ($i=0;$i<$largeurtableau*$largeurtableau;$i++){
                if ($i%$largeurtableau==0 && $i!=0) echo "</tr><tr>";
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
    <h2>Level 1</h2>
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
                    if($i%$largeur2==0 && $i!=0) echo "</tr><tr>";
                    echo "<td><table class='petitTableau'>";
                    creerTableaucouleur($nombre[$i],$largeur2);
                    echo "</table></td>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <h2>Level 3</h2>
    <table class="bordure">
        <?php
            creerTableaucouleur(30,$largeur3);
        ?>
    </table>

</div>

<?php
include "footer.php";
?>
