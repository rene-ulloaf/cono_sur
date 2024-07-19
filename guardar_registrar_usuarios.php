<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<?php
include("fuente.htm");
include("coneccion.php");
$link = conectarse();

//sacar espacios en blanco
$rut = trim($_POST['rut']);
$verificador = trim($_POST['verificador']);
$user = trim($_POST['user']);
$pass = trim($_POST['pass']);
$pass2 = trim($_POST['pass2']);

//cambia a mayuscula si es k.
if ($verificador == 'k')
 $verificador = strtoupper($verificador);

//pasar a mayúsculas usuario
$user = strtoupper($user);

//busca los ruts y ve si estan guardados.
$rut2 = $rut . "-" . $verificador;
$aux = true;
$result = mysql_query("SELECT rut FROM usuarios",$link);
while($row = mysql_fetch_row($result)) {
 if($rut2 == $row[0]) {
  $aux = false;
  break;
 }
 else
  $aux = true;
}

$validador = $nombres;
//Valida que el rut ya exista o esta vacio.
echo "<div align='center'>";
if($aux != true)
{
echo "Usuario " . $rut2 . " ya existe. <br>";
echo "<a href = 'frame_opciones.htm' target='_top'> Atrás </a>";
}
else {

//valida que los textbox no esten en blanco.
 if(empty($rut)) {
  echo "Ingrese su R.U.T. <br>";
  $aux = false; }
 if(empty($verificador) && $verificador != 0) {
  echo "Ingrese el dígito Verificador del R.U.T. <br>";
  $aux = false; }
 if(empty($user)) {
  echo "Ingrese el nombre de usuario. <br>";
  $aux = false; }
 if(empty($pass)) {
  echo "Ingrese su contraseña. <br>";
  $aux = false; }
 if(empty($pass2)) {
  echo "es necesario que llene el campo de: <br> repitir la contraseña. <br>";
  $aux = false; }

//validar que no sean muy cortos.
 if(strlen($user) < 6) {
  echo "Nombre de Usuaario demasiado Corto. <br>";
  $aux = false; }
 if(strlen($pass) < 6) {
  echo "Password demasiado Corto. <br>";
  $aux = false; }

//valida que los pass sean iguales.
 if($pass != $pass2) {
  echo "Las contraseñas no son las mismas. Debe ingresar la misma contraseña en ambos cuadros. <br>";
  $aux = false; }

//valida que el rut sea correcto
 if(validar_rut($rut) != $verificador) {
  echo "Ingrese su R.U.T. Correctamente. <br>";
  $aux = false; }

 //valida que los caracteres sean correctos
 if(car_nom($user) == false) {
  echo "El nombre de usuario tiene caracteres que no están Permitidos. <br>";
  $aux = false; }

 //ve si el nombre de usuario esta registrado
 $result = mysql_query("SELECT user FROM usuarios", $link);
 
 while($row = mysql_fetch_array($result))
 {
  if($user == $row[user])
  {
   echo "Lo siento el nombre de usuario ya ha sido escogido por otro usuario, intente con otro. <br>";
   $aux = false;
   break;
  }
 }
 

//se pasan todos los datos a datos_personales si estan malos.
 if($aux != true)
  {
   echo "<p> <font size='+1'> Presione Atrás para corregir los errores </font> </p>";
   echo "<form method='post' action='registrar_usuarios.php' >";
   echo "<input type='hidden' name='rut' value='$rut'>";
   echo "<input type='hidden' name='verificador' value='$verificador'>";
   echo "<input type='hidden' name='user' value='$user'>";
   echo "<input type='submit' value='Atrás' name='atras' />";
   echo "</form>";
  }
 else {

//concatenar.
 $rut = $rut . "-" . $verificador;

//grabar BD

$Ssql = "INSERT INTO usuarios (user_id,rut,user,pass) VALUES ('$_POST[id]','$rut','$user','$pass')";
$result = mysql_query($Ssql,$link);

echo "Usuario Registrado Correctamente.";
 }
}

//funcion validar rut.
function validar_rut($rut) {
 $cont = 2;
 $suma = 0;
 $aux = strlen($rut);
 for($i = 0; $i < $aux; $i++)
  $rutito[] = substr("$rut", $i, 1);
 for($i = ($aux - 1); $i >= 0; $i--)
 {
  $rutito[$i] = $rutito[$i] * $cont;
  $suma = $rutito[$i] + $suma;
  $cont ++;
  if ($cont > 7)
   $cont = 2;
 }
 $suma = $suma % 11;
 $suma = 11 - $suma;
 if ($suma == 11)
  $digito = 0;
 if ($suma == 10)
  $digito = 'K';
 else
  $digito = $suma;
  return $digito;
}

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