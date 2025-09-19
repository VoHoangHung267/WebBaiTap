<?php
// db.php - PostgreSQL Configuration
$host = "localhost";
$port = "5432"; // Default PostgreSQL port
$dbname = "web_form";
$username = "postgres"; // Default PostgreSQL username
$password = "123456"; // Thay bằng password PostgreSQL của bạn

try {
    // PDO connection string for PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
    echo "<!-- Database connected successfully -->";
    
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Alternative: Using pg_connect (if you prefer procedural style)
/*
$connection_string = "host=$host port=$port dbname=$dbname user=$username password=$password";
$pg_conn = pg_connect($connection_string);

if (!$pg_conn) {
    die("PostgreSQL connection failed");
}
*/
?>