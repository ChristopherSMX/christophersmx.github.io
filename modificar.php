<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dpw2";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNadM</title>
        <link rel="shortcut icon" href="imagen/favicon.png" type="image/xicon">   
        <link rel="stylesheet" href="css/style.css">
        
         <style type="text/css">          
         ul, ol{
            list-style: none;
         }

         .nav li a {
            background-color: black;
            color: white;
            text-decoration:none ;
            padding: 10px 15px;
            display: block;

         }
         .nav > li{
            float:left;

         }
         


         </style>          

           
    </head>

    <body>
      <p>
        <img src="imagen/logo.png" align="left">
       </p>
      
       <h1>Mundo Creativo</h1>
       <h1>Papelería</h1>       
       
       
<div id="header">
   
<ul class="nav">   
<li><a href="index.html">Inicio</a></li>   
<li><a href="modificar.php">Modificar</a></li> 
<li><a href="modificar.php">Registrar</a></li> 
<li><a href="modificar.php">Eliminar</a></li> 
<li><a href="index.html">Salir</a></li> 

  <li><a href="indexmodificar.php">Acceso a usuarios</a></li>
</ul>
 
 </div>
 <br clear="left">
    
</head>
<body>
<link rel="stylesheet" href="css/Password.css">
<center><h1>Administración de Usuarios</h1></center>


    <form action="#" name= "formulario" method="post">       
    <label for="IDUsuario">Coloque el ID del Usuario:</label>
        <input type="text" id="IDUsusario" name="IDUsuario" required><br><br>
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required><br><br>
        <label for="ApellidoPaterno">Apellido Paterno:</label>
        <input type="text" id="ApellidoPaterno" name="ApellidoPaterno" required><br><br>
        <label for="apellidoMaterno">Apellido Materno:</label>
        <input type="text" id="ApellidoMaterno" name="ApellidoMaterno" required><br><br>
        <label for="edad">Edad:</label>
        <input type="number" id="Edad" name="Edad" required><br><br>
        <label for="Sexo">Sexo:</label>
        <input type="text" id="Sexo" name="Sexo" required><br><br>
        <label for="Email">Email:</label>
        <input type="Email" id="Email" name="Email" pattern="^[a-z0-9!#$%&‘*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required><br><br>
        
        <label for="Telefono">Telefono:</label>
        <input type="text" id="Telefono" name="Telefono" required><br><br>

        <label for="TipoUsuario">Tipo:</label>
        <input type="text" id="TipoUsuario" name="TipoUsuario" required><br><br>

        <label for="Pasword">Password: </label>
        <input type="text" id="Pasword" name="Pasword" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php


// Verificar conexión
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
    $IDUsuario = $_POST ['IDUsuario'];
    $Nombre = $_POST['Nombre'];
    $ApellidoPaterno = $_POST['ApellidoPaterno'];
    $ApellidoMaterno = $_POST['ApellidoMaterno'];
    $Edad = $_POST['Edad'];
    $Sexo = $_POST['Sexo'];      
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];  
    $TipoUsuario = $_POST['TipoUsuario']; 
    $Pasword = $_POST['Pasword']; 

// Actualizar datos en la tabla
$sql = "UPDATE USUARIOS SET Nombre = '$Nombre', ApellidoPaterno = '$ApellidoPaterno', ApellidoMaterno = '$ApellidoMaterno', Edad = '$Edad', Sexo = '$Sexo', Email = '$Email', Telefono = '$Telefono', TipoUsuario = '$TipoUsuario', Pasword = '$Pasword' WHERE IDUsuario='$IDUsuario'";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente";
} else {
    echo "Error actualizando el registro: " . $conn->error;
}



// Consulta SQL para obtener los datos de los Usuarios
$sql = "SELECT IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, Telefono, TipoUsuario, Pasword FROM Usuarios";
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>IDUsuario</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Edad</th><th>Sexo</th><th>Email</th><th>Telefono</th><th>TipoUsuario</th><th>Pasword</th><th>";
    // Mostrar datos de cada fila
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $fila["IDUsuario"]. "</td><td>" . $fila["Nombre"]. "</td><td>" . $fila["ApellidoPaterno"]. "</td><td>" . $fila["ApellidoMaterno"]. "</td><td>" . $fila["Edad"]. "</td><td>" . $fila["Sexo"]. "</td><td>". $fila["Email"]. "</td><td>". $fila["Telefono"]. "</td><td>" . $fila["TipoUsuario"]. "</td><td>" . $fila["Pasword"]. "</td><td>";
    }
    echo "</table>";
   } else {
    echo "0 resultados";
}


// Cerrar conexión
$conn->close();
?>