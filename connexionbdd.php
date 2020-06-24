<?php

//include "scriptBDD.php";

function insertDB($table, $fields, $values){

    $sql = "INSERT INTO " . $table . " (";
    for($i = 0; $i < count($fields)-1; $i++){
        $sql .= $fields[$i] . ', ';
    }
    $sql .= $fields[$i] . ') VALUES (';


    for($i = 0; $i < count($values)-1; $i++){
        $sql .= "'" . $values[$i] . "', ";
    }
    $sql .= "'" . $values[$i] . "')";
    //var_dump($sql);
  $pdo = connectBDD();
  $pdo->exec($sql);
}

function deleteLineDB($table, $fields, $values){
    $sql = "DELETE FROM " . $table . " WHERE ";
    for($i = 0; $i < count($fields) - 1; $i++){
        $sql .= $fields[$i] . '=' . "'" . $values[$i] . "'" . ' AND ';
    }

    $sql .= $fields[$i] . '=' . "'" . $values[$i] . "'";

    $pdo = connectBDD();
    $pdo->exec($sql);
}

function updateDB($table, $fields, $values, $condition, $conditionValues){
    $sql = "UPDATE " . $table . " SET ";
    for($i = 0; $i < count($fields) - 1; $i++){
        $sql .= $fields[$i] . '=' . "'" . $values[$i] . "', ";
    }
    $sql .= $fields[$i] . '=' . "'" . $values[$i] . "'" . " WHERE ";

    for($i = 0; $i < count($condition); $i++) {
        $sql .= $condition[$i] . '=' . $conditionValues[$i];
    }

    $pdo = connectBDD();
    $pdo->exec($sql);
}

function simpleSelectDB($table){
    $sql = "SELECT * FROM " . $table;
    $pdo = connectBDD();
    $pdo->exec($sql);
}

function specificSelectDB($table, $column){
    $sql = "SELECT " . $column . " FROM " . $table;
    var_dump($sql);

    $pdo = connectBDD();
    $pdo->exec($sql);
}

function rowSelectDB($table, $array1){
    $sql = "SELECT ";
    for($i = 0; $i < count($array1) - 1; $i++){
        $sql .= $array1[$i] . ", ";
    }
    $sql .= $array1[$i] . " FROM " . $table;

    $pdo = connectBDD();
    $pdo->exec($sql);
}


