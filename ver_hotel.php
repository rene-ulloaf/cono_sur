<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");
include("coneccion.php");
$link = conectarse();

$aux=1;
echo "<form method='post' action='ver_uno.php'>";
echo "<div align='center'>";

echo "<table align='center' border='1'>";
echo "<tr> <td> Selección </td>";
echo "<td> R.U.T. </td>";
echo "<td> Nombres </td>";
echo "<td> Apellidos </td> </tr>";

$result = mysql_query("SELECT a.rut, a.nombres, a.apellidos FROM datos_personales a, pregunta b, hoteles c WHERE a.rut = b.rut_colaborador AND b.cod_hotel = c.cod_hotel");
while($row = mysql_fetch_array($result))
{
 echo "<tr> <td> <input type='radio' value='$row[apellidos]' name='seleccion' tabindex='$aux'> </td>";
 echo "<td> $row[rut] </td>";
 echo "<td> $row[nombres] </td>";
 echo "<td> $row[apellidos] </td> </table>";
 $aux ++;
}

echo "<br> <br>";
echo "<input type='submit' name='buscar' value='Buscar' tabindex='$aux'>";
echo "</form> </div>";

?>

</body>
</html>