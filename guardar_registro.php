<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "condominio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los valores enviados desde el formulario de edición
$folio = $_POST["folio"];
$concepto = $_POST["concepto"];
$monto = $_POST["monto"];
$fecha = $_POST["fecha"];

// Actualizar los datos del registro en la base de datos
$sql = "UPDATE consultapago SET Concepto = '$concepto', Monto = '$monto', Fecha = '$fecha' WHERE Folio = $folio";
if (mysqli_query($conn, $sql)) {
  echo "Registro actualizado correctamente.";
} else {
  echo "Error al actualizar el registro: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>