<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<?php 
if( isset($_POST["enviar"])) {
 setcookie("usuario",$_POST["user"]);
 setcookie("passw",$_POST["pass"]); 
 header("Location: frame_opciones.htm");
 exit; } ?>

<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center">

<form method="post" action="<?php echo $PHP_SELF ?>" target="_top">
<table border="0" align="center"> 
<tr> <td> Nombre de Usuario: </td> </tr>
<tr> <td> <input type="text" name="user" size="20" maxlength="20" tabindex="1"> </td> </tr>

<tr> <td> Contraseņa: </td> </tr>
<tr> <td> <input type="password" name="pass" size="15" maxlength="15" tabindex="2"> </td> </tr>
</table>

<table border="0">
<tr>
 <td> <input type="submit" value="Enviar" name="enviar" tabindex="3"> </td>
 <td> <input type="reset" value="Restablecer" name="reset" tabindex="4"> </td>
</tr> </table> </form>

</body>
</html>