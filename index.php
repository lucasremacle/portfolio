<?php require_once("admin/params.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <script src="https://kit.fontawesome.com/bcb6e77243.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div class="container">
  
        <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
          <a class="navbar-brand" href="#">lucas remacle</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" href="#presentation">présentation<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#mesProjet">mes projet</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#trouver">ou me trouver</a>
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </div>
        </nav>

    <div class="jumbotron">
          <h1 class="animate__animated animate__bounce display-4">Bienvenue cher future recruteur ! </h1>
          <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
          <hr class="my-4">
          <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>


  <h2 id="#presentation text-center">présentation</h2>
  

  <div class="présentation">bonjour je me présente je suis Lucas remacle j suis actuellement en formation dévelopeur web </div>

  
  <h2>Compétences</h2>

   <div class="row">
    <?php   $query = $pdo->query('SELECT * FROM competences');
            while($resultatC = $query->fetch(PDO::FETCH_ASSOC)){?>

      <div class="card col-md-4 col-12 justify-content-around" style="width: 18rem;">
        <img src="<?=$resultatC['img']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?=$resultatC['competence']?></h5>
          <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: <?=$resultatC['niveau']?>%;" aria-valuenow="<?=$resultatC['niveau']?>" aria-valuemin="0" aria-valuemax="100"><?= $resultatC['niveau']?>%</div>
          </div>
         
        </div>
      </div>
        <?php } ?>
      </div><!--.row-->
  


  <div id="mesProjet">
  <h2>mes projet</h2>
  </div>
  
  
  


  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  <?php $requete = $pdo->query('SELECT * FROM realisation WHERE id_realisation = 10');
      while($resultat = $requete->fetch(PDO::FETCH_ASSOC)){
      ?>
    <div class="carousel-item active">
      <img src="<?=$resultat['img']?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?=$resultat['mini_description']?></h5>
        <p><?=$resultat['description']?></p>
      </div>
    </div>
    <?php  } ?>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>

  

  

  
  <div id="#Trouver">
  <h2> ou me trouver ?</h2>
  <div class="container2">
     
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20969.09002614328!2d2.2704774190095454!3d48.931846574848244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f45c618b431%3A0x950c4e920d76f175!2s92230%20Gennevilliers!5e0!3m2!1sfr!2sfr!4v1606467406356!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

  </div>
  </div>


  <div class="cv">
  <button type="button" class="btn btn-primary btn-lg btn-block">voici mon cv</button>
  <button type="button" class="btn btn-secondary btn-lg btn-block">et mon github</button>
  </div>

  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </div><!--.container-->
  </div>

<div id="scrolltotop"><a href="#"><i class="fas fa-arrow-up"></i></a></div>

<!-- Footer -->

<footer class="container-fluid">


</footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 <script src ="assets/js/main.js"></script>

</body>

</html>