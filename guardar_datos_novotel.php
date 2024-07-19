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

//Ve si el rut esta guardado de antes.
$aux = true;
if($_POST['rut'] == "")
 $aux = false;
$result = mysql_query("SELECT rut_colaborador FROM datos_trabajo",$link);
while($row = mysql_fetch_row($result)) {
 if($_POST['rut'] == $row[0])
 {
  $aux = false;
  break;
 }
  $aux = true;
}

echo "<div align='center'>";

 if($aux == false)
  {
   echo "Usuario " . $_POST['rut'] . " ya existe <br>";
   echo "<a href = 'datos_novotel.php'> Atrás </a>";
  }
 else {

 //valida si estan marcadas las opciones
 if(!isset($secciones))
 {
  echo"Seleccione sección <br>";
  echo "<a href = 'datos_novotel.php'> Atrás </a>";
 }
 else
  if(!isset($cargos))
  {
  echo"Seleccione cargos <br>";
  echo "<a href = 'datos_novotel.php'> Atrás </a>";
 }
 else
  if(!isset($cursos))
  {
   echo"Seleccione cursos <br>";
   echo "<a href = 'datos_novotel.php'> Atrás </a>";
  }
  else
   if($_POST['evaluacion'] == 5 and $_POST['evaluacion2'] > 0)
    {
     echo "La evaluación máxima es 5.0 <br>";
     echo "<a href = 'datos_novotel.php'> Atrás </a>";
    }
    else {

      //concatenar
      $fecha_ingreso=$_POST['dia'] . "-" . $_POST['mes'] . "-" . $_POST['año'];
	  $evaluacion=$evaluacion . "." . $_POST['evaluacion2'];

	  //Grabar en BD
	  //secciones
	  $contador=0;
	  $Csql="SELECT max(id_secciones) FROM secciones";
	  $result=mysql_query($Csql,$link);
	  $row=mysql_fetch_array($result);
	  $contador = $row[0] + 1;

	  for($i=0; $i<count($cargos); $i++)
	  {
	   $Ssql="INSERT INTO secciones (id_secciones,nombre) VALUES ('$contador','$secciones[$i]')";
	   $result=mysql_query($Ssql,$link);
	  }

	  //cargo.
	  $contador2=0;
	  $Csql="SELECT max(id_cargo) FROM cargos";
	  $result=mysql_query($Csql,$link);
	  $row=mysql_fetch_array($result);
	  $contador2 = $row[0] + 1;

	  for($i=0; $i<count($cargos); $i++)
	  {
	   $Ssql="INSERT INTO cargos (id_cargo,nombre) VALUES ('$contador2','$cargos[$i]')";
	   $result=mysql_query($Ssql,$link);
	  }

	  //capacitaciones.
	  $contador3=0;
	  $Csql="SELECT max(id_capacitaciones) FROM capacitaciones";
	  $result=mysql_query($Csql,$link);
	  $row=mysql_fetch_array($result);
	  $contador3 = $row[0] + 1;

	  for($i=0; $i<count($cargos); $i++)
	  {
	   $Ssql="INSERT INTO capacitaciones (id_capacitaciones,nombre) VALUES ('$contador3','$cursos[$i]')";
	   $result=mysql_query($Ssql,$link);
	  }

      $Ssql="INSERT INTO datos_trabajo (rut_colaborador,fecha_ingreso,puesto_ingreso,puesto_actual,cargo_id,capacitaciones_id,secciones_id,ultima_evaluacion)".
	        "VALUES ('$rut','$fecha_ingreso','$_POST[seccion_ingreso]','$_POST[seccion_actual]','$contador2','$contador3','$contador','$evaluacion')";
	  $result=mysql_query($Ssql,$link);
	  
	  echo "Datos Guardados Correctamente. <br> Presiones Continuar.";
	  echo "<form method='post' action='datos_ida.php' >";
	  echo "<input type='hidden' name='rut' value='$_POST[rut]'>";
	  echo "<input type='submit' value='Continuar' name='continuar' />";
	  echo "</form> </div>";
 } //else validar.
} //else ver rut.

?>

</body>
</html>