<?php
include "config/config.php";
?>
<html>
<head>
		 <style type="text/css">
 
  *{
margin:auto;
}
body {
	font-family:Verdana, Geneva, sans-serif
	margin: auto;
	padding: 0;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
}
  a {
   color:#000000;
  }
  #Content {
   width:290px;
   text-align:left;
   
   

  }
  #encuentros {
   text-align:left;
   
  }
  
  .estilo-select select {
       background: transparent;
       width: 268px;
       padding: 5px;
       font-size: 25px;

       border: 0;
       border-radius: 0;
       height: 34px;
       -webkit-appearance: none;
       -moz-appearance:none;
       appearance: none;
       }

.estilo-select {
       width: 271px;
       height: 43px;
       overflow: hidden;
       border: 1px;
       border-style:dotted;
       border-color:#de0000;
       }
       .titulo {
		   text-align:center;
		   font-family:Helvetica;
		   font-size:30px;
		   font-style:normal;
		   font-weight:normal;
		   text-decoration:none;
		   text-transform:none;
		   color:000000;
		   margin-bottom:50px;
		   margin-top:50px;
	   }
	   .input-color {
		   margin-top:5px;
		   }
	
	.centrado {
		text-align:right;
		margin-left:8px;
		}
 </style>

		<script> 
		function abrir(url) { 
		open(url,'','top=300,left=300,width=300,height=200,status=1,resizable=0') ; 
		} 
		</script>
	</head>

</head>
<body>
    <div class="titulo" >Agregar Producto</div>
    <div id="content">
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Marca:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="input-color" name="marca" type="text"/></br>

OEM Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="input-color" name="oem" type="text"/></br>
Color:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="input-color" name="color" type="text"/></br>
Compatibilidades:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea class="input-color" cols="34" rows="5" name="compatibilidades"></textarea></br>
Duracion:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="input-color" name="duracion" type="text"/></br>
Precio sin IVA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="input-color" name="precio_sin" type="text"/></br>
Precio con IVA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="input-color" name="precio_con" type="text"/></br>


<div class="centrado">
<input type=image src="../resources/images/agrega.png" name="Agregar" >
<input type=image src="../resources/images/buscar.gif" name="Buscar" >

</div>
</form>
</div>
<?php
if(isset($_POST['Agregar'])){
if (!empty($_POST)){
    $marca=$_POST['marca'];
    $oem=$_POST['oem'];
    $color=$_POST['color'];
    $compatibilidad=$_POST['compatibilidades'];
    $duracion=$_POST['duracion'];
    $precio_sin=$_POST['precio_sin'];
    $precion_con=$_POST['precio_con'];

$sql="insert into IMPRESORAS (marca, oem, color, uso_en, duracion, precio_sin, precio_con) values ('".$marca."', '".$oem."', '".$color."', '".$compatibilidad."', '".$duracion."', '".$precio_sin."', '".$precion_con."')";
$result= mysql_query($sql) or die(mysql_error());
printf ("Productos Agregados: %d\n", mysql_affected_rows());
mysql_query("COMMIT");
header('Location: index.php');
}
}
if(isset($_POST['Buscar'])){
	if (!empty($_POST)){
    $marca=$_POST['marca'];
    $oem=$_POST['oem'];
	$compatibilidad=$_POST['compatibilidades'];

if(isset($_POST['marca'])){	
$sql="select * from IMPRESORAS where marca LIKE '%$marca%'";
}
if(isset($_POST['oem'])){
$sql="select * from IMPRESORAS where oem LIKE '%$oem%'";
}
if(isset($_POST['compatibilidades'])){
$sql="select * from IMPRESORAS where uso_en LIKE '%$compatibilidad%'";	
}
$result= mysql_query($sql) or die(mysql_error());
mysql_query("COMMIT");
	echo $marca;
	}
	
if(mysql_num_rows($result)==0) die("No se encontraron datos");?>
	<div id="encuentros"><pre>
	
		<table border=1 cellpadding=4 cellspacing=0 >
			<tr>
				<th align=center > Marca </th>
				<th align=center > OEM </th>
				<th align=center > Color </th>
				<th align=center > Compatibilidad </th>
				<th align=center > Duracion </th>
				<th align=center > Precio sin IVA </th>
				<th align=center > Precio con IVA </th>
			</tr>

<?php		 

	while($row=mysql_fetch_array($result)){ 
		
		?>
			<tr>
				<td align=center > <?php echo $row['marca'] ?> </td>
				<td align=center > <?php echo $row['oem']; ?> </td>
				<td align=center > <?php echo $row['color']; ?> </td>
				<td align=center > <?php echo $row['uso_en']; ?> </td>
				<td align=center > <?php echo $row['duracion']; ?> </td>
				<td align=center > <?php echo $row['precio_sin']; ?> </td>
				<td align=center > <?php echo $row['precio_con']; ?> </td>
				
			</tr>
<?php
		
	}
	}

?>
		</table>
</div></pre>



</body>
</html>
