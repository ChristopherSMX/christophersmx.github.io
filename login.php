<?php
session_start();
include 'conexion.php'; // Asegúrate de incluir el archivo de conexión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $IDUsuario = $_POST['IDUsuario'];
   $Pasword = $_POST['Pasword'];

   
   // Verificar la conexión
   if ($conn->connect_error) {
       die("Conexión fallida: " . $conn->connect_error);
   }

   $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$IDUsuario = $_POST['IDUsuario'];
$Pasword = $_POST['Pasword'];

// Consulta para verificar usuario y contraseña
$sql = "SELECT TipoUsuario FROM USUARIOS WHERE IDUsuario = ? AND Pasword = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $IDUsuario, $Pasword);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($TipoUsuario);
    $stmt->fetch();

    // Redirigir según el tipo de usuario
    if ($TipoUsuario == 'PP') {
        header("Location: modificar.php");
    } elseif ($TipoUsuario == 'CP') {
        header("Location: pedido.php");
    } else {
        echo "Tipo de usuario no reconocido.";
    }
} else {
    echo "Usuario o contraseña incorrectos.";
}
}


$stmt->close();
$conn->close();
?>