<?php

$host = "sql300.infinityfree.com";
$user = "if0_41173541";
$pass = "c2d40590z3a";
$db = "if0_41173541_teste";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

?>
