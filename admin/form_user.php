<?php 
require_once("params.php");

if(isset($_POST['pseudo']) && ($_POST['password'])){
    $pseudo=$_POST['pseudo'];
    $password=sha1($_POST['password']);
    $resultat = $pdo->prepare("INSERT INTO user (pseudo, password) VALUES (?,?)");
    $resultat->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
    $pseudo,$password,
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
	
    <div><label for="pseudo">pseudo</label></div>
    <div><input type="text" name="pseudo" id="pseudo"></div>
    
    <div><label for="password">password</label></div>
    <div><input type="password" name="password" id="password"></div> 
 
    <div><input type="submit" value="Enregistrer le contact"></div>

</form>		
</body>
</html>