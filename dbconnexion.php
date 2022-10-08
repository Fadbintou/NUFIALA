<?php
session_start();
//connexion a la base de donnée
if(isset($_POST['Enregistrer'])){
    if(!empty($_POST['Nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['Email']) AND !empty($_POST['Tel']) AND !empty($_POST['Niveaux']) AND !empty($_POST['Passe'])){
  $db = new PDO('mysql:host=localhost:3307;dbname=fiala;', 'root', 'root'); 
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $tel = htmlspecialchars($_POST['Tel']);
    $email = htmlspecialchars($_POST['Email']);
    $niveaux = htmlspecialchars($_POST['Niveaux']);
    $passe = sha1($_POST['Passe']);
    $insertapp = $db->prepare('INSERT INTO apprenants(nom, prenom, tel, email,niveaux, mot de passe,created_at,updated_at) VALUES(?, ?, ?, ?, ?, ?,NOW(),NOW()');
    echo "yesss";

    $insertapp->execute(array($nom,$prenom, $email,$tel,$passe, $niveaux));
    $recupuser= $db->prepare('SELECT * FROM apprenants WHERE email=? AND mot de passe =?');
    $recupuser->execute(array($email,$passe));
    if($recupuser->rowCount() >0){
        $_session['Email'] =$email;
        $_session['Passe'] = $passe;
        $_session['id'] = $recupuser->fetchAll();
       
          
    }
    }else{
        echo"Veuillez completer tous les champs ";
    }
    
}

?>