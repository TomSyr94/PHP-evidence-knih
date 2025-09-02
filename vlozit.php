<?php
include 'DbConnect.php';

if ($_POST) {
    $isbn = addslashes($_POST['isbn']);
    $jmeno = addslashes($_POST['jmeno']);
    $prijmeni = addslashes($_POST['prijmeni']);
    $nazev = addslashes($_POST['nazev']);
    $popis = addslashes($_POST['popis']);
    
    if ($isbn && $jmeno && $prijmeni && $nazev) {
        $sql = "INSERT INTO books (isbn, author_firstname, author_lastname, title, description) VALUES ('$isbn', '$jmeno', '$prijmeni', '$nazev', '$popis')";
        $conn->exec($sql);
        echo "<p>Kniha byla úspěšně vložena!</p>";
    } else {
        echo "<p>Vyplňte všechna povinná pole!</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vložit knihu</title>
</head>
<body>
    <h1>Vložit novou knihu</h1>
    
    <form method="post">
        <p>ISBN: <input type="text" name="isbn" required></p>
        <p>Křestní jméno: <input type="text" name="jmeno" required></p>
        <p>Příjmení: <input type="text" name="prijmeni" required></p>
        <p>Název knihy: <input type="text" name="nazev" required></p>
        <p>Popis:<br><textarea name="popis"></textarea></p>
        <p><button type="submit">Vložit knihu</button></p>
    </form>
    
    <p><a href="prehled.php">Přehled knih</a> | <a href="vyhledat.php">Vyhledat knihu</a></p>
</body>
</html>
