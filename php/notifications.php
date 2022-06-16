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
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="connection.php">Inscription</a></li>
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
                        <a href="">NOTIFICATIONS</a> <div class="circle"></div>
                        </div>
                        <div class="row"><a href="">MATCHS</a></div>
                        
                    </div>
                </div>

                <div class="div2">
                <h2>Joueur</h2>
                    <div class="player">          
                        <div class="card">
                            <div class="title">
                                <img src="../ressources/logo_football.svg">
                                <h3>Football<h3>
                            </div>
                            <div class="date">
                                <p>25/07/2022 à partir de 18h00 à Nantes <p>
                            </div>
                            <div class="response valid"> Accepté</div>
                        </div>
                        <img src="../ressources/bin.svg" class="bin">
                    </div>

                    <div class="player">          
                        <div class="card">
                            <div class="title">
                                <img src="../ressources/logo_football.svg">
                                <h3>Football<h3>
                            </div>
                            <div class="date">
                                <p>25/07/2022 à partir de 18h00 à Nantes <p>
                            </div>
                            <div class="response refuse"> Refusé</div>
                        </div>
                        <img src="../ressources/bin.svg" class="bin">
                    </div>
                    
                    <div class="organizer">
                        <h2>Organisateur</h2>
                        <div class="card_org">
                            <div class="headcard">
                                <div class="title">
                                    <img src="../ressources/logo_football.svg">
                                    <h3>Football<h3>
                                </div>
                                <div class="supp">
                                    <span> 30/07/2022 à partir de 13h00 à Rezé</span>
                                </div>
                            </div>
                            <div class="footcard">
                                    <p> Jean marie souhaite participer à votre évènement</p>
                                    <div class="check">
                                        <img src="../ressources/cross.svg" class="cross">
                                        <img src="../ressources/tick.svg" class="tick">
                                    </div>
                            </div>
                                    
                            
                        </div>
                    </div>
                </div>                
            </div>

        </section>
           
<script>
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
</script>
<script src="https://kit.fontawesome.com/7f6d2012d0.js" >
    </body>
</html>

