<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");

echo "<div align='center'>";

if(!isset($_POST['seleccion']))
{
 echo "Debe seleccionar algún Colaborador <br>";
 echo "<a href='frame_opciones.htm' target='_top'> Volver </a>";
}
else
{

 //reporte datos personales.
 echo "<h5> Datos Personales </h5>";
 echo "<table align='center' border='2' >";
 echo "<tr> <td> Nombres </td>";
 echo "<td> Apellidos </td>";
 echo "<td> Nacionalidad </td>";
 echo "<td> Fecha de Nacimiento </td>";
 echo "<td> Estado Civil </td>";
 echo "<td> Nº de Hijos</td>";
 echo "<td> Nivel de Estudios </td> </tr>";

 include("coneccion.php");
 $link = conectarse();

 $opcion = strtoupper($_POST['seleccion']);

 $result = mysql_query("SELECT * FROM datos_personales WHERE apellidos LIKE '$opcion%'" ,$link);
 $row = mysql_fetch_array($result);

 echo "<tr align='center'>";
 echo "<td> $row[nombres] </td>";
 echo "<td> $row[apellidos] </td>";
 echo "<td> $row[nacionalidad] </td>";
 echo "<td> $row[fecha_nacimiento] </td>";
 echo "<td> $row[estado_civil] </td>";
 echo "<td> $row[hijos] </td>";
 echo "<td> $row[escolaridad] </td>";
 echo "</tr> </table> <br> <br>";

 echo "<h5> Datos Trabajo </h5>";
 echo "<table align=center' border='2'";
 echo "<tr align='center'>";
 echo "<td> Fecha Ingreso </td>";
 echo "<td> Puesto Ingreso </td>";
 echo "<td> Puesto Actual </td>";
 echo "<td> Ultima Evaluación </td> </tr>";

 //reportes datos trabajo.
 $result2 = mysql_query("SELECT * FROM datos_trabajo WHERE rut_colaborador = '$row[rut]'" ,$link);
 $row2 = mysql_fetch_array($result2);

 echo "<tr align='center'>";
 echo "<td> $row2[fecha_ingreso] </td>";
 echo "<td> $row2[puesto_ingreso] </td>";
 echo "<td> $row2[puesto_actual] </td>";
 echo "<td> $row2[ultima_evaluacion] </td>";
 echo "</tr> </table> <br>";

 //reporte secciones.
 echo "<h5> Secciones que ha pertenecido el Colaborador </h5>";

 $result3 = mysql_query("SELECT nombre FROM secciones WHERE id_secciones = '$row2[secciones_id]'" ,$link);
 while($row3 = mysql_fetch_array($result3))
  echo $row3[nombre];

 //reporte cargos.
 echo "<h5> Cargos que ha obtenido el Colaborador </h5>";

 $result3 = mysql_query("SELECT nombre FROM cargos WHERE id_cargo = '$row2[cargo_id]'" ,$link);
 while($row3 = mysql_fetch_array($result3))
  echo $row3[nombre];

 //reporte capacitaciones.
 echo "<h5> Capacitaciones que ha echo el Colaborador </h5>";

 $result3 = mysql_query("SELECT nombre FROM capacitaciones WHERE id_capacitaciones = '$row2[capacitaciones_id]'" ,$link);
 while($row3 = mysql_fetch_array($result3))
  echo $row3[nombre];

 //respuesta a pregunta
 echo "<h5> ¿Estaría dispuesto a Cambiarse de lugar de Trabajo? </h5>";
 echo "<table align='center' border='2'>";
 echo "<tr> <td> Ciudad </td> <td> País </td> </tr>";
 
 $result2 = mysql_query("SELECT * FROM pregunta WHERE rut_colaborador = '$row[rut]'" ,$link);
 $row2 = mysql_fetch_array($result2);
 
 if($row2[transferencia] == 1)
  echo "<tr> <td> $row2[nacional] </td> <td> $row2[internacional] </td> </tr> </table>";
 else
  echo "<tr> <td> NO </td> <td> NO </td> </tr> </table>";
 
 //reporte hotel que le gustaria ir.
 echo "<h5> Hotel que le Gustaría Trasladarse </h5>";
 
 if($row2[cod_hotel] != 0)
 {
  echo "<table align='center' border='2'>";
  echo "<tr> <td> Código Hotel </td>";
  echo "<td> Tipo Hotel </td>";
  echo "<td> Nombre Hotel </td>";
  echo "<td> País </td>";
  echo "<td> Ciudad </td>";
  echo "<td> Teléfono </td>";
  echo "<td> E-Mail </td>";
  echo "<td> Director </td> </tr>";
 
  $result3 = mysql_query("SELECT * FROM hoteles WHERE cod_hotel = '$row2[cod_hotel]'" ,$link);
  while($row3 = mysql_fetch_array($result3))
  {
   echo "<tr> <td> $row3[cod_hotel] </td>";
   echo "<td> $row3[tipo] </td>";
   echo "<td> $row3[nombre_hotel] </td>";
   echo "<td> $row3[pais] </td>";
   echo "<td> $row3[ciudad] </td>";
   echo "<td> $row3[telefono] </td>";
   echo "<td> $row3[email] </td>";
   echo "<td> $row3[director] </td> </tr>";
  }
  echo "</table>";
 } else
  echo "NINGUNO";

 //reporte contactarse.
 echo "<h5> Datos para Contacto </h5>";
 echo "Telefonos: <br> <br>";
 
 $result2 = mysql_query("SELECT fono FROM telefono WHERE id_fono = '$row[fono_id]'" ,$link);
  while($row2 = mysql_fetch_array($result2))
   echo $row2[fono] . "<br>";
   
  if($row[email] != NULL)
  {
   echo "<br> E-Mail <br> <br>";
   echo $row[email];
  }
}
?>
</div>
</body>
</html>