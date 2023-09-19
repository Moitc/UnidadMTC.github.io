<!DOCTYPE html>
<html>
<head>
    <title>Tabla Consultapago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .menu {
            background-color: #333;
            overflow: hidden;
        }

        .menu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .menu a:hover {
            background-color: #ddd;
            color: black;
        }

        .table-container {
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="sesionCo.html">Inicio</a>
    </div>

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

    // Consultar los datos de la tabla "consultapago"
    $sql = "SELECT * FROM consultapago";
    $result = mysqli_query($conn, $sql);

    // Mostrar los datos en una tabla HTML
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr><th>Folio</th><th>Concepto</th><th>Monto</th><th>Fecha</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["Folio"] . "</td><td>" . $row["Concepto"] . "</td><td>" . $row["Monto"] . "</td><td>" . $row["Fecha"] . "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='table-container'>No se encontraron resultados.</div>";
    }

    // Cerrar la conexión
    mysqli_close($conn);
    ?>
</body>
</html>
