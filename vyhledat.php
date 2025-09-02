<?php
include 'DbConnect.php';

$books = [];
if ($_POST) {
    $prijmeni = addslashes($_POST['prijmeni']);
    $jmeno = addslashes($_POST['jmeno']);
    $nazev = addslashes($_POST['nazev']);
    $isbn = addslashes($_POST['isbn']);
    
    $sql = "SELECT * FROM books WHERE 1=1";
    
    if ($prijmeni) $sql .= " AND author_lastname LIKE '%$prijmeni%'";
    if ($jmeno) $sql .= " AND author_firstname LIKE '%$jmeno%'";
    if ($nazev) $sql .= " AND title LIKE '%$nazev%'";
    if ($isbn) $sql .= " AND isbn LIKE '%$isbn%'";
    
    $result = $conn->query($sql);
    $books = $result->fetchAll();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vyhledat knihu</title>
</head>
<body>
    <h1>Vyhledat knihu</h1>
    
    <form method="post">
        <p>Příjmení autora: <input type="text" name="prijmeni"></p>
        <p>Křestní jméno: <input type="text" name="jmeno"></p>
        <p>Název knihy: <input type="text" name="nazev"></p>
        <p>ISBN: <input type="text" name="isbn"></p>
        <p><button type="submit">Vyhledat</button></p>
    </form>
    
    <?php if ($_POST): ?>
        <h2>Výsledky vyhledávání</h2>
        <?php if ($books): ?>
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
                    <td><?php echo htmlspecialchars($book['id']); ?></td>
                    <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                    <td><?php echo htmlspecialchars($book['author_firstname']); ?></td>
                    <td><?php echo htmlspecialchars($book['author_lastname']); ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['description']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Žádné knihy nebyly nalezeny.</p>
        <?php endif; ?>
    <?php endif; ?>
    
    <p><a href="vlozit.php">Vložit knihu</a> | <a href="prehled.php">Přehled knih</a></p>
</body>
</html>
