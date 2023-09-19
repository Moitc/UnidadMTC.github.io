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

// Obtener el valor del campo "Folio" enviado desde la página anterior
$folio = $_GET["folio"];

// Consultar los datos del registro correspondiente
$sql = "SELECT * FROM consultapago WHERE Folio = $folio";
$result = mysqli_query($conn, $sql);

// Mostrar el formulario para editar los datos del registro
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "<form action='guardar_registro.php' method='post'>";
  echo "<input type='hidden' name='folio' value='" . $row["Folio"] . "'>";
  echo "Concepto: <input type='text' name='concepto' value='" . $row["Concepto"] . "'><br>";
  echo "Monto: <input type='text' name='monto' value='" . $row["Monto"] . "'><br>";
  echo "Fecha: <input type='date' name='fecha' value='" . $row["Fecha"] . "'><br>";
  echo "<input type='submit' value='Guardar'>";
  echo "</form>";
} else {
  echo "No se encontró el registro.";
}

// Cerrar la conexión
mysqli_close($conn);
?>