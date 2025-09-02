<?php

$server = 'localhost';
$dbname = 'knihyevidence';
$user = 'tomassyrovy';
$pass = 'a';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    echo "Chyba připojení: " . $e->getMessage();
}
?>

