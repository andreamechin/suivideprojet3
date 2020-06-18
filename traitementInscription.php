<?php

include "scriptBDD.php";

//var_dump($_POST);

if (empty($_POST['nom'] || $_POST['prenom'] || $_POST['mail'] || $_POST['mdp'])) {
    $error = "Tous les champs doivent être remplis";

} else {

    $error = sInscrire($_POST['nom'],$_POST['prenom'], $_POST['mail'], $_POST['mdp']);
}


header('Location: index.php');