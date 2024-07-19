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

$usuario = trim($_COOKIE['usuario']);
$passw = trim($_COOKIE['passw']);
$usuario= strtoupper($usuario);

echo "<div align='center'>";

if(empty($usuario) || empty($passw))
{
 echo "Nombre de usuario y/o contraseña no ingresadas, <br> debe ingresarlos. <br>";
}
else
 if(strlen($passw) < 6)
  echo "Password demasiado corto. <br>";
 else {

 $result = mysql_query("SELECT * FROM usuarios", $link);
 while($row = mysql_fetch_row($result))
 {

  if($usuario == $row[2] && $passw == $row[3])
  {
   $si = TRUE;
   break;
  }
  else
   $si = FALSE;
 }

  if($si == TRUE)
  {
   $result = mysql_query("SELECT user_id FROM usuarios WHERE user = 'SUPER_USER'", $link);
   $super = mysql_fetch_row($result);

   $result = mysql_query("SELECT user_id FROM usuarios WHERE user = 'EDONOSO'", $link);
   $usuario1 = mysql_fetch_row($result);

   $result = mysql_query("SELECT user_id FROM usuarios WHERE user = 'LSEGALA'", $link);
   $usuario2 = mysql_fetch_row($result);

   $result = mysql_query("SELECT user_id FROM usuarios WHERE user = 'CORTEGA'", $link);
   $usuario3 = mysql_fetch_row($result);

   $result = mysql_query("SELECT user_id FROM usuarios WHERE user = '$usuario'", $link);
   $row = mysql_fetch_row($result);

   if($row == $usuario1 || $row == $usuario2 || $row == $usuario3 || $row == $super)
   {
     echo "<h5> Registro </h5>";
	 echo "<table align='center' border='0'>";
	 echo "<tr> <td> <a href='ver_todos.php' title='Muestra todos los colaboradores' target='derecha'> Ver Todos </a> </td> </tr>";
	 echo "<tr> <td> <a href='buscar_apellido.html' title='Muestra los colaboradores con el apellido ingresado' target='derecha'> Buscar por Apellido </a> </td> <tr>";
	 echo "<tr> <td> <a href='ver_van.php' title='Muestra a todos los colaboradores que se reubicarían de lugar de trabajo' target='derecha'> Ver todos los que se Cambiarían </a> </td> <tr>";
	 echo "<tr> <td> <a href='ver_ciudad.php' title='Muestra a todos los colaboradores que se reubicarían de ciudad' target='derecha'> Ver todos los que se cambiarían de Ciudad </a> </td> <tr>";
	 echo "<tr> <td> <a href='ver_pais.php' title='Muestra a todos los colaboradores que se reubicarían de País' target='derecha'> Ver todos los que se cambiarían de País </a> </td> <tr>";
	 echo "<tr> <td> <a href='buscar_hotel' title='Muestra a todos los colaboradores que se cambiarían al hotel ingresado' target='derecha'> Buscar por Hotel </a> </td> </tr> </table>";
   }

   if($row == $usuario1 || $row == $super)
   {
    echo "<h5> Acciones </h5>";
    echo "<table align='center' border='0'>";
    echo "<tr> <td> <a href='agregar_hotel.php' title='Agrega Nuevos Hoteles' target='derecha'> Agregar Hotel </a> </td> <tr>";
    echo "<tr> <td> <a href='buscar_eliminar_usuario.htm' title='Elimina Colaboradores' target='derecha'> Eliminar Colaborador </a> </td> <tr>";
    echo "<tr> <td> <a href='registrar_usuarios.php' title='Registra al usuario' target='derecha'> Registrar Colaborador </a> </td> <tr>";
    echo "<tr> <td> <a href='pedir_clave.php' title='Entrega contraseña' target='derecha'> Entregar Contraseña </a> </td> </tr> </table>";
   }

   echo "<h5> Usuarios </h5>";
   echo "<table align='center' border='0'>";
   echo "<tr> <td> <a href='datos_personales.php' title='Llene el formulario con sus datos personales' target='derecha'> Llenar Formulario </a> </td> <tr>";
   echo "<tr> <td> <a href='modificar_datos_personales.php' title='Modifica los Datos Guardados' target='derecha'> Modificar Datos </a> </td> <tr>";
   echo "<tr> <td> <a href='cambiar_clave.html' title='Cambia la contraseña' target='derecha'> Cambiar Contraseña </a> </td> </tr> </table>";

  } else {
   echo "Usuario y/o Contraseña incorrecta, ingreselos nuevamente.";
  }
 }
  echo "<br> <br> <a href='index.html' target='_top'> Página Principal </a> </div>";
?>

</body>
</html>