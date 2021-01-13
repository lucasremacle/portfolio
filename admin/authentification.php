<!DOCTYPE html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link rel="stylesheet" href="style.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!------ Début du Body ---------->

<?php

require_once('params.php');


if(!empty($_POST)){

    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = sha1($_POST['password']); 
        
        $query = $pdo->prepare('SELECT * FROM user WHERE pseudo=?');
        $query->execute(array($pseudo));
        
        while($admin = $query -> fetch(PDO::FETCH_ASSOC)){
            
            if($password == $admin['password'] && $pseudo == $admin['pseudo']){
                
                $_SESSION['session']= $pseudo; 
                
                header('location:panelcontrole.php');
            }
        }
    }
    
}
?>




<body>
    <!------ Début du formulaire Login ---------->
    <div id="login">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center"> <!------ Id login-row pour garder le même nom "row" que la ligne Bootstrap ---------->
                <div id="login-column" class="col-md-6"><!------ Id loging-column pour garder le même nom que bootstrap ---------->
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <?php 
                                 if (isset($_GET['verif'])) {
                                    echo'<div class="alert alert-danger" role="alert">Name ou password non valide !</div>';
                                }
                            ?>
                            
                            <div class="form-group">
                                <label for="pseudo" class="text-info">nom d'utilisateur:</label><br>
                                <input type="text" name="pseudo" id="pseudo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">mot de passe:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                    </div>
                </div><!------ Fin de login column ---------->
            </div><!------ Fin de login row ---------->
        </div>
    </div><!------ Fin du formulaire de Login---------->
    <script>
        /*$( document ).ready(function() {
            document.getElementById("login-form").addEventListener("submit", function(event){
                event.preventDefault()
                let username = document.getElementById("username").value
                let password = document.getElementById("password").value
                $("#alert").hide();
                
                if(username || password < 3){
                    $("#alert").show();
                }else{
                    $("#alert").hide();
                }
            });
        });*/
    </script>
</body>
