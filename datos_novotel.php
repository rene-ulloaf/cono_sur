<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");
$secciones=array("AMA DE LLAVES","VENTAS","RECEPCION","RESERVAS","RESTAURANT","BANQUETE","EVENTOS","COCINA","CONTABILIDAD","COMPRAS","BODEGA","RECURSOS HUMANOS","MANTENCION","SISTEMAS","GERENCIA GENERAL");
$cargos=array("NINGUNO","SUPERVISOR","JEFE DE AREA","GERENTE DE AREA");
$cursos=array("NINGUNO","INGLES","REPOSTERIA");
$mes=array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");

//ordena por orden alfabetico
sort($secciones);
sort($cargos);
?>

<div align="center"> <h3> <u> Datos de Novotel </u> </h3> </div>

<form method="post" action="guardar_datos_novotel.php">
<table align="center" border="0" cellpadding="3" cellspacing="2">

<tr align="left">
<td> Fecha de Ingreso: </td>
<td> <select name="dia" tabindex="1" /> /
<?php
 for($i=1; $i<32; $i++)
  echo "<option value='$i'> $i </option>";
 echo "</select>"; ?> /

<select name="mes" tabindex="2" />
<?php
 for($i=0; $i<count($mes); $i++)
  echo "<option value='$mes[$i]'> $mes[$i] </option>";
 echo "</select>"; ?> /

<select name="año" tabindex="3" /> 
<?php
 $año= date('Y');
 for($i=1977; $i<=$año; $i++)
  echo "<option value='$i'> $i </option>";
 echo "</select>"; ?>
<font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Puesto de Ingreso: </td>
<td> <select name="seccion_ingreso" tabindex="4">
<?php
for($i=0; $i<count($secciones); $i++)
 echo "<option value='$secciones[$i]'> $secciones[$i]";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Puestos en los que ha <br> pertenecido: </td>
<td> <select name="secciones[]" multiple tabindex="6">
<?php
for($i=0; $i<count($secciones); $i++)
 echo "<option value='$secciones[$i]'> $secciones[$i]";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Puesto Actual: </td>
<td> <select name="seccion_actual" tabindex="5">
<?php
for($i=0; $i<count($secciones); $i++)
 echo "<option value='$secciones[$i]'> $secciones[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Cargos que ha obtenido: </td>
<td> <select name="cargos[]" size="3" multiple tabindex="7">
<?php
for($i=0; $i<count($cargos); $i++)
 echo "<option value='$cargos[$i]'> $cargos[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Cursos o Capacitaciones <br> que ha echo: </td>
<td> <select name="cursos[]" multiple tabindex="8">
<?php
for($i=0; $i<count($cursos); $i++)
 echo "<option value'$cursos[$i]'> $cursos[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Última Evaluación obtenida: </td>
<td> <select name="evaluacion" tabindex="9">
<?php
for($i=0; $i<6; $i++)
 echo "<option value='$i'> $i";
?>
</select> . 

<select name="evaluacion2" tabindex="10">
<?php
for($i=0; $i<10; $i++)
 echo "<option value='$i'> $i";
?>
</select> </table>

<?php echo "<input type='hidden' name='rut' value='$_POST[rut]'>"; ?>

<table align="center" border="0" cellpadding="3" cellspacing="2">
<td> <input type="submit" value="Enviar" name="enviar" tabindex="16" /> </td>
<td> <input type="reset" value="Restablecer" name="borrar" tabindex="17" /> </td>
</table> </form>

</body> </html>