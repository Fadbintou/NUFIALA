<?php
session_start();
//connexion a la base de donnée
$db = new PDO('mysql:host=localhost:3307;dbname= nufiala;', 'root', 'root'); 
if (isset($_POST['Nom']) && isset($_POST['Prenom'])&& isset($_POST['Tel'])&& isset($_POST['Email'])&& isset($_POST['Niveaux']) && isset($_POST['Passe'])){
    /*AFFECTATION DANS LES VARIABLES*/
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $tel = htmlspecialchars($_POST['Tel']);
    $email = htmlspecialchars($_POST['Email']);
    $niveaux = htmlspecialchars($_POST['Niveaux']);
    $passe = sha1($_POST['Passe']);

     /*VERIFICATION DES CHAMPS VIDES*/
     if (!empty($_POST['Nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['Email']) AND !empty($_POST['Niveaux']) AND !empty($_POST['Passe']))
     {
         echo"bienvenuie";
    }
else{
echo "<script>alert('Veuillez remplir tous les champs!')</script>";
}
                
}
?>