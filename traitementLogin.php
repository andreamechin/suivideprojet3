<?php
session_start();

include "scriptBDD.php";


if (empty($_POST['login'] || $_POST['mdp'])) {
    $error = "Tous les champs doivent être remplis";
} elseif (empty($_POST['login'] && $_POST['mdp'])) {
    $error = "Tous les champs doivent être remplis";

} else {
    $error = seConnecter($_POST['login'], $_POST['mdp'])[1];
}


header('Location: index.php');
