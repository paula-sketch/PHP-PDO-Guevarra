<?php
// Step 1: Connect to MySQL database (video_store)
$pdo = new PDO("mysql:host=localhost;dbname=video_store", "root", "");

// Step 2: INSERT a new movie
$insert = "INSERT INTO movies (title, director, release_year, available)
           VALUES ('Inception', 'Christopher Nolan', 2010, true)";
$pdo->exec($insert);
echo "🎬 Movie inserted!<br><br>";

// Step 3: SELECT all movies
echo "<strong>📺 All Movies:</strong><br>";
$stmt = $pdo->query("SELECT * FROM movies");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $status = $row['available'] ? 'Available' : 'Not Available';
    echo "ID: {$row['id']} | Title: {$row['title']} | Director: {$row['director']} | Year: {$row['release_year']} | Status: $status<br>";
}
echo "<br>";

// Step 4: UPDATE movie availability
$update = "UPDATE movies SET available = false WHERE title = 'Inception'";
$pdo->exec($update);
echo "🔄 Availability updated!<br><br>";

// Step 5: DELETE a movie
$delete = "DELETE FROM movies WHERE title = 'Inception'";
$pdo->exec($delete);
echo "❌ Movie deleted!<br><br>";
?>