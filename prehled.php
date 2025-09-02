<?php
include 'DbConnect.php';

$result = $conn->query("SELECT * FROM books");
$books = $result->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Přehled knih</title>
</head>
<body>
    <h1>Přehled knih</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Jméno</th>
            <th>Příjmení</th>
            <th>Název</th>
            <th>Popis</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book['id']; ?></td>
            <td><?php echo $book['isbn']; ?></td>
            <td><?php echo $book['author_firstname']; ?></td>
            <td><?php echo $book['author_lastname']; ?></td>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['description']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <p><a href="vlozit.php">Vložit knihu</a> | <a href="vyhledat.php">Vyhledat knihu</a></p>
</body>
</html>
