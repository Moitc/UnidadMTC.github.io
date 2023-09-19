<?php
// ... Código de conexión a la base de datos ...
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "condominio";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Obtener el Folio del registro a eliminar desde la URL
$folio = $_GET["folio"];

// Consulta SQL para eliminar el registro
$delete_sql = "DELETE FROM consultapago WHERE Folio='$folio'";
if (mysqli_query($conn, $delete_sql)) {
    header("Location: pagosRealizados.php"); // Redirigir de nuevo a la página principal
    exit();
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conn);
}
?>
