<html>
<head>
	<title>Biomass Catalysts Database</title>
</head>
<body>
	<center>
	<?php 
		include("menu.php"); 
		include("conn_mysql.php");
		$sql="select * from catalysts where id='$_GET[id]'";
		$result=mysql_query($sql);
		if($result&&mysql_num_rows($result)>0){
			$theCatalysts=mysql_fetch_array($result);
		}else{
			die("sorry,not found the data!");
		}
	?>
	<h2>edit catalysts</h2>
	<form action="action.php?action=update" method="post">
		<input type="hidden" name="id" value="<?php echo $theCatalysts[0]; ?>"/>
		<table width="320" border="0" cellpadding="3">
			<tr>
				<td align="right">NAME:</td>
				<td><input type="text" name="cNAME" value="<?php echo $theCatalysts[1]; ?>"/></td>
			</tr>
			<tr>
				<td align="right">FOMULAR:</td>
				<td><input type="text" name="cFOMULAR" value="<?php echo $theCatalysts[2]; ?>"/></td>
			</tr>
			<tr>
				<td align="right">SMELL:</td>
				<td><input type="text" name="cSMELL" value="<?php echo $theCatalysts[3]; ?>"/></td>
            </tr>
			<tr>
                <td align="right">STRUCTURE:</td>
                <td><input type="text" name="cSTRUCTURE" value="<?php echo $theCatalysts[4]; ?>"/></td>
            </tr>
			<tr>
                <td align="right">PKA:</td>
                <td><input type="text" name="cPKA" value="<?php echo $theCatalysts[5]; ?>"/></td>
            </tr>
			<tr>
                <td align="right">HOMOenergy:</td>
                <td><input type="text" name="cHOMOenergy" value="<?php echo $theCatalysts[6]; ?>"/></td>
            </tr>
			<tr>
                <td align="right">LUMOenergy:</td>
                <td><input type="text" name="cLUMOenergy" value="<?php echo $theCatalysts[7]; ?>"/></td>
            </tr>
			<tr>
				<td colspan="2" align="center">
					<input type="reset" value="reset" style="font-size:15px;width:60px;height:30px"/>&nbsp &nbsp
					<input type="submit" value="edit" style="font-size:15px;width:60px;height:30px">
				</td>
            </tr>
		</table>
	</form>
	</center>
</body>
</html>
