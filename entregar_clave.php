<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("fuente.htm");
include("coneccion.php");
$link = conectarse();

echo "<center>";

//sacar espacios en blanco
$rut = trim($_POST['user']);

//valida que los textbox no esten en blanco.
 if(empty($user)) {
  echo "Ingrese su R.U.T. <br>";
 } else
//validar que no sean muy cortos.
 if(strlen($user) < 6) {
  echo "Nombre de Usuario demasiado Corto. <br>";
 } else
//valida que los caracteres sean correctos
 if(car_nom($user) == false) {
  echo "El nombre de usuario tiene caracteres que no están Permitidos. <br>";
 } else {

//pasar a mayúsculas
$user = strtoupper($user);

//buscar en la BD.
$result = mysql_query("SELECT pass FROM usuarios WHERE user = '$user'" ,$link);
$row = mysql_fetch_row($result);

echo "La contraseña del usuario:" . $user . " es: <br> " . $row[0];
}

echo "</center>";

//funcion ver caracteres validos.
function car_nom($validador) {
$permitidos = "abcdeabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ-'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ ";
for($i=0; $i<strlen($validador); $i++)
{
 if(strpos($permitidos, substr($validador,$i,1)) === false)
  return false;
}
return true;
}

?>
</body>
</html>
