<?php
    //connexion a la base de donnée
    $db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');
if($_GET['id']){
    $id=$_GET['id'];
            $recupuser= $db->prepare('SELECT * FROM apprenants WHERE id=? ');
            $result=$recupuser->execute(array($id));
            $user = $recupuser->fetch();
}else{
    header ("Location:comptadmin.php"); 
}
if(isset($_POST['modifapp'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) AND !empty($_POST['email']) AND !empty($_POST['passe'])){
        // RECUPERATION DES DONNEE DANS UNE VARIABLE
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $tel = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);
        $passe = sha1($_POST['passe']);
        $modiftuser = $db->prepare("UPDATE apprenants SET  nom =?,prenom=?,tel=?,email=?, passe=? where id=?");
        $modiftuser->execute(array($nom,$prenom,$tel,$email,$passe,$id));
        
    }else{
        echo"Veuillez completer tous les champs ";
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
                <li class="active"><a href="comptadmin.php"><i class="fa fa-home"></i> Mon compte </a></li>
                <li class="my-2"><a href="#"><i class="fa fa-user"></i> Modification </a></li>
                <li class="my-2"><a href="supprimer.php"><i class="fa fa-car"></i>Supprimer</a></li>
                <li class="my-2"><a href="inserer.php"><i class="fa fa-flag"></i>Ajouter </a></li>
                <li class="my-2"><a href=".php"><i class="fa fa-flag"></i>Deconnection </a></li> 
            </ul>
        </div>
        <div class="sidecontainer">
            <div class="nav">
                <div> <h1 class="logo "><a href="#">NUFIALA</a></h1></div>
            </div>


            <form action="" method="POST">
    <div class="container_form">
                    <p class="p">MODIFICATION</p>
    <div class="first_container">
            <div class="first-div ">
            <div><label class="lb">Nom</label></div>
                <input type="text" id="nom" value=<?php echo $user['nom']; ?> name="nom">
            </div>
            <div class ="first-div">
            <div class="lb"><label >Prenom</label></div>
                <input type="text" id="prenom"  value=<?php echo $user['prenom']; ?> name="prenom" >
            </div>
    </div>
    <div class="seconde_container">
        <div class ="first-div">
            <div class="lb"><label >Email</label></div>
             <input type="email" id="email"  value=<?php echo $user['email']; ?> name="email"  >
         </div>
         <div class ="first-div">
            <div class="lb"><label >Tel</label></div>
             <input type="text" id="tel" value=<?php echo $user['tel']; ?> name="tel" >
         </div>
    </div> 
  
   
         <div class ="first-div">
            <!-- <div class="lb"><label >mot de passe</label></div> -->
             <input type="password" id="passe" value=<?php echo $user['passe']; ?> name="passe" >
         </div> 
   
        <div class="second-div">
        <input type="submit" name="modifapp"  value="VALIDER">
        </div>
 
</form>
        </div>
</div>

</body> 
</html>