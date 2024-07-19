<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php include("fuente.htm"); ?>

<div align="center"> <h3> <u> ¿Estaría Dispuesto(a) a cambiarse de País y/o Ciudad? </u> </h3>

<form method="post" action="guardar_datos_ida.php" >

<table align="center" border="0" cellpadding="3" cellspacing="2">

<tr align="left">
<td> Ciudad: </td>
<td> <input type="radio" name="ciudad" value="si" tabindex="1"> si &nbsp <input type="radio" name="ciudad" value="no" tabindex="1" checked> no
</td> </tr>

<tr align="left">
<td> País: </td>
<td> <input type="radio" name="pais" value="si" tabindex="2"> si &nbsp <input type="radio" name="pais" value="no" tabindex="2" checked> no
</td> </tr> </table>

<h3> <u> Elija un hotel donde le gustaria Trabajar </u> </h3>
<table align="center" border="2" cellpadding="3" cellspacing="2">
<tr align="center">
<td> Selección </td>
<td> Tipo Hotel </td>
<td> Nombre del Hotel </td>
<td> Pais </td>
<td> Ciudad </td>
<td> Dirección </td>
<td> Director </td> </tr>

<?php
include("coneccion.php");
$link=conectarse();

$tab = 3;
$result=mysql_query("SELECT cod_hotel, tipo, nombre_hotel, pais, ciudad, direccion, director FROM hoteles",$link);
while($row = mysql_fetch_array($result))
{
 echo "<tr align='center'>";
 echo "<td> <input type='checkbox' name'hoteles' value='$row[cod_hotel]' tabindex='$tab'> </td>";
 echo "<td> $row[tipo] </td>";
 echo "<td> $row[nombre_hotel] </td>";
 echo "<td> $row[pais] </td>";
 echo "<td> $row[ciudad] </td>";
 echo "<td> $row[direccion] </td>";
 echo "<td> $row[director] </td> </tr>";
 $tab ++;
}

echo "</table> <br> <br>";
echo "<input type='hidden' name='rut' value='$_POST[rut]'>";
echo "<input type='submit' value='Continuar' name='continuar' tabindex='$tab' />";
echo "</form> </div>";
?>

</div>
</body>
</html>