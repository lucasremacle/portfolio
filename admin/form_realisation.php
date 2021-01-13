<?php 
require_once("params.php");

if(isset ($_FILES['img']['name']) && ($_POST['description']) && ($_POST['mini_description']) && !empty($_GET['action']) && ($_GET['action'])=='addReal'){
    $description=$_POST['description'];
    $miniDescripUP=$_POST['mini_description'];
    $photoR = 'assets/img/'.$_FILES['img']['name'];
    copy($_FILES['img']['tmp_name'],'../'.$photoR);
    $resultat = $pdo->prepare("INSERT INTO realisation (img, description, mini_description) VALUES (?, ?, ? )");
    $resultat->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
   $photoR, $description, $miniDescripUP
   
));

// header('location:panelcontrole.php');
// $delete = $pdo-> prepare("DELETE FROM competence WHERE id_competence = :id_competence");
//         $delete -> execute(array(':id_competence' => $_GET['id']));

} // fin du if (!empty($_POST))

if(!empty($_GET['id_real']) && ($_GET['action']=='update')){
  $id = $_GET['id_real'];
var_dump($id);
    if(!empty($_POST)){
      $descriptionUp = $_POST['description'];
      $miniDescripUP = $_POST['mini_description'];
      $photoR = 'assets/img/'.$_FILES['img']['name'] ;
      copy($_FILES['img']['tmp_name'], '../'.$photoR);
      $resultUp = $pdo->prepare('UPDATE realisation SET img=?, description=?,  mini_description=? WHERE id_realisation=?');
      $resultUp->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
      $photoR, $descriptionUp, $miniDescripUP, $id
  ));
  }
  
  // header('location:panelcontrole.php');
}



// if(!empty($_GET['id_real']) && ($_GET['action']=='update')){
//   $idReal = $_GET['id_real'];

//   if(!empty($_POST)){
//   $descriptionUp=$_POST['description'];
//   $photoUp = '../assets/img/'.$_FILES['img']['name'] ;
//   copy($_FILES['img']['tmp_name'], $photoUp);
//   $resultatup = $pdo->prepare('UPDATE realisation SET img=?, description=? WHERE id_competences=?');
//   $resultatup->execute(array(   // execute retourne TRUE en cas de succès de la requête, sinon FALSE
//     $descriptionUp, $photoUp, $idReal
//  ));
// }
  
// }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/form_realisation.css">
</head>
<body>
<div class="titre">
<h2>AJOUTER</h2>
<h2>UNE REALISATION</h2>
</div>

<form action="" method="post" enctype="multipart/form-data">
	
    <!-- <div><label for="description">description</label></div>
    <div><input type="text" name="description" id="description"></div> -->

    <div class="form-group">


    <label for="exampleFormControlTextarea1">description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">titre</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mini_description"></textarea>
  </div>
    
    
    <div><label for="img">Photo</label></div>
    <div><input type="file" name="img" id="img"></div><!-- il ne faut pas oublier l'attribut enctype="multipart/form-data" dans la balise <form> -->

    <div><input type="submit" value="Enregistrer le contact"></div>

</form>		
</body>
</html>