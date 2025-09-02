<?php

$server = 'mysql.endora.cz';
$dbname = 'knihyevidence';
$user = 'web123_tomassyrovy';
$pass = 'Nevim123';

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    echo "Chyba připojení: " . $e->getMessage();
}
?>
