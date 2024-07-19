<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<?php
include("fuente.htm");
include("coneccion.php");
?>

<div align="center">

<h3> Registrar Usuarios </h3>

<form method="post" action="guardar_registrar_usuarios.php">
<table border="0" align="center">

<tr align="left">
<td> R.U.T: </td>
<td> <input type="text" name="rut" value="<?php echo $_POST['rut']; ?>" size="9" maxlength="9" tabindex="1" /> - 
<input type="text" name="verificador" value="<?php echo $_POST['verificador']; ?>" size="1" maxlength="1" tabindex="2" />
</t> </t> (xxxxxxxx-x) </td>
</tr>

<tr align="left">
 <td> Nombre de Usuario: </td>
 <td> <input type="text" name="user" value="<?php echo $_POST['user']; ?>" size="40" maxlength="40" tabindex="3"> </td>
</tr>

<tr align="left">
 <td> Contraseña: </td>
 <td> <input type="password" name="pass" size="20" maxlength="20" tabindex="4"> </td>
</tr>

<tr align="left">
 <td> Repetir Contraseña: </td>
 <td> <input type="password" name="pass2" size="20" maxlength="20" tabindex="5"> </td>
</tr>
</table>

<input type="hidden" name="id" />

<table border="0">
<tr>
 <td> <input type="submit" value="Enviar" name="enviar" tabindex="6"> </td>
</tr> </table> </form> </div>

</body>
</html>
