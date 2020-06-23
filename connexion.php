<?php session_start();
include "scriptBDD.php";

?> 
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width initial-scale=1.0" />

    <!-- icones fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>suivi de projet 3</title>

    <!-- icone navigateur -->
    <link rel="icon" type="image/png" href="image.png" />

</head>


<body>

    <header>
        <nav>
            <a class="logo"><img src="logo3.png"></a>
            <a href="index.php" class="titre">Blue Hotel</a>
            <!--<a href="connexion.html">Connexion</a>-->
        </nav>
    </header>
    <?php if (isset($_SESSION['id'])) :
     header('Location: index.php');
     else : ?>
    <main id="connexion">

        <h3>Connexion</h3>
        <form  action="traitementLogin.php" autocomplete="on" method="post">
            <div class="flex">
                <label for="email">Adresse e-mail</label>

                <div>
                <input id="username" name="login" required="required" type="text" placeholder="Identifiant"/>
                    <br>
                </div>
            </div>
            <div class="flex">
                <label for="password">Mot de passe</label>
                <div>
                <input id="password" name="mdp" required="required" type="password" placeholder="Mot de passe" />
                    <br>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">
                        Connexion
                    </button>
                    <br>
                    <!--
                    <a href="<?=$prefix?>/auth/reset">
                        Mot de passe oublié ?
                    </a>
                -->
                    <br>
                 <!--   <a href="<?=$prefix?>/auth/register">
                        S'inscrire
                    </a> -->
                </div>
            </div>
        </form>
        <p>Pas de compte?</p>
        <form action="traitementInscription.php" autocomplete="on" method="post">
            <p>
                <input id="inscriName" name="nom" required="required" type="text" placeholder="Nom" />
            </p>
            <p>
                <input id="inscriSurname" name="prenom" required="required" type="text" placeholder="Prénom" />
            </p>
            <p>
                <input id="inscriMail" name="mail" required="required" type="text" placeholder="mail" />
            </p>
            <p>
                <input id="inscriPassword" name="mdp" required="required" type="password" placeholder="Mot de passe" />
            </p>
            <button type="submit" name="inscription">S'inscrire</button>
        </form>
    </main>
 <?php endif; ?>


</body>

</html>