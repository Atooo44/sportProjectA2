<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="homepage.css" rel="stylesheet">
        <title> Sportmate</title>
    </head>
    <body>
        <section class="green">
            <header>
                <a href="index.php"><img src="ressources/logo_match.svg" class="logo"></a>
                <div class="toggle"></div>
                <ul class="navigation">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Inscription</a></li>
                    <li><span class="darkMode"></span></li>
                </ul>
            </header>
            <!-- commentaire -->
            <div class="main">
                <h2>Trouver un <span>match</span><br> près de chez vous</h2>
                <form action="" method="post" class="search_form" >
                        <input type="text" name="search" placeholder="Football, Tennis, Nantes, Caen..." class="searchbar" id="searchbar">
                        <button type="submit" class="submit_button"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </input>
                </form>

                <div class="carousel">
                    
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
    </body>
</html>

