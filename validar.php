<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];



$consulta="SELECT*FROM usuarios where IDUsuario='$usuario' and Password='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$consulta_tipo = "SELECT TipoUsuario FROM usuarios WHERE IDUsuario='$usuario'";
$resultado_tipo = mysqli_query($conexion, $consulta_tipo);
$tipo_usuario = mysqli_fetch_assoc($resultado_tipo)['TipoUsuario'];

if ($tipo_usuario == 'CO') {
  header("location: sesionCo.html");
} else if ($tipo_usuario == 'AD') {
  header("location: sesionAD.html");
} else {
  // Si el tipo de usuario no es CO ni AD, mostrar un mensaje de error
  echo "<h1 class='bad'>ERROR: Tipo de usuario desconocido</h1>";
}


mysqli_free_result($resultado);
mysqli_close($conexion);
