<?php
  include("database.php");
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  //$db = dbConnect();
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link href="../css/default.css" rel="stylesheet">
        <link href="../css/notification.css" rel="stylesheet">
        <title> Sportmate</title>
    </head>
    <body>
        <section>
            <header>
                <a href="index.php"><img src="../ressources/logo_match.svg" class="logo"></a>
                <div class="toggle"></div>
                <ul class="navigation">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="sport.php">Sports</a></li>
                    <li><a href="connection.php" id="register_btn">Connexion</a></li>
                    <li><a href="connection.php" id="disconnect"></a></li>
                    <li><span class="darkMode"></span></li>
                </ul>
            </header>
            <!-- commentaire -->
            <div class="parent">
                <div class="div1">
                <div class="menu">
                        <div class="row">
                            <a href="account.php">PROFIL </a> 
                        </div>
                        <div class="row">
                        <a href="notifications.php">NOTIFICATIONS</a><div class="circle"></div>
                        </div>
                        <div class="row"><a href="match.php">MATCHS</a></div>
                        
                    </div>
                </div>

                <div class="div2">
                <h2>Joueur</h2>
                    <div id="noti">
                        
                    </div>
                    
                    
                    <div class="organizer">
                        <h2>Organisateur</h2>
                        <div id="org">

                        </div>
                    </div>
                </div>                
            </div>

        </section>
        <script src="../js/card.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/events.js"></script>                     
    <script src="../js/utils.js"></script>      
    <script src="../js/notification.js"></script>      
<script>
    window.onload = function(){
        loadUser();
    }
    let darkmode = document.querySelector('.darkMode');
    let body = document.querySelector('body');
    darkmode.onclick = function(){
        darkmode.classList.toggle('active');
        body.classList.toggle('dark');
    }

    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active');
        navigation.classList.toggle('active');
    }

    function discard(x) {
        document.getElementById('player'+x).style.display ="none";
    }
</script>
<script src="https://kit.fontawesome.com/7f6d2012d0.js" >
    </body>
</html>

