<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");
include("coneccion.php");
$link=conectarse();

//sacar los espacios en blanco
$cod_hotel = trim($_POST['cod_hotel']);
$nombre = trim($_POST['nombre']);
$ciudad = trim($_POST['ciudad']);
$comuna = trim($_POST['comuna']);
$direccion = trim($_POST['direccion']);
$dif = trim($_POST['dif']);
$fono = trim($_POST['fono']);
$dif_fax = trim($_POST['dif_fax']);
$fax = trim($_POST['fax']);
$email = trim($_POST['email']);
$email2 = trim($_POST['email2']);
$nombre_director = trim($_POST['nombre_director']);

//busca los hoteles y ve si estan guardados.
$aux = true;
$result = mysql_query("SELECT cod_hotel FROM hoteles",$link);
while($row = mysql_fetch_row($result)) {
 if($cod_hotel == $row[0]) {
  $aux = false;
  break;
 }
 else
  $aux = true;
}

$validador = $cod_hotel;
//Valida que el hotel ya exista o esta vacio.
echo "<div align='center'>";
if($aux != true)
{
echo "Hotel " . $cod_hotel . " ya existe. <br>";
echo "<a href = 'frame_opciones.htm' target='_top'> Atrás </a>";
}
else {

//valida que los textbox no esten en blanco.
 if(empty($cod_hotel)) {
  echo "Ingrese Código del Hotel. <br>";
  $aux = false; }
 if(empty($nombre)) {
  echo "Ingrese el Nombre del Hotel. <br>";
  $aux = false; }
 if(empty($ciudad)) {
  echo "Ingrese la ciudad a que pertenece el Hotel. <br>";
  $aux = false; }
 if(empty($direccion)) {
  echo "Ingrese la dirección del Hotel. <br>";
  $aux = false; }
 if(empty($nombre_director)) {
  echo "Ingrese el Nombre del Director del Hotel. <br>";
  $aux = false; }

//validar que no sean muy cortos.
 if(strlen($cod_hotel) < 4) {
  echo "Código del Hotel demasiado Corto. <br>";
  $aux = false; }
 if(strlen($nombre) < 3) {
  echo "Nombre del Hotel demasiado Corto. <br>";
  $aux = false; }
 if(strlen($ciudad) < 3) {
  echo "EL Nombre de la Ciudad demasiado Corta. <br>";
  $aux = false; }
 if(strlen($comuna) < 3) {
  echo "El Nombre de la Comuna demasiado Corta. <br>";
  $aux = false; }
 if(strlen($direccion) < 3) {
  echo "Dirección demasiado Corto. <br>";
  $aux = false; }
 if(strlen($dif) < 2 || strlen($fono) < 6) {
  echo "Teléfono demasiado Corto. <br>";
  $aux = false; }
 if(strlen($dif_fax) < 2 || strlen($fax) < 6) {
  echo "Fax demasiado Corto. <br>";
  $aux = false; }
 if(strlen($email) < 6 || strlen($email2) < 7) {
  echo "e-mail Inválido. <br>";
  $aux = false; }
 if(strlen($nombre_director) < 6) {
  echo "Nombre del Director del Hotel demasiado Corto. <br>";
  $aux = false; }

//valida que los caracteres sean correctos
 if(car_fon($validador) == false) {
  echo "EL Código del Hotel tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $nombre;
 if(car_nom($validador) == false) {
  echo "EL nombre tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $ciudad;
 if(car_nom($validador) == false) {
  echo "El nombre de la Ciudad tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $comuna;
 if(car_nom($validador) == false) {
  echo "El Nombre de la Comuna tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $direccion;
 if(val_mail($validador) == false) {
  echo "La Dirección tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $dif;
 if(car_fon($validador) == false) {
  echo "El Código del Teléfono debe tener solamente números. <br>";
  $aux = false; }
  $validador = $fono;
 if(car_fon($validador) == false) {
  echo "El Número de Teléfono debe tener solamente números. <br>";
  $aux = false; }
  $validador = $dif_fax;
 if(car_fon($validador) == false) {
  echo "El código del Fax debe tener solamente números. <br>";
  $aux = false; }
  $validador = $fax;
 if(car_fon($validador) == false) {
  echo "El fax debe tener solamente números. <br>";
  $aux = false; }
  $validador = $email;
 if(val_mail($validador) == false)
  $email = false;
  $validador = $email2;
 if(val_mail($validador) == false || $email == false) {
  echo "El e-mail tiene Caracteres inválidos. <br>";
  $aux = false; }
  $validador = $nombre_director;
 if(car_nom($validador) == false) {
  echo "El nombre del Directoe tiene caracteres que no están Permitidos. <br>";
  $aux = false; }

 //se pasan todos los datos a datos_personales si estan malos.
 if($aux != true)
  {
   echo "<p> <font size='+1'> Presione Atrás para corregir los errores </font> </p>";
   echo "<form method='post' action='agregar_hotel.php' >";
   echo "<input type='hidden' name='cod_hotel' value='$cod_hotel'>";
   echo "<input type='hidden' name='nombre' value='$nombre'>";
   echo "<input type='hidden' name='ciudad' value='$ciudad'>";
   echo "<input type='hidden' name='comuna' value='$comuna'>";
   echo "<input type='hidden' name='direccion' value='$direccion'>";
   echo "<input type='hidden' name='dif' value='$dif'>";
   echo "<input type='hidden' name='fono' value='$fono'>";
   echo "<input type='hidden' name='dif_fax' value='$dif_fax'>";
   echo "<input type='hidden' name='fax' value='$fax'>";
   echo "<input type='hidden' name='email' value='$email'>";
   echo "<input type='hidden' name='email2' value='$email2'>";
   echo "<input type='hidden' name='nombre_director' value='$nombre_director'>";
   echo "<input type='submit' value='Atrás' name='atras' />";
   echo "</form>";
  }
 else {

//concatenar.
 $fono=$dif . "-" . $fono;
 $fax=$dif_fax . "-" . $fax;
 $email=$email . "@" . $email2;

 if($_POST['tipo'] = 'Formule')
  $tipo = 'Formule 1';
 else
  $tipo = $_POST['tipo'];

//pasar a mayúsculas
 $tipo=strtoupper($tipo);
 $nombre=strtoupper($nombre);
 $pais=strtoupper($_POST['pais']);
 $ciudad=strtoupper($ciudad);
 $comuna=strtoupper($comuna);
 $direccion=strtoupper($direccion);
 $email=strtoupper($email);
 $nombre_director=strtoupper($nombre_director);

//Grabar BD
 $Ssql="INSERT INTO hoteles (cod_hotel,tipo,nombre_hotel,pais,ciudad,comuna,direccion,telefono,fax,email,director)".
	   "VALUES ('$cod_hotel','$tipo','$nombre','$pais','$ciudad','$comuna','$direccion','$fono','$fax','$email','$nombre_director')";
 $result = mysql_query($Ssql,$link);

 echo "Datos del Hotel Guardados con Exito.";
 echo "<br> <a href='frame_opciones' target='_top'> Volver </a>";
 echo "</form> </div>";
 } //else pasar datos si estan malos.
} //else rut existe.

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

//funcion validar caracteres telefono.
function car_fon($validador) {
$permitidos = "0123456789-";
for($i=0; $i<strlen($validador); $i++) {
 if(strpos($permitidos, substr($validador,$i,1)) === false)
  return false;
}
return true;
}

//funcion validar mail.
function val_mail($validador) {
$permitidos = "abcdeabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789-'_. ";
for($i=0; $i<strlen($validador); $i++) {
 if(strpos($permitidos, substr($validador,$i,1)) === false)
  return false;
}
return true;
}
?>

</body>
</html>