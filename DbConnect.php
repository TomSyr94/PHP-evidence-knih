<?php
// Připojení k databázi na hostingu Endora
$server = 'mysql.endora.cz';
$dbname = 'knihyevidence';
$user = 'tomassyrovy';
$pass = 'Nevim123';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    echo "Chyba připojení: " . $e->getMessage();
}
?>
