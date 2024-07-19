<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");

$pais=array("Chile","Brasil","Colombia","Argentina","Bolivia","Perú","Uruguay","Paraguay","Ecuador","Venezuela");
$mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$estado_civil=array("Soltero(a)","Soltero(a) con persona a cargo","Casado","Viudo(a) con persona a cargo","Separado(a) con persona a cargo","En pareja");
$escolaridad=array("Educación Básica","Educación Media","Instituto Técnico Incompleto","Instituto Técnico Completo","Educación Universitaria Incompleta","Educación Universitaria Completa","Postgrado","Master","Magister");

//Se dejan en orden alfabetico
sort($pais);
$rut = "";
?>

<div align="center"> <h2> <u> Datos Personales </u> </h2> </div>

<form method="post" action="guardar_datos_personales.php" >

<table align="center" border="0" cellpadding="3" cellspacing="2">

<tr align="left">
<td> R.U.T: </td>
<td> <input type="text" name="rut" value="<?php echo $_POST['rut']; ?>" size="9" maxlength="9" tabindex="1" /> - 
<input type="text" name="verificador" value="<?php echo $_POST['verificador']; ?>" size="1" maxlength="1" tabindex="2" /> <font size="+2"> * </font> </t> </t> (xxxxxxxx-x) </td>
</tr>

<tr align="left">
<td> Nombres: </td>
<td> <input type="text" name="nombres" value="<?php echo $_POST['nombres']; ?>" size="40" maxlength="40" tabindex="3" /> <font size="+2"> * </font> </td>
</tr>

<tr align="left">
<td> Primer Apellido: </td>
<td> <input type="text" name="apellido1" value="<?php echo $_POST['apellido1']; ?>" size="20" maxlength="20" tabindex="4" /> <font size="+2"> * </font> </td>
</tr>

<tr align="left">
<td> Segundo Apellido: </td>
<td> <input type="text" name="apellido2" value="<?php echo $_POST['apellido2']; ?>"  size="20" maxlength="20" tabindex="5" /> <font size="+2"> * </font> </td>
</tr>

<tr align="left">
<td> Nacionalidad: </td>
<td> <select name="nacionalidad" tabindex="6" />
<?php
for($i=0; $i<count($pais); $i++)
 echo "<option value=$pais[$i]> $pais[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Fecha Nacimiento: </td>
<td> <select name="dia" tabindex="7" /> / 
<?php
 for($i=1; $i<32; $i++)
  echo "<option value='$i'> $i </option>";
 echo "</select>"; ?> / 

<select name="mes" tabindex="8" />
<?php
 for($i=0; $i<count($mes); $i++)
  echo "<option value='$mes[$i]'> $mes[$i] </option>";
 echo "</select>"; ?> /

<select name="año" tabindex="9" />
<?php
 $año= date('Y');
 for($i=1940; $i<=$año; $i++)
  echo "<option value='$i'> $i </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Teléfono 1: </td>
<td> ej. (02) <input type="text" name="dif1" value="<?php echo $_POST['dif1']; ?>" size="2" maxlength="2" tabindex="10"> - 
<input type="text" name="fono1" value="<?php echo $_POST['fono1']; ?>" size="8" maxlength="8" tabindex="11" /> <font size="+2"> * </font> </td>
</tr>

<tr align="left">
<td> Teléfono 2: </td>
<td> ej. (02) <input type="text" name="dif2" value="<?php echo $_POST['dif2']; ?>" size="2" maxlength="2" tabindex="12"> - 
<input type="text" name="fono2" value="<?php echo $_POST['fono2']; ?>" size="8" maxlength="8" tabindex="13" /> </td>
</tr>

<tr align="left">
<td> Teléfono 3: </td>
<td> ej. (02) <input type="text" name="dif3" value="<?php echo $_POST['dif3']; ?>" size="2" maxlength="2" tabindex="14"> - 
<input type="text" name="fono3" value="<?php echo $_POST['fono3']; ?>" size="8" maxlength="8" tabindex="15" /> </td>
</tr>

<tr align="left">
<td> E-Mail: </td>
<td> <input type="text" name="email" value="<?php echo $_POST['email']; ?>" size="20" maxlength="20" tabindex="16" /> @
<input type="text" name="email2" value="<?php echo $_POST['email2']; ?>" size="15" maxlength="15" tabindex="17"> </td>
</tr>

<td> Estado Civil: </td>
<td> <select name="estado" tabindex="18">
<?php
 for($i=0; $i<count($estado_civil); $i++)
  echo "<option value='$estado_civil[$i]'> $estado_civil[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Número de Hijos: </td>
<td> <select name="hijos" tabindex="19" />
<?php
for($i=0; $i<=10; $i++)
 echo "<option value='$i'> $i </option>>";
?>
</select> <font size="+2"> * </font> </td>

<tr align="left">
<td> Nivel de Estudios: </td>
<td> <select name="escolaridad" tabindex="20" />
<?php
for($i=0; $i<count($escolaridad); $i++)
 echo "<option value='$escolaridad[$i]'> $escolaridad[$i] </option>>";
?>
</select> <font size="+2"> * </font> </td>
</tr> </table>

<br>

<table align="center" border="0"> <tr>
<td> <input type="submit" value="Enviar" name="enviar" tabindex="21" /> </td>
</tr> </table> </form>

</body> </html>