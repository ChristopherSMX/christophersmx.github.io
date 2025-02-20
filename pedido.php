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
<li><a href="index.html">Principal</a></li>   
  <li><a href="registro.php">Registrarse</a></li> 
  <li><a href="modificar.php">Acceso a usuarios</a></li>
</ul>
 
 </div>
 <br clear="left">
    
</head>
<body>
<link rel="stylesheet" href="css/Password.css">
<center><h1>Registra tu pedido</h1></center>
<center><p>completa tu pedido</p></center>


    <form action="#" name= "formulario" method="post">       
         
        
        <label for="Cantidad">Cantidad:</label>
        <input type="text" id="Cantidad" name="Cantidad" required><br><br>
        <label for="Material">Material:</label>
        <input type="text" id="Material" name="Material" required><br><br>       
    
        <label for="Precio">Precio:</label>
        <input type="text" id="Precio" name="Precio" required><br><br>
        <label for="Medida">Medida:</label>
        <input type="text" id="Medida" name="Medida" required><br><br>
        
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
    $Material = $_POST ['Material'];
    $Precio = $_POST ['Precio'];
    $Medida = $_POST ['Medida'];
    

 // Preparar y ejecutar la consulta
 $sql = "INSERT INTO Pedidos (Cantidad, Material, Precio, Medida, ) VALUES ('$IDUsuario','$Cantidad', '$Material', '$Precio', '$Media' )";
 if ($conn->query($sql) === TRUE) {
     echo "Registro insertado exitosamente.";
} else {
 
 echo "Error: No se registro su pedido";

}





// Cerrar conexión
$conn->close();
?>