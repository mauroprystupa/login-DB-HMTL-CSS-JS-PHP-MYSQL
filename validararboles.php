<?php
include('arbolesdb.php');
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;


$conex = mysqli_connect('localhost:3307', 'root', '123', 'arboles');

$consulta = "SELECT*FROM usuario where usuario='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conex, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {

  header("location:home.php");
} else {
?>
  <?php
  include("index.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conex);