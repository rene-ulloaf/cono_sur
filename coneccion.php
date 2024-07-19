<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php
function conectarse()
{
 if(!($link=mysql_connect("localhost","root")))
 {
  echo "Error: Conectando a la base de datos...";
  exit();
 }
 if(!(mysql_select_db("colaboradores_cono_sur",$link)))
 {
  echo "Error: Seleccionando la base de datos...";
  exit();
 }
 return $link;
}
conectarse();
?>

</body>
</html>