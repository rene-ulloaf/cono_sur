<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("fuente.htm");
include("coneccion.php");
$link = conectarse();

echo "<center>";

$usuario = trim($_COOKIE['usuario']);
$pass = trim($_POST['pass']);
$pass2 = trim($_POST['pass2']);

//valida que los textbox no esten en blanco.
 if(empty($pass)) {
  echo "Ingrese la nueva Contraseña <br>";
  echo "<a href='frame_opciones' target='_top'> Atrás </a>";
 } else
 if(empty($pass2)) {
  echo "Repita la contraseña <br>";
  echo "<a href='frame_opciones' target='_top'> Atrás </a>";
 } else
//validar que no sean muy cortos.
 if(strlen($pass) < 6) {
  echo "Contraseña demasiado Corta. <br>";
  echo "<a href='frame_opciones' target='_top'> Atrás </a>";
 } else
 if($pass != $pass2) {
  echo "Laa contraseñaa deben ser iguales. <br>";
  echo "<a href='frame_opciones' target='_top'> Atrás </a>";
 } else {

//modificar contraseña
$Ssql = "UPDATE usuarios SET pass='$pass' WHERE user = '$usuario'";
$result = mysql_query($Ssql);

echo "Contraseña Modificada. <br> Nueva Contraseña: " . $pass;
echo "<br> <a href='frame_opciones' target='_top'> Atrás </a>";
} echo "</center>";
?>

</body>
</html>