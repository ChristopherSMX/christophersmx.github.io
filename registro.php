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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Papeleria</title>
        <link rel="shortcut icon" href="imagen/favicon.png" type="image/xicon">   
        
        
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
     <section>
     
      <p>
        <img src="imagen/logo.png" align="left">
       </p>
      
       <h1>Mundo Creativo</h1>
       <h1>Papelería</h1>
       </p>      
       
        
<ul class="nav">
   
  <li><a href="index.html">Principal</a></li>   
  <li><a href="registro.php">Registrarse</a></li> 
  <li><a href="acceso.php">Acceso a usuarios</a></li>
  
  </section>   
   
</ul>
 </div>
 <br clear="left">
 <center> <h1>Completa tu información</h1></center>
 <center> <p>Todos los campos son requeridos</p></center>

</head>

<body>

<link rel="stylesheet" href="css/Password.css">
    
    <form action="#" method="post">
        <label for="IDUsuario">ID de Usuario 4 Digitos:</label>
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
        <select id="Sexo" name="Sexo" required>
            <option value="">Seleccione...</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
        <br><br>

        <label for="Email">Email:</label>
        <input type="Email" id="Email" name="Email" pattern="^[a-z0-9!#$%&‘*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required><br><br>
        
        <label for="Telefono">Telefono:</label>
        <input type="text" id="Telefono" name="Telefono" required><br><br>

        <label for="TipoUsuario">Tipo de Usuario:</label>
        <select id="TipoUsuario" name="TipoUsuario" required>
            <option value="">Seleccione...</option>
            <option value="CP">CP</option>            
        </select>
        <br><br>
        <label for="Pasword">Password: </label>
        <input type="text" id="Pasword" name="Pasword" pattern="(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}"
        title="La contraseña debe tener al menos 8 caracteres, incluyendo letras, números y al menos un carácter especial (@$!%*?&)" 
               required><br><br>
         


        <input type="submit" value="Enviar">
    </form>
    
</body>
<?php

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Obtener el iduser del formulario
$IDUsuario = $_POST['IDUsuario'];

// Verificar si el iduser ya existe
$sql = "SELECT * FROM USUARIOS WHERE IDUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $IDUsuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo"El ID de usuario ya existe. Por favor, elija otro.";
       

} else {
// Insertar datos en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDUsuario =$_POST ['IDUsuario'];
    $Nombre = $_POST['Nombre'];
    $ApellidoPaterno = $_POST['ApellidoPaterno'];
    $ApellidoMaterno = $_POST['ApellidoMaterno'];
    $Edad = $_POST['Edad'];
    $Sexo = $_POST['Sexo'];      
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];  
    $TipoUsuario = $_POST['TipoUsuario']; 
    $Pasword = $_POST['Pasword']; 

    // Preparar y ejecutar la consulta
        $sql = "INSERT INTO USUARIOS (IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, Telefono, TipoUsuario, Pasword) VALUES ('$IDUsuario','$Nombre', '$ApellidoPaterno', '$ApellidoMaterno', '$Edad', '$Sexo', '$Email', '$Telefono', '$TipoUsuario', '$Pasword' )";
        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado exitosamente.";
    } else {
        // Verificar si el error es por ID duplicado
     if ($conn->errno == 1062) {
        echo "Error: El ID ya existe. Por favor, elige otro ID.";
    
    }
}

}    
       
        
        
    
}

// Mostrar datos en una tabla
$sql = "SELECT IDUsuario, Nombre, Edad, Email  FROM USUARIOS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Edad</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["IDUsuario"]. "</td><td>" . $row["Nombre"]. "</td><td>" . $row["Edad"]. "</td><td>";
    }
    echo "</table>";
 } else {
    echo "0 resultados";
 }
 
$conn->close();
?>
</html>
