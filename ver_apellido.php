<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");
echo "<div align='center'>";

if (empty($_POST['opcion']))
{
 echo "Debe Ingresar el Apellido del Colaborador <br>";
 echo "<a href='buscar.html'> Volver </a>";
}
else
{
 include("coneccion.php");
 $link = conectarse();

 $aux=1;
 echo "<form method='post' action='ver_uno.php'>";

 $opcion = strtoupper($_POST['opcion']);

 echo "<table align='center' border='1'>";
 echo "<tr> <td> Selección </td>";
 echo "<td> R.U.T. </td>";
 echo "<td> Nombres </td>";
 echo "<td> Apellidos </td>";
 echo "<td> Transfiere </td> </tr>";

 $result = mysql_query("SELECT a.rut, a.nombres, a.apellidos, b.transferencia FROM datos_personales a, pregunta b WHERE a.apellidos LIKE '%$opcion%'");
 while($row = mysql_fetch_array($result))
 {
  if($row[transferencia] = 1)
   $trans = 'SI';
  else
   $trans = 'NO';

  echo "<tr> <td> <input type='radio' value='$row[apellidos]' name='seleccion' tabindex='$aux'> </td>";
  echo "<td> $row[rut] </td>";
  echo "<td> $row[nombres] </td>";
  echo "<td> $row[apellidos] </td>";
  echo "<td> $trans </td> </tr> </table>";
  $aux ++;
 }

 echo "<br> <br>";
 echo "<input type='submit' name='buscar' value='Buscar' tabindex='$aux'>";
 echo "</form> </div>";
}
?>

</body>
</html>
