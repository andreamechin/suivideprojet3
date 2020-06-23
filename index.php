<?php session_start();
include "scriptBDD.php";

?>
<!DOCTYPE html>
<html>
<head>
    <!--<link rel="stylesheet" href="assests/styles.css">-->
    <meta charset="UTF-8">
    <title>Blue Hotel</title>
</head>
<body>
<header>

</header>

<?php if (isset($_SESSION['id'])) :
    $infoUser = getUser($_SESSION['id']);
    $infoLoca = getLoca($_SESSION['id']);
    if(isset($_SESSION['recherche'])){
        $herbergement = getHeberge($_SESSION['recherche']);
        var_dump($herbergement);
    }
    var_dump($_SESSION);
    ?>
    <form action="traitementDeco.php">
        <button type="submit" name="deconnexion">Déco</button>
    </form>

    <div id="info_utilisateur">
        <p><?php echo($infoUser[0]) ?></p>
    </div>
    <div id="info_location">
        <?php if ($infoLoca != 666) : ?>
            <table>
                <tr>
                    <td>Nom</td>
                    <td>description</td>
                    <td>adresse</td>
                    <td>ville</td>
                    <td>nbPersonne</td>
                    <td>debut</td>
                    <td>durée</td>
                </tr>
                <?php //var_dump($infoLoca);
                for($ii = 0; $ii < sizeof($infoLoca); $ii++) :?>
                    <tr>
                        <?php for($jj = 0; $jj <= 6; $jj++) :?>
                        <td><?php echo($infoLoca[$ii][$jj]); ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>

        <?php else : ?>
            <p>Vous n'avez aucune réservation</p>
        <?php endif; ?>
    </div>


    <div id="rechercheHeberge">
        <form action="traitementRecherche.php" method="post">
            <input id="barreRecherche" name="barreRecherche" required="required" type="text" placeholder="Ex : Nantes"/>
            <button type="submit" name="recherche"/>Go!</button>
        </form>
    </div>
                        




<?php else : ?>
    <div>
        <form  action="traitementLogin.php" autocomplete="on" method="post">
            <h1>Bienvenue :</h1>
            <p>
                <input id="username" name="login" required="required" type="text" placeholder="Identifiant"/>
            </p>
            <p>
                <input id="password" name="mdp" required="required" type="password" placeholder="Mot de passe" />
            </p>
            <p class="login button">
                <input type="submit" value="connexion" />
            </p>
        </form>
        <form action="traitementInscription.php" autocomplete="on" method="post">
            <p>Pas de compte?</p>
            <p>
                <input id="inscriName" name="nom" required="required" type="text" placeholder="Nom" />
            </p>
            <p>
                <input id="inscriSurname" name="prenom" required="required" type="text" placeholder="Prénom" />
            </p>
            <p>
                <input id="inscriMail" name="mail" required="required" type="text" placeholder="mail"
            </p>
            <p>
                <input id="inscriPassword" name="mdp" required="required" type="password" placeholder="Mot de passe" />
            </p>
            <button type="submit" name="inscription">S'inscrire</button>
        </form>
    </div>
<?php endif;?>


<footer>

</footer>

</body>
</html>

