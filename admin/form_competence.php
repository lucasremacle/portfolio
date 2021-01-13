<?php 
require_once("params.php");

if(isset($_FILES['img']['name']) && ($_POST['competence']) && ($_POST['niveau']) && !empty($_GET['action']) && ($_GET['action']) =='addComp'){
    $competence=$_POST['competence'];
    $niveau=$_POST['niveau'];
    $photo = 'assets/img/'.$_FILES['img']['name'] ;
     copy($_FILES['img']['tmp_name'], '../'.$photo);
    $resultat = $pdo->prepare("INSERT INTO competences (img, competence, niveau) VALUES (?, ?, ?)");
    $resultat->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
    $photo,$competence,$niveau
));
header('location:panelcontrole.php');
} // fin du if (!empty($_POST))

if(!empty($_GET['id_realup']) && ($_GET['action']=='update')){
    $id = $_GET['id_realup'];

    if(!empty($_POST)){
        $competenceup = $_POST['competence'];
        $niveauup = $_POST['niveau'];
        $photoup = 'assets/img/'.$_FILES['img']['name'] ;
        copy($_FILES['img']['tmp_name'], '../'.$photoup);
        $resultatup = $pdo->prepare('UPDATE competences SET img=?, competence=?, niveau=? WHERE id_competences=?');
        $resultatup->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
        $photoup, $competenceup, $niveauup, $id
        
    ));
    header('location:panelcontrole.php');
}
    

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	
    <div><label for="competence">competence</label></div>
    <div><input type="text" name="competence" id="competence"></div>
    
    <div><label for="niveau">niveau</label></div>
    <div><input type="text" name="niveau" id="niveau"></div>

    
    <div><label for="img">Photo</label></div>
    <div><input type="file" name="img" id="img"></div><!-- il ne faut pas oublier l'attribut enctype="multipart/form-data" dans la balise <form> -->

    <div><input type="submit" value="Enregistrer le contact"></div>

</form>		
</body>
</html>