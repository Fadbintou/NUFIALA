<?php
session_start();
//connexion a la base de donnée
$db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');

if(isset($_POST['submit'])){
    if(!empty($_POST['ident']) AND !empty($_POST['password'])){    
//declaration des variables        
    $nom = $_POST['ident'];
    $passe = $_POST['password'];
    
     $recupuser= $db->prepare('SELECT * FROM admin  WHERE nom=? AND passe =?');
     $recupuser->execute(array($nom,$passe));
     $user = $recupuser->fetch();
        if($recupuser->rowCount() >0){
            $_session['ident'] =$nom;
            $_session['password'] = $passe;
            $_session['id'] = $recupuser->fetch()['id'];
            header('location:comptadmin.php');
        } else{
            echo"votre mot de passe ou email est incorect"; 
            header ("Location:connexions.php"); 
        }
       
  }else{
     echo"Veuillez completer tous les champs ";  
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
                        <p>CONNEXION</p>
            <div class="first-div ">
            <div><label class="lb">Nom</label></div>
                <input type="text" id="ident" placeholder="veuillez saisir votre nm" name="ident" >
            </div>
            <div class ="first-div">
               <div class="lb"><label >Password</label></div>
                <input type="password" id="ident"  placeholder="Mot de passe" name="password" >
            </div>
            <div class="second-div">
            <input type="submit" name="submit"  value="CONNECTER">
            </div>
        </div>
    </form>

</body>
</html>
