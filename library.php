<?php
// Step 1: Connect to MySQL database
$pdo = new PDO("mysql:host=localhost;dbname=library", "root", "");

// Step 2: INSERT a new book
$insert = "INSERT INTO books (title, author, published_year, genre)
           VALUES ('Percy Jackson', 'Rick Riordan', 2005, 'Adventure')";
$pdo->exec($insert);
echo "✅ Book inserted!<br><br>";

// Step 3: SELECT all books
echo "<strong>📚 All Books:</strong><br>";
$stmt = $pdo->query("SELECT * FROM books");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} | Title: {$row['title']} | Author: {$row['author']} | Year: {$row['published_year']} | Genre: {$row['genre']}<br>";
}
echo "<br>";

// Step 4: UPDATE a book
$update = "UPDATE books SET genre = 'Mythology' WHERE title = 'Percy Jackson'";
$pdo->exec($update);
echo "🔄 Book updated!<br><br>";

// Step 5: DELETE a book
$delete = "DELETE FROM books WHERE title = 'Percy Jackson'";
$pdo->exec($delete);
echo "❌ Book deleted!<br><br>";
?>