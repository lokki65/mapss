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

// Obtener los datos de la solicitud POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$time = $_POST['time'];

// Preparar la consulta SQL
$sql = "INSERT INTO ubicaciones (latitude, longitude, time) VALUES ($latitude, $longitude, FROM_UNIXTIME($time))";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Ubicación guardada correctamente";
} else {
    echo "Error al guardar la ubicación: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
