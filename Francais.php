<?php
 SESSION_START();
$db= new PDO('mysql:host=localhost;dbname=fiala;','root','');
$Mat = "SELECT * FROM  matiere";
$Mat = $db->prepare($Mat);
// executer la requette
$Mat->execute();
// selectionnner la table  produit
$matcour = "SELECT matiere.id,matiere.nom,matiere.cour,matiere.exercice,matiere.corrige,categorie_matiere.nom AS categorie_matiere.nom FROM matiere JOIN categorie_matiere ON (matiere.categorie_matiere = id)";

$cour = $db->prepare($matcour);
 
$cour-> execute();
$Matiere = $cour->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUFIALA | FRANCAIS</title>
    <link href="assets/css/inscription.css" rel="stylesheet">
    <link href="assets/css/Francais.css" rel="stylesheet">
</head>
<body>


<div class ="container-nav">
        <div>
            <h1 class="logo"><a href="index.html">NUFIALA</a></h1>
        </div>

</div>  
    <div class="containersecond-nav">
        <div class="container-descriptions">
            <h2>BIENVENUE SUR  LA PAGE DU COURS DE FRANCAIS</h2>
        </div>
    </div>
    <div class="ctn-image">
    <img src="assets/img/pexels-mary-taylor-5896686.jpg" alt="">
    
    </div>
    <div class="container-cour"> 
    <?php
    // parcourir tout le tableaux 
        $recup = $Mat->fetchAll();
        foreach($recup as $Matiére){
        // recuperer les  donner de la requette
        
    ?>
    <div class="title">
        <h2><?=$Matiére['nom']?></h2>
    </div>
    <div class="cour"> 
        <p>les conjonctions de coordinations</p>
        <?=$Matiére['cour']?>    
    </div>
    <div class="exo">
        <p>exercice</p>
        <?=$Matiére['exercice']?>
    </div> 
    <div class="corrige">
        <?=$Matiére['corrige']?>
    </div> 
            
              
    
    
    <?php
}
?>
    </div>
    <div >

    </div>
</body>
</html>