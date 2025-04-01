
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventariotrabajo";
$charset = 'utf8mb4';

// Conexión con mysqli
$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    error_log("Error de conexión con mysqli: " . mysqli_connect_error());
    die("Error de conexión a la base de datos con mysqli");
}

// Conexión con PDO
try {
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    error_log("Error de conexión con PDO: " . $e->getMessage());
    die("Error de conexión a la base de datos con PDO");
}
// if (!$conexion) {
//     die("Conexión fallida: " . mysqli_connect_error());
// }
// if ($conexion) {
//     echo "Conexión exitosa!";
// }
