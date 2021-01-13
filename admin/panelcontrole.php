<?php
    require_once("params.php");

    // if(!isset($_SESSION['session'])){ //On vérifie que la session 'pseudo' n'existe PAS.
    //   header('location:authentification.php'); //si elle n'existe pas on redirige vers authentification.php
    //   exit;
    // }
    
    
    ?>
<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel de contrôle</title>
    <link rel="stylesheet" href="panelContStyle.css">


</head>
<body>

    
   

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row affix-row">
    <div class="col-sm-3 col-md-2 affix-sidebar">
		<div class="sidebar-nav">
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Sidebar menu</span>
    </div>
    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <ul class="nav navbar-nav" id="sidenav01">
        <li class="active">
          <a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
          <h4>
          Control Panel
          <br>
          <small>IOSDSV <span class="caret"></span></small>
          </h4>
          </a>
          <div class="collapse" id="toggleDemo0" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="#">ProfileSubMenu1</a></li>
              <li><a href="#">ProfileSubMenu2</a></li>
              <li><a href="#">ProfileSubMenu3</a></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="form_competence.php?action=addComp" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-cloud"></span> ajouté compétence <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="#">Submenu1.1</a></li>
              <li><a href="#">Submenu1.2</a></li>
              <li><a href="#">Submenu1.3</a></li>
            </ul>
          </div>
        </li>
        <li class="active">
          <a href="form_realisation.php?action=addReal" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-inbox"></span> ajouter une réalisation <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo2" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="#">Submenu2.1</a></li>
              <li><a href="#">Submenu2.2</a></li>
              <li><a href="#">Submenu2.3</a></li>
            </ul>
          </div>
        </li>
        <li><a href="control.php?action=deconnection"><span class="glyphicon glyphicon-lock"></span>deconnection</a></li>
        
      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
	</div>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">
			
				<div class="page-header">
	<h3><span class="glyphicon glyphicon-th-list"></span> Navigation</h3>
</div>
<table class="table">

  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

      <?php
    if(!empty($_GET["id_real"]) && ($_GET['action']=='sup')){
        $id = $_GET["id_real"];  
        $querysup = $pdo->prepare('DELETE FROM realisation WHERE id_realisation=?');
        $querysup ->execute(array($id));
    }
    
      $requete = $pdo->query('SELECT * FROM realisation');
      while($resultat = $requete->fetch(PDO::FETCH_ASSOC)){
      ?>
    <tr>
      <th scope="row"><?=$resultat['id_realisation']?></th>
      <td><img src="../<?=$resultat['img']?>" style="width:50px"alt=""></td>
      <td><?=$resultat['description']?></td>
      <td><?=$resultat['mini_description']?></td>
      <td><a href="form_realisation.php?action=update&id_real=<?php echo $resultat['id_realisation']?>">modifier</a><a href="?action=sup&id_real=<?php echo $resultat['id_realisation']?>">supprimer</a>
      </td>
    </tr>
   <?php  } ?>
  </tbody>
</table>


<table class="table">

  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">image</th>
      <th scope="col">niveau</th>
      <th scope="col">modifier</th>
    </tr>
  </thead>
  <tbody>
      <?php
    if(!empty($_GET["id_real"]) && ($_GET['action']=='sup')){
        $id = $_GET["id_real"];  
        $querysupC = $pdo->prepare('DELETE FROM competences WHERE id_competences=?');
        $querysupC ->execute(array($id));
    }
    

      $requete=$pdo->query('SELECT*FROM competences');
      while($resultatC=$requete->fetch(PDO::FETCH_ASSOC)){
      ?>
    <tr>
      <th scope="row"><?php echo $resultatC['id_competences']   ?></th>
      <td><img src="../<?php echo $resultatC['img']?>" style="width:50px"alt=""></td>
      <td><?php echo $resultatC['niveau']?></td>
      <td><a href="form_competence.php?action=update&id_realup=<?php echo $resultatC['id_competences']?>">modifier</a><a href="?action=sup&id_real=<?php echo $resultatC['id_competences']?>">supprimer</a>
      </td></td>
    </tr>
   <?php  } ?>
  </tbody>
</table>
			
		</div>
	</div>
</div>
<script src='../assets/js/main.js'></script>
</body>
</html>