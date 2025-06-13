<?php
// Step 1: Connect to the MySQL database (company_db)
$pdo = new PDO("mysql:host=localhost;dbname=company_db", "root", "");

// Step 2: INSERT a new timelog
$insert = "INSERT INTO timelogs (employee_name, log_date, log_time, type)
           VALUES ('Ana Dela Cruz', CURDATE(), CURTIME(), 'IN')";
$pdo->exec($insert);
echo "🕒 Timelog inserted!<br><br>";

// Step 3: SELECT all timelogs
echo "<strong>📘 Employee Timelogs:</strong><br>";
$stmt = $pdo->query("SELECT * FROM timelogs");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} | Name: {$row['employee_name']} | Date: {$row['log_date']} | Time: {$row['log_time']} | Type: {$row['type']}<br>";
}
echo "<br>";

// Step 4: UPDATE log type (from IN to OUT)
$update = "UPDATE timelogs SET type = 'OUT' WHERE employee_name = 'Ana Dela Cruz'";
$pdo->exec($update);
echo "🔁 Log type updated!<br><br>";

// Step 5: DELETE a timelog
$delete = "DELETE FROM timelogs WHERE employee_name = 'Ana Dela Cruz'";
$pdo->exec($delete);
echo "❌ Timelog deleted!<br><br>";
?>