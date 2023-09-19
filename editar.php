<?php
// ... Código de conexión a la base de datos ...
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "condominio";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST["folio"];
    $concepto = $_POST["concepto"];
    $monto = $_POST["monto"];
    $fecha = $_POST["fecha"];

    $update_sql = "UPDATE consultapago SET Concepto='$concepto', Monto='$monto', Fecha='$fecha' WHERE Folio='$folio'";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: pagosRealizados.php"); // Redirigir de nuevo a la página principal
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conn);
    }
}

// Obtener el Folio del registro a editar desde la URL
$folio = $_GET["folio"];

// Consulta SQL para seleccionar el registro específico
$select_sql = "SELECT * FROM consultapago WHERE Folio='$folio'";
$result = mysqli_query($conn, $select_sql);
$row = mysqli_fetch_assoc($result);
?>

<html>
<head>
    <title>Editar Registro</title>
</head>
<body>
    <h2>Editar Registro</h2>
    <form method="POST">
        <input type="hidden" name="folio" value="<?php echo $row["Folio"]; ?>">
        Concepto: <input type="text" name="concepto" value="<?php echo $row["Concepto"]; ?>"><br>
        Monto: <input type="text" name="monto" value="<?php echo $row["Monto"]; ?>"><br>
        Fecha: <input type="text" name="fecha" value="<?php echo $row["Fecha"]; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
