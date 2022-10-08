
<?php
    session_start();
    //connexion a la base de donnée
    $db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');
    if(isset($_POST['Ajouter'])){
        // if(!empty($_POST['nom']) AND !empty($_POST['cour']) AND !empty($_POST['exo']) AND !empty($_POST['corriger'])){
            // RECUPERATION DES DONNEE DANS UNE VARIABLE
            $nom = htmlspecialchars($_POST['nom']);
            $cour = htmlspecialchars($_POST['cour']);
            $exo = htmlspecialchars($_POST['exo']);
            $corriger = htmlspecialchars($_POST['corriger']);
            $insertuser = $db->prepare("INSERT INTO matiere (nom,cour,exercice,corrige) VALUES (?,?,?,?)");
            $insertuser->execute(array($nom,$cour,$exo,$corriger));
            echo"cour de" .$nom;
           
            if ($insertuser->rowCount() > 0){
                echo"Insertion réussie";
            }else{
                echo "Echec d'insertion de donnée";
            }
        }
    
?>

<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="comptutil.css">
    <link href="Modification.css" rel="stylesheet">
    <title>COMPTE UTILISATEUR </title>  
</head>
<body>


<div class="container">
        <div class="sidebar">
            <ul>
                <li class="active"><a href="comptadmin.php"><i class="fa fa-home"></i> Mon compte</a></li>
                <li class="my-2"><a href="#"><i class="fa fa-user"></i> Modification</a></li>
                <li class="my-2"><a href="supprimer.php"><i class="fa fa-car"></i>Supprimer</a></li>
                <li class="my-2"><a href="inserer.php"><i class="fa fa-flag"></i>Ajouter</a></li>
                <li class="my-2"><a href=".php"><i class="fa fa-flag"></i>Deconnection</a></li>
            </ul>
        </div>
        <div class="sidecontainer">
            <div class="nav">
                <div> <h1 class="logo "><a href="#">NUFIALA</a></h1></div>
            </div>


            <form action="" method="POST">
    <div class="container_form">
                    <p class="p">Ajout du cours</p>
    <div class="first_container">
            <div class="first-div ">
            <div><label class="lb">Nom</label></div>
                <input type="text" id="nom" placeholder="ajouter" name="nom" >
            </div>
            <div class ="first-div">
            <div class="lb"><label >Cour</label></div>
                <input type="text" id="prenom"  placeholder="ajouter" name="cour" >
            </div>
    </div>
    <div class="seconde_container">
        <div class ="first-div">
            <div class="lb"><label >Exercices</label></div>
             <input type="text"   placeholder="ajouter" name="exo" >
         </div>
         <div class ="first-div">
            <div class="lb"><label >Corriger</label></div>
             <input type="text"  placeholder="ajouter" name="corriger" >
         </div>
    </div> 
   
        <div class="second-div">
        <input type="submit" name="Ajouter"  value="VALIDER">
        </div>
 
</form>
        </div>
</div>

</body> 
</html>