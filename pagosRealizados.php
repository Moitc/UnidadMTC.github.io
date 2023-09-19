<!DOCTYPE html>
<html>
<head>
    <title>Consulta de pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
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

        .container {
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Consulta de pago</h1>
    </div>

    <div class="menu">
        <a href="inicio.html">Inicio</a>
    </div>

    <div class="container">
        <h2>Tabla de Consultapago</h2>
        <table>
            <tr>
                <th>Folio</th>
                <th>Concepto</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
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

            // Mostrar los datos en la tabla
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["Folio"] . "</td>";
                echo "<td>" . $row["Concepto"] . "</td>";
                echo "<td>" . $row["Monto"] . "</td>";
                echo "<td>" . $row["Fecha"] . "</td>";
                echo "<td>";
                echo "<a href='editar.php?folio=" . $row["Folio"] . "'>Editar</a> ";
                echo "<a href='eliminar.php?folio=" . $row["Folio"] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }

            // Cerrar la conexión
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>

