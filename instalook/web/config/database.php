<?php

$host = "mysql";

$db = "instalook";

$user = "root";

$password = "root";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $password
    );


}
catch(PDOException $e){

    die("Error: " . $e->getMessage());

}
