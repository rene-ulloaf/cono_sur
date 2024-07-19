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

//Verifica si el rut existe o no.
$aux = true;
if($_POST['rut'] == "")
 $aux = false;
$result = mysql_query("SELECT rut_colaborador FROM pregunta",$link);
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
  if((!isset($_POST['ciudad'])) && (!isset($_POST['pais'])))
  {
   echo "Debe elegir alguna opción <br>";
   echo "<br> <a href = 'datos_ida.php'> Atrás </a>";
  }
  else
  {
   $ciudad = strtoupper($_POST[ciudad]);
   $pais = strtoupper($_POST[pais]);

   $aux = 0;
   $resultado = mysql_query("SELECT cod_hotel FROM hoteles",$link);
   //guardar BD
   while($row = mysql_fetch_row($resultado))
   {
    if(isset($row[0]))
    {
     $Ssql="INSERT INTO pregunta (rut_colaborador, cod_hotel, transferencia, nacional, internacional)".
	       "VALUES ('$_POST[rut]', '$row[0]', '1', '$ciudad', '$pais')";
     $result = mysql_query($Ssql,$link);
	 $aux ++;
	}
	echo "Se ha grabado todos sus datos con éxito. <br> Gracias. </div>";
   }

	if($aux == 0)
	{
	 $Ssql="INSERT INTO pregunta (rut_colaborador, cod_hotel, transferencia, nacional, internacional)".
	       "VALUES ('$_POST[rut]', '0', '1', '$nacional', '$inter')";
	 $result = mysql_query($Ssql,$link);
     echo "Se ha grabado todos sus datos con éxito. <br> Gracias. </div>";
	}
  } //else validación.
 } //else rut.
?>
</body>
</html>
