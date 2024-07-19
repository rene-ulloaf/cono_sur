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

echo "<div align='center'>";

$rut = trim($_POST['rut']);
$identificador = trim($_POST['identificador']);

if(empty($rut) || empty($identificador)) {
 echo "Debe ingresar el RUT del colaborador a eliminar. <br>";
 echo "<a href='frame_opciones.htm' target='_top'> Volver </a>"; }
else {

 $rut .= "-" . strtoupper($identificador);
 
 $user = mysql_fetch_row(mysql_query("SELECT nombres, apellidos FROM datos_personales WHERE rut = '$rut'", $link));

//elimina capacitaciones
 $result=mysql_query("SELECT capacitaciones_id FROM datos_trabajo WHERE rut_colaborador = '$rut'", $link);
 $row = mysql_fetch_array($result);

 mysql_query("DELETE FROM capacitaciones WHERE id_capacitaciones = '$row[0]'", $link);

//elimina cargos
 $row = mysql_fetch_row(mysql_query("SELECT cargo_id FROM datos_trabajo WHERE rut_colaborador = '$rut'", $link));
 mysql_query("DELETE FROM cargos WHERE id_cargo = '$row[0]'");

//elimina secciones
 $row = mysql_fetch_row(mysql_query("SELECT secciones_id FROM datos_trabajo WHERE rut_colaborador = '$rut'", $link));
 mysql_query("DELETE FROM secciones WHERE id_secciones = '$row[0]'");

//elimina telefono
 $result = mysql_query("SELECT fono_id FROM datos_personales WHERE rut = '$rut'", $link);
 while($row = mysql_fetch_row($result))
  mysql_query("DELETE FROM telefono WHERE id_fono = '$row[0]'");

//elimina usuarios
 mysql_query("DELETE FROM usuarios WHERE rut = '$rut'");

//elimina pregunta
 mysql_query("DELETE FROM pregunta WHERE rut_colaborador = '$rut'");

//elimina datos_personales
 mysql_query("DELETE FROM datos_personales WHERE rut = '$rut'");

//elimina datos_trabajo
 mysql_query("DELETE FROM datos_trabajo WHERE rut_colaborador = '$rut'");

 echo "Usuario " . $user[0] . " " . $user[1] . " Eliminado";
}
echo "</div>"; ?>
</body>
</html>