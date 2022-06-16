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
        <link href="../css/profil_info.css" rel="stylesheet">
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
                <div class="menu">
                    <div class="div1">
                        <a href="">Profil</a>
                        <a href="">Notifications</a>
                        <a href="">Matchs</a>
                    </div>
                </div>

                <div class="div2">
                    <div class="identity">
                        <div class="photo">
                            <img src="../ressources/pp1.png">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class="personal">
                            <div class="name">
                                Jane Loacart
                            </div>
                            <div class="mail">
                                <span>Email : </span> jane@locart.gmail.com
                            </div>
                            <div class="password">
                                <span>Mot de passe : </span> **************
                            </div>
                        </div>

                    </div>
                    <div class="complementary">
                        <div class="age">
                            <span>Age</span>
                            <p>23 anss</p>
                        </div>
                        <div class="city">
                            <span>Ville</span>
                            <p>Nantes</p>
                        </div>
                        <div class="fit">
                            <span>Forme physique</span>
                            <p>Athlétique</p>
                        </div>
                    </div>
                    <div class="mark">
                        <span> Noter l'Application</span>
                        <div class="note">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modify">
                <button>Modifier le profil</button>
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

