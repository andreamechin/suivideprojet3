<?php

include "connexionbdd.php";

function connectBDD() {
    $host = '127.0.0.1';
    $port = '3306';
    $db = 'blueHotel';
    $login = 'root';
    $password = '';

    try {
        $pdo = new PDO('mysql:host='.$host.';port='.$port. ';dbname='.$db, $login, $password);
        $pdo->exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
    return $pdo;
}

function seConnecter($login, $mdp) {
    $pdo = connectBDD();

    $rows = $pdo->query("SELECT * FROM utilisateur WHERE mail ='".$login."'");
    $error = "Pas de compte";
    $boolError = false;

    while ($row = $rows->fetch()){
        if($row['mail'] == $login && $row['mdp'] == $mdp) {
            //$_SESSION['logged'] = true;
            $_SESSION['id'] = $row['idUtili'];
            $_SESSION['login'] = $row['mail'];
            $error = "Bien connecté";
            break;
        }
        else {
            $error = "Mauvais mdp";
            $boolError = false;
        }
    }
    $rows->closeCursor();
    $pdo = null;
    return array($boolError, $error);
}

function sInscrireCheck($name,$surname, $login, $mdp){
/*
    $namePattern = 0;
    if(preg_match($namePattern, $name)){
        $nameChecked = true;
    }else{
        $nameChecked = false;
    }
*/
    /*$mailPattern = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g';*/
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM utilisateur WHERE utilisateur.mail ='".$login."'");
    $checkVideMail = $rows->rowCount();
    if(/*preg_match($mailPattern, $login) &&*/ $checkVideMail == 0){
        $mailChecked = true;
    }else{
        $mailChecked = false;
    }

/*
    $mdpPattern = 0;
    if(preg_match($mdpPattern, $mdp)){
        $mdpChecked = true;
    }else{
        $mdpChecked = false;
    }
*/

    if(/*$nameChecked == true &&*/ $mailChecked == true /*&& $mdpChecked == true*/) {
        return true;
    }else{
        return false;
    }
}

function sInscrire($name,$surname, $login, $mdp){

    $checked = sInscrireCheck($name, $surname, $login, $mdp);

    if($checked) {

        $field = array('nom', 'prenom', 'mail', 'mdp');
        $value = array();
        array_push($value, $name);
        array_push($value, $surname);
        array_push($value, $login);
        array_push($value, $mdp);

        insertDB('utilisateur', $field, $value);

        $error = 'compte créé';

    } else{
        $error = 'informations érronées ou adresse mail déjà utilisée';
    }

    return $error;
}

function getUser($idUser) {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM utilisateur WHERE idUtili ='".$idUser."'");
    $rows = $rows->fetch();
    $tabInfoUser = array();
    array_push($tabInfoUser, $rows['nom']);
    array_push($tabInfoUser, $rows['prenom']);
    array_push($tabInfoUser, $rows['mail']);

    return $tabInfoUser;
}

function getLoca($idUser) {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM location WHERE location.idUtili ='".$idUser."'");
    $checkVide = $rows->rowCount();
    if($checkVide != 0) {
        $tabInfoLoca = array();
        $rows = $rows->fetchAll();
        for($ii = 0; $ii<sizeof($rows);$ii++){
            //var_dump($rows);
            $logemCourant = $pdo->query("SELECT * FROM logement WHERE idLogem ='".$rows[$ii]['idLogem']."'");
            $logemCourant = $logemCourant->fetch();
            $tabLocaIndiv = array();
            array_push($tabLocaIndiv, $logemCourant['nom']);
            array_push($tabLocaIndiv, $logemCourant['description']);
            array_push($tabLocaIndiv, $logemCourant['adresse']);
            array_push($tabLocaIndiv, $logemCourant['ville']);
            array_push($tabLocaIndiv, $logemCourant['nbPersonne']);
            array_push($tabLocaIndiv, $rows[$ii]['dateDebut']);
            array_push($tabLocaIndiv, $rows[$ii]['dureeJour']);
            array_push($tabLocaIndiv, $rows[$ii]['idLoca']);

            array_push($tabInfoLoca, $tabLocaIndiv);
        }
    } else {
        $tabInfoLoca = 666;
    }

    return $tabInfoLoca;
}

function getHeberge($recherche) {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM logement WHERE logement.ville ='".$recherche."'");
    $checkVide = $rows->rowCount();
    if($checkVide != 0){
        $tabHeberge = array();
        $rows = $rows->fetchAll();
        for($ii = 0; $ii<sizeof($rows);$ii++){
            //var_dump($rows);
            array_push($tabHeberge, $rows[$ii]);
        }
        return $tabHeberge;
    }
    return;

}

function getHebergeSel($id){
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM logement WHERE logement.idLogem ='".$id."'");
    $rows = $rows->fetch();
    $tabHebergeSel = array();
    array_push($tabHebergeSel, $rows['nom']);
    array_push($tabHebergeSel, $rows['description']);
    array_push($tabHebergeSel, $rows['adresse']);
    array_push($tabHebergeSel, $rows['ville']);
    array_push($tabHebergeSel, $rows['prix']);
    array_push($tabHebergeSel, $rows['nbPersonne']);

    return $tabHebergeSel;
}