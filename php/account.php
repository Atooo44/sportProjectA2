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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
        integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link href="../css/default.css" rel="stylesheet">
        <link href="../css/account.css" rel="stylesheet">
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
                            <a href="">PROFIL </a> <div class="circle"></div>
                        </div>
                        <div class="row">
                        <a href="">NOTIFICATIONS</a>
                        </div>
                        <div class="row"><a href="">MATCHS</a></div>
                        
                    </div>
                </div>

                <div class="div2">
                    <div class="identity">
                        <div class="photo">
                            <img src="../ressources/pp1.png">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </div>
                        <div class="personal">
                            <div class="name"  id="user_name">
                                Jane Loacart
                            </div>
                            <div class="mail" id="user_mail">
                                <span>Email : </span> jane@locart.gmail.com
                            </div>
                            <div class="password">
                                <span>Mot de passe : </span> <input type="password" readonly value="**************" id="user_password"> 
                            </div>
                        </div>

                    </div>
                    <div class="complementary">
                        <div class="age column">
                            <span>Age</span>
                            <input id="user_age" type="text" readonly value="23 ans">
                        </div>
                        <div class="city column">
                            <span>Ville</span>
                            <input id="user_city" type="text" readonly value="Nantes">
                        </div>
                        <div class="fit column">
                            <span>Forme physique</span>
                            <input id="user_fit" type="text" readonly value="Athlétique">
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
                <button id="edit_btn">Editez le profil</button>
            </div>
            

        </section>
<script src="../js/events.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/utils.js"></script>           
<script>
    window.onload = function(){
        loadUser();
    }
    window.onbeforeunload = function(){
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
</script>
<script src="https://kit.fontawesome.com/7f6d2012d0.js" >
    </body>
</html>

