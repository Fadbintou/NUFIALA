<?php
    
    //connexion a la base de donnée
    $db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');
if($_GET['id']){
    $id=$_GET['id'];
            $recupuser= $db->prepare('DELETE  FROM apprenants WHERE id=? ');
            $recupuser->execute(array($id));
}
    header ("Location:comptadmin.php"); 

    
?>