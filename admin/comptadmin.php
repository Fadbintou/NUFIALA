
<?php
    session_start();
    //connexion a la base de donnée
    $db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');
    $app = "SELECT * FROM  apprenants";
    $app = $db->prepare($app);
    // executer la requette
    $app->execute();
    $apprennants = $app->fetchAll();
// echo $apprennant[0]['id'];
// var_dump ($apprennant);
?>
<?php
    //connexion a la base de donnée
    $db = new PDO('mysql:host=localhost;dbname=fiala;', 'root', '');
    $cat = "SELECT * FROM  categorie_matiere";
    $cat = $db->prepare($cat);
    // executer la requette
    $cat->execute();
    $catmats = $cat->fetchAll();
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="comptutil.css">
    <title>COMPTE Administrateur </title>  
</head>
<body>


<div class="container">
        <div class="sidebar">
            <ul>
                <li class="active"><a href=""><i class="fa fa-home"></i> Mon compte </a></li>
                <li class="my-2"><a href="Modifier.php"><i class="fa fa-user"></i> Modification </a></li>
                <li class="my-2"><a href="supprimer.php"><i class="fa fa-car"></i>Supprimer</a></li>
                <li class="my-2"><a href="inserer.php"><i class="fa fa-car"></i>Ajouter</a></li>
                <li class="my-2"><a href=".php"><i class="fa fa-flag"></i>Deconnection </a></li> 
            </ul>
        </div>
        <div class="sidecontainer">
            <div class="nav">
                <div> <h1 class="logo "><a href="#">NUFIALA</a></h1></div>
            </div>
           <div class="para"> <center ><p> liste des utilisteurs</p></center></div>

                <table>
                        <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Nom apprenant </th>
                                    <th> Prenom apprenant </th>
                                    <th> Tel </th> 
                                    <th> Email </th>
                                    <th> Passe </th>
                                    <th> Date d'inscription </th> 
                                    <th> Date de mofification </th>
                                    <th> Action </th> 
                          
                                      
                                </tr> 
                        </thead>
                <tbody>
                <?php
                    // parcourir tout le tableaux 

                    foreach($apprennants as $apprennant)
        
                // recuperer les  donner de la requette
                // var_dump( $apprennant);
    
                :?> 
                <tr>
                    <td><?php echo $apprennant['id']; ?></td>
                    <td><?php echo $apprennant['nom']; ?></td>
                    <td><?php echo $apprennant['prenom']; ?></td>
                    <td><?php echo $apprennant['tel']; ?></td> 
                    <td><?php echo $apprennant['email']; ?></td>
                    <td><?php echo $apprennant['passe']; ?></td>
                    <td><?php echo $apprennant['created_at']; ?></td>
                    <td><?php echo $apprennant['updated_at']; ?></td>
                    <td>
                        <button class="btn-edit"><a href="Modifier.php?id=<?=$apprennant['id']?>">Modifier</a></button>
                        <button class="btn-delette"><a href="supprimer.php?id=<?=$apprennant['id']?>">Supprimer</a></button>
                    </td>         
                </tr>
               
                
                    <?php endforeach ?>
            </tbody>
    </table>




    <div class="para"><center><p> liste des categorie de matierre</p></center></div>

<table>
        <thead>
                <tr>
                    <th> Id </th>
                    <th> Nom de la categorie </th>
                    <th> Action </th>  
                </tr> 
        </thead>
<tbody>
<?php
    // parcourir tout le tableaux 

    foreach($catmats as $catmat)

// recuperer les  donner de la requette
// var_dump( $apprennant);

:?> 
<tr>
    <td><?php echo $catmat['id']; ?></td>
    <td><?php echo $catmat['nom']; ?></td>
    <!-- <td><button class="btn-edit"> <a href="ajouter.php?id=<?=$catmat['id']?>">Ajouter</a> </button> -->
    <button  class="btn-delette"><a href="supprimercatmat.php?id=<?=$catmat['id']?>">Supprimer</a> </button>  
    </td>         
</tr>


    <?php endforeach ?>
</tbody>
</table>

        </div>
</div>

</body> 
</html>
