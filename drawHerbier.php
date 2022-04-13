<?php
session_start();
$token=uniqid();
$_SESSION["token"]=$token;
$title= "Visualisation de l'herbier";
include "header.php";
//$nombre = filter_input(INPUT_GET,"d");
$nombre="0/0/3/9/8/1/2/3/6";
$nombre = explode('/',$nombre);
$largeur1 = 3;



function creerTableaucouleur($nombrecase,$largeurtableau,$hauteurtableau){

}
?>
<div class="container">
    <h1>Visualisation de l'herbier</h1>
    <h2>Level 1</h2>
    <table class="bordure">
        <tbody>
            <tr>
                <?php for ($i=0;$i<count($nombre);$i++){
                        if($i%$largeur1==0) echo "<tr></tr>";
                        echo "<td>$nombre[$i]</td>";
                }?>
            </tr>
        </tbody>
    </table>
    <h2>Level 2</h2>
    <table>
        <tbody>
            <tr>
                <?php
                for ($i=0;$i<count($nombre);$i++){
                    if($i%3==0) echo "<tr></tr>";
                    echo "<table class='petitTableau'>";
                    creerTableaucouleur($nombre[$i],3,3);
                }
                ?>
            </tr>
        </tbody>
    </table>
    <h2>Level 3</h2>
</div>

<?php
include "footer.php";
?>
