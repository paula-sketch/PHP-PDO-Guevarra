<?php
// Step 1: Connect to MySQL database (school)
$pdo = new PDO("mysql:host=localhost;dbname=school", "root", "");

// Step 2: INSERT a new attendance record
$insert = "INSERT INTO attendance (student_name, date, status)
           VALUES ('Maria Lopez', CURDATE(), 'Present')";
$pdo->exec($insert);
echo "✅ Attendance inserted!<br><br>";

// Step 3: SELECT all attendance records
echo "<strong>📋 Attendance Records:</strong><br>";
$stmt = $pdo->query("SELECT * FROM attendance");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} | Name: {$row['student_name']} | Date: {$row['date']} | Status: {$row['status']}<br>";
}
echo "<br>";

// Step 4: UPDATE a record
$update = "UPDATE attendance SET status = 'Late' WHERE student_name = 'Maria Lopez'";
$pdo->exec($update);
echo "🔄 Attendance updated!<br><br>";

// Step 5: DELETE a record
$delete = "DELETE FROM attendance WHERE student_name = 'Maria Lopez'";
$pdo->exec($delete);
echo "❌ Attendance deleted!<br><br>";
?>