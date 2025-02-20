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
 <center> <h1>Acceso a Usuarios registrados</h1></center>
 <center> <p>Coloca tu usuario y contraseña</p></center>

</head>

<body>

<link rel="stylesheet" href="css/Password.css">
    
<form action="login.php" method="post">
        <label for="IDUsuario">Usuario:</label>
        <input type="text" id="IDUsuario" name="IDUsuario" required>
        <br>
        <label for="Pasword">Password: </label>
        <input type="Pasword" id="Pasword" name="Pasword" required>
        <br><br>

        <center><button type="submit">Iniciar Sesión</button></center>
    </form>
    
</body>
<?php
//session_start();
$conn->close();
?>
</html>
