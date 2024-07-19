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

//sacar los espacios en blanco.
$rut=trim($_POST['rut']);
$verificador=trim($_POST['verificador']);
$nombres=trim($_POST['nombres']);
$apellido1=trim($_POST['apellido1']);
$apellido2=trim($_POST['apellido2']);
$fono1=trim($_POST['fono1']);
$dif1=trim($_POST['dif1']);
$fono2=trim($_POST['fono2']);
$dif2=trim($_POST['dif2']);
$fono3=trim($_POST['fono3']);
$dif3=trim($_POST['dif3']);
$email=trim($_POST['email']);
$email2=trim($_POST['email2']);

//cambia a mayuscula si es k.
if ($verificador == 'k')
 $verificador = strtoupper($verificador);

//busca los ruts y ve si estan guardados.
$rut2 = $rut . "-" . $verificador;
$aux = true;
$result = mysql_query("SELECT rut FROM datos_personales",$link);
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
echo "<a href = 'datos_personales.php'> Atrás </a>";
}
else {

//valida que los textbox no esten en blanco.
 if(empty($rut)) {
  echo "Ingrese su R.U.T. <br>";
  $aux = false; }
 if(empty($verificador) && $verificador != 0) {
  echo "Ingrese el dígito Verificador del R.U.T. <br>";
  $aux = false; }
 if(empty($nombres)) {
  echo "Ingrese su Nombre. <br>";
  $aux = false; }
 if(empty($apellido1)) {
  echo "Ingrese su 1º Apellido. <br>";
  $aux = false; }
 if(empty($apellido2)) {
  echo "Ingrese su 2º Apellido. <br>";
  $aux = false; }
 if(empty($dif1) && $dif1 != 0) {
  echo "Ingrese el Código del Teléfono.";
  $aux = false; }
 if(empty($fono1) && $fono1 != 0) {
  echo "Ingrese su Teléfono. <br>";
  $aux = false; }

 //validar que no sean muy cortos.
 if(strlen($nombres) < 3) {
  echo "Nombre demasiado Corto. <br>";
  $aux = false; }
 if(strlen($apellido1) < 3) {
  echo "1º Apellido demasiado Corto. <br>";
  $aux = false; }
 if(strlen($apellido2) < 3) {
  echo "2º Apellido demasiado Corto. <br>";
  $aux = false; }
 if(strlen($dif1) < 2 || strlen($fono1) < 6) {
  echo "Número de teléfono y/o código demasiado Corto. <br>";
  $aux = false; }
 if(strlen($email) < 6 || strlen($email2) < 7) {
  echo "e-mail Inválido. <br>";
  $aux = false; }

 //valida que el rut sea correcto
 if(validar_rut($rut) != $verificador) {
  echo "Ingrese su R.U.T. Correctamente. <br>";
  $aux = false; }

 //valida que los caracteres sean correctos
 if(car_nom($validador) == false) {
  echo "El nombre tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $apellido1;
 if(car_nom($validador) == false) {
  echo "El 1º Apellido tiene caracteres que no están Permitidos. <br>";
  $aux = false; }
  $validador = $apellido2;
 if(car_nom($validador) == false) {
  echo "El 2º Apellido tiene caracteres que no están permitidos. <br>";
  $aux = false; }
  $validador = $dif1;
 if(car_fon($validador) == false) {
  echo "El Código del telefono debe tener solamente Números. <br>";
  $aux = false; }
  $validador = $fono1;
 if(car_fon($validador) == false) {
  echo "El Número de teléfono debe tener solamente Números. <br>";
  $aux = false; }
  $validador = $email;
 if(val_mail($validador) == false)
  $email = false;
  $validador = $email2;
 if(val_mail($validador) == false || $email == false) {
  echo "El e-mail tiene Caracteres inválidos. <br>";
  $aux = false; }

 //se pasan todos los datos a datos_personales si estan malos.
 if($aux != true)
  {
   echo "<p> <font size='+1'> Presione Atrás para corregir los errores </font> </p>";
   echo "<form method='post' action='datos_personales.php' >";
   echo "<input type='hidden' name='rut' value='$rut'>";
   echo "<input type='hidden' name='verificador' value='$verificador'>";
   echo "<input type='hidden' name='nombres' value='$nombres'>";
   echo "<input type='hidden' name='apellido1' value='$apellido1'>";
   echo "<input type='hidden' name='apellido2' value='$apellido2'>";
   echo "<input type='hidden' name='fono1' value='$fono1'>";
   echo "<input type='hidden' name='dif1' value='$dif1'>";
   echo "<input type='hidden' name='fono2' value='$fono2'>";
   echo "<input type='hidden' name='dif2' value='$dif2'>";
   echo "<input type='hidden' name='fono3' value='$fono3'>";
   echo "<input type='hidden' name='dif3' value='$dif3'>";
   echo "<input type='hidden' name='email' value='$email'>";
   echo "<input type='hidden' name='email2' value='$email2'>";
   echo "<input type='submit' value='Atrás' name='atras' />";
   echo "</form>";
  }
 else {

 //concatenar.
 $rut=$rut . "-" . $verificador;
 $apellidos=$apellido1 . " " . $apellido2;
 $nacimiento=$_POST['dia'] . "-" . $_POST['mes'] . "-" . $_POST['año'];
 $fono1=$dif1 . "-" . $fono1;
 $fono2=$dif2 . "-" . $fono2;
 $fono3=$dif3 . "-" . $fono3;
 $email=$email . "@" . $email2;

 //pasar a mayúsculas
 $rut=strtoupper($rut);
 $nombres=strtoupper($nombres);
 $apellidos=strtoupper($apellidos);
 $nacionalidad=strtoupper($_POST['nacionalidad']);
 $nacimiento=strtoupper($nacimiento);
 $estado=strtoupper($_POST['estado']);
 $escolaridad=strtoupper($_POST['escolaridad']);
 $email=strtoupper($email);

 //Grabar BD

 //para los telefonos
 $contador=0;
 $result=mysql_query("SELECT max(id_fono) FROM telefono",$link);
 $row=mysql_fetch_row($result);
 $contador = $row[0] + 1;

 $Ssql="INSERT INTO telefono (id_fono,fono) VALUES ('$contador','$fono1')";
 $result = mysql_query($Ssql,$link);

 $validador = $fono2;
 if(!empty($dif2) && !empty($fono2) && strlen($fono2) > 9 && car_fon($validador) == true)
 {
  $Ssql="INSERT INTO telefono (id_fono,fono) VALUES ('$contador','$fono2')";
  $result = mysql_query($Ssql,$link);
 }
 $validador = $fono3;
 if(!empty($dif3) and !empty($fono3) && strlen($fono3) > 9 && car_fon($validador) == true)
 {
  $Ssql="INSERT INTO telefono (id_fono,fono) VALUES ('$contador','$fono3')";
  $result = mysql_query($Ssql,$link);
 }

 $Ssql="INSERT INTO datos_personales (rut,nombres,apellidos,fecha_nacimiento,nacionalidad,estado_civil,hijos,fono_id,escolaridad,email)".
	   "VALUES ('$rut','$nombres','$apellidos','$nacimiento','$nacionalidad','$estado','$_POST[hijos]','$contador','$escolaridad','$email')";
 $result = mysql_query($Ssql,$link);

 echo "Datos Personales Guardados con Exito. <br> Presione Continuar.";
 echo "<form method='post' action='datos_novotel.php' >";
 echo "<input type='hidden' name='rut' value='$rut'>";
 echo "<input type='submit' value='Continuar' name='continuar' />";
 echo "</form> </div>";
 } //else pasar datos si estan malos.
} //else rut existe.

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
$permitidos = "abcdeabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789-'_.";
for($i=0; $i<strlen($validador); $i++) {
 if(strpos($permitidos, substr($validador,$i,1)) === false)
  return false;
}
return true;
}
?>

</body>
</html>