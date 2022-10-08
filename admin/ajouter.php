

<?php
 session_start();
 //connexion a la base de donnée
 $db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');
 if(isset($_POST['submit'])){
         $nom = htmlspecialchars($_POST['ident']);
         $insertuser = $db->prepare("INSERT INTO matiere (nom) VALUES (?)");
         $insertuser->execute(array($nom));
         echo"cour de" .$nom;
         if ($insertuser->rowCount() > 0){
          
         }else{
             echo "Echec d'insertion de donnée";
         }
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="connexion.css" rel="stylesheet">
    <title>NUFIALA | CONNEXION</title>
</head>

<title>NUFIALA |connexion</title>
<body>
   
    <div class ="container-nav">
        <div><h1 class="logo"><a href="index.html">NUFIALA</a></h1></div>
    </div>  
    <div class="containersecond-nav">
        <div class="container-descriptions">
            <h2>BIENVENUE SUR  L'ESPACE ADMINISTRATEUR</h2>
        </div>
    </div>

    <form Action="" Method="POST">
        <div class="container_form">
                        <p>Modifier la categorie matiere</p>
            <div class="first-div ">
            <div><label class="lb">Nom</label></div>
                <input type="text" id="ident" placeholder="veuillez saisir votre nom" name="ident" >
            </div>
            <div class="second-div">
            <input type="submit" name="submit"  value="CONNECTER">
            </div>
        </div>
    </form>

</body>
</html>