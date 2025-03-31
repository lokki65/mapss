<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto si es necesario
$dbname = "ubicaciones_db"; // Nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar la última ubicación registrada
$sql = "SELECT latitude, longitude FROM ubicaciones ORDER BY time DESC LIMIT 1";
$result = $conn->query($sql);

// Verificar si se obtuvo una ubicación
if ($result->num_rows > 0) {
    // Recuperar la ubicación
    $row = $result->fetch_assoc();
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];

    // Devolver los datos en formato JSON
    echo json_encode(['latitude' => $latitude, 'longitude' => $longitude]);
} else {
    echo json_encode(['latitude' => null, 'longitude' => null]);
}

// Cerrar la conexión
$conn->close();
?>
