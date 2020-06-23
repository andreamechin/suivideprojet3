<?php


include "connexion.php";

function pingServeur() {

    $pdo = connectDB();
    $rows = $pdo->query("SELECT ipServ FROM serveur");
    $tabIp = array();
    $tabOnline = array();
    while($row = $rows->fetch()) {
        array_push($tabIp, $row['ipServ']);
    }

    $ii = 0;
    while ($ii < count($tabIp)) {
        array_push($tabOnline, 1);
        $ii++;
    }

    $checkServerBoucle = true;
    while($checkServerBoucle == true){
        for($xx = 0; $xx < count($tabIp); $xx++) {
            $tabOnline[$xx] = pingIp($tabIp[$xx], $tabOnline[$xx]);
        }
        sleep ( 5 );
    }
}

function pingOneIp($ip){
    exec("ping -n 2 " . $ip, $output, $result); //connecté si $result = 0

    ///////////////
    //string(60) "    Paquets�: envoy�s = 2, re�us = 2, perdus = 0 (perte 0%),"
    //recupere le pourcentage de perte de paquet
    $explodeOutputPerte = explode('perte ', $output[6]);
    $explodeOutputPerte = explode(')', $explodeOutputPerte[1]);
    echo $explodeOutputPerte[0];
    ///////////////

    $dateJour = date("Y-m-d ");
    $dateHeure = date("H:i:s", strtotime('+2 hours'));
    for ($outout = 2; $outout <= 3; $outout++) {

        //string(69) "R�ponse de 172.31.0.22�: Impossible de joindre l'h�te de destination."
        $checkPonse = "ponse de";
        $posPonse = strpos($output[$outout], $checkPonse);
        if ($posPonse !== false) { //si on trouve "Ponse de"

            $checkImp = "Impossible de joindre l'";
            $posImp = strpos($output[$outout], $checkImp);
            if ($posImp !== false) { //si on trouve "Impossible de joindre l'"
                echo "coucou";
                $pdo = connectDB();
                $sql = "UPDATE serveur SET txPerte = '".$explodeOutputPerte[0]."' WHERE ipServ = '".$ip."'";
                echo $sql;
                $pdo->exec($sql);

            } else {
                //string(54) "R�ponse de 192.168.200.60�: octets=32 temps<1ms TTL=64"
                //recupere le temps quà mis le paquet
                $explodeOutputTemps = explode('temps', $output[$outout]);
                $explodeOutputTemps = explode(' ', $explodeOutputTemps[1]);
                $pdo = connectDB();
                $sql = "UPDATE serveur SET txPerte = '".$explodeOutputPerte[0]."', latence = '".$explodeOutputTemps[0]."' WHERE ipServ = '".$ip."'";
                echo $sql;
                $pdo->exec($sql);
            }
        } else {
            $pdo = connectDB();
            $sql = "UPDATE serveur SET txPerte = '".$explodeOutputPerte[0]."' WHERE ipServ = '".$ip."'";
            echo $sql;
            $pdo->exec($sql);
        }
    }
}

$ip = "192.168.200.60";

pingOneIp($ip);

