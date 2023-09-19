<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "condominio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellidop = $_POST['ApellidoP'];
$apellidom = $_POST['ApellidoM'];
$Depa = $_POST['Departamento'];
$Tipo = $_POST['TipoUsuario'];
$Contraseña = $_POST['Contraseña'];
$ConfiContraseña = $_POST['ConfiContraseña'];

if (empty($nombre) || empty($apellidop) || empty($apellidom) || empty($Depa) || empty($Tipo) || empty($Contraseña)) {
    echo "Error: Todos los campos son obligatorios";
} 
 else if ($Contraseña != $ConfiContraseña) {
    echo "Error: Las contraseñas no coinciden";
} 
else {

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (Nombre, ApellidoPaterno,ApellidoMaterno,Departamento,TipoUsuario, Password) VALUES ('$nombre', '$apellidop', '$apellidom','$Depa','$Tipo','$Contraseña')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
    header("location:inicioSesion.html");
} else {
    echo "Error al insertar los datos: " . $conn->error;
}
}

// Cerrar la conexión
$conn->close();
?>