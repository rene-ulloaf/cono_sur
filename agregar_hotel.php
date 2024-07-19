<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
include("fuente.htm");

$pais=array("Chile","Brasil","Colombia","Argentina","Bolivia","Perú","Uruguay","Paraguay","Ecuador","Venezuela");
$tipo_hoteles=array("Novotel","Sofitel","Ibis","Mercure","Formule 1", "Parthenon");

//ordenar alfabeticamente
sort($pais);
sort($tipo_hoteles);
?>

<div align="center"> <h2> <u> Agregar Hotel: </u> </h2> </div>
<form method="post" action="guardar_hotel.php" >
<table align="center" border="0" cellpadding="3" cellspacing="2">

<tr align="left">
<td> Codigo del Hotel: </td>
<td> <input type="text" name="cod_hotel" value="<?php echo $_POST['cod_hotel']; ?>" size="6" maxlength="4" tabindex="1" /> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Tipo de Hotel: </td> 
<td> <select name="tipo" tabindex="2" />
<?php
for($i=0; $i<count($tipo_hoteles); $i++)
 echo "<option value=$tipo_hoteles[$i]> $tipo_hoteles[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Nombre del Hotel: </td> 
<td> <input type="text" name="nombre" value="<?php echo $_POST['nombre']; ?>" size="25" maxlength="25" tabindex="3" /> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> País del Hotel: </td>
<td> <select name="pais" tabindex="4" />
<?php
for($i=0; $i<count($pais); $i++)
 echo "<option value=$pais[$i]> $pais[$i] </option>";
?>
</select> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Ciudad del Hotel: </td> 
<td> <input type="text" name="ciudad" value="<?php echo $_POST['ciudad']; ?>" size="20" maxlength="20" tabindex="5" /> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Comuna del Hotel: </td> 
<td> <input type="text" name="comuna" value="<?php echo $_POST['comuna']; ?>" size="20" maxlength="20" tabindex="6" /> </td> </tr>

<tr align="left">
<td> Dirección del Hotel: </td> 
<td> <input type="text" name="direccion" value="<?php echo $_POST['direccion']; ?>" size="30" maxlength="30" tabindex="7" /> <font size="+2"> * </font> </td> </tr>

<tr align="left">
<td> Teléfono: </td> 
<td> ej. (02) <input type="text" name="dif" value="<?php echo $_POST['dif']; ?>" size="2" maxlength="2" tabindex="8"> - 
<input type="text" name="fono" value="<?php echo $_POST['fono']; ?>" size="8" maxlength="8" tabindex="9" /> </td>
</tr>

<tr align="left">
<td>Fax: </td> 
<td> ej. (02) <input type="text" name="dif_fax" value="<?php echo $_POST['dif_fax']; ?>" size="2" maxlength="2" tabindex="10"> - 
<input type="text" name="fax" value="<?php echo $_POST['fax']; ?>" size="8" maxlength="8" tabindex="11" /> </td>
</tr>

<tr align="left">
<td> E-Mail: </td>
<td> <input type="text" name="email" value="<?php echo $_POST['email']; ?>" size="20" maxlength="20" tabindex="12" /> @
<input type="text" name="email2" value="<?php echo $_POST['email2']; ?>" size="15" maxlength="15" tabindex="13"> </td>
</tr>

<tr align="left">
<td> Nombre del Director: </td> 
<td> <input type="text" name="nombre_director" value="<?php echo $_POST['nombre_director']; ?>" size="25" maxlength="25" tabindex="14" /> <font size="+2"> * </font> </td> </tr>
</table>

<br>

<table align="center" border="0"> <tr>
<td> <input type="submit" value="Enviar" name="enviar" tabindex="15" /> </td>
</tr> </table> </form>

</body>
</html>