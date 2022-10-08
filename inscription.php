
<?php
//connexion a la base de donnée
$db= new PDO('mysql:host=localhost;dbname=fiala;','root','');
if(isset($_POST['submit'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) AND !empty($_POST['email']) AND !empty($_POST['passe'])){
        // RECUPERATION DES DONNEE DANS UNE VARIABLE
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $tel = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);
        $passe = sha1($_POST['passe']);
        $insertuser = $db->prepare("INSERT INTO apprenants(nom,prenom,tel,email,passe) VALUES (?,?,?,?,?)");
        $insertuser->execute(array($nom,$prenom,$tel,$email,$passe));
        if ($insertuser->rowCount() > 0){
            header('location:./comptutil/comptuti.php');
        }else{
            echo "NON";
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
    <link href="assets/css/inscription.css" rel="stylesheet">
    <title>NUFIALA | INSCRIPTION</title>
</head>
<body>

    <div class ="container-nav">
        <div><h1 class="logo"><a href="index.html">NUFIALA</a></h1></div>
    </div>  
    <div class="containersecond-nav">
        <div class="container-descriptions">
            <h2>BIENVENUE SUR NUFIALA</h2>
        </div>
    </div>

  <form action="" method="POST">
    <div class="container_form">
                    <p class="p"> INSCRIPTION</p>
    <div class="first_container">
            <div class="first-div ">
            <div><label class="lb">Nom</label></div>
                <input type="text" id="nom" placeholder="saisir votre nom" name="nom" >
            </div>
            <div class ="first-div">
            <div class="lb"><label >Prenom</label></div>
                <input type="text" id="prenom"  placeholder="saisir votre prenom" name="prenom" >
            </div>
    </div>
    <div class="seconde_container">
        <div class ="first-div">
            <div class="lb"><label >Email</label></div>
             <input type="email" id="email"  placeholder="saisir votre email" name="email" >
         </div>
         <div class ="first-div">
            <div class="lb"><label >Tel</label></div>
             <input type="text" id="tel"  placeholder="saisir votre tel" name="tel" >
         </div>
    </div> 
  
   
         <div class ="first-div">
            <div class="lb"><label >mot de passe</label></div>
             <input type="password" id="passe"  placeholder="saisir votre passe" name="passe">
         </div> 
   
        <div class="second-div">
        <input type="submit" name="submit"  value="VALIDER">
            <a href="connexion.php"> SE CONNECTER</a>
        </div>
 
</form>
</body>

</html>