<html>
<head>
	<title>Biomass Catalysts Database</title>
</head>
<body>
	<center>
	<?php include("menu.php"); ?>
	<h2>add catalysts</h2>
	<form action="action.php?action=add" method="post">
		<table width="320" border="0" cellpadding="3">
			<tr>
				<td align="right">NAME:</td>
				<td><input type="text" name="cNAME"/></td>
			</tr>
			<tr>
				<td align="right">FOMULAR:</td>
				<td><input type="text" name="cFOMULAR"/></td>
			</tr>
			<tr>
				<td align="right">SMELL:</td>
				<td><input type="text" name="cSMELL"/></td>
            </tr>
			<tr>
                <td align="right">STRUCTURE:</td>
                <td><input type="text" name="cSTRUCTURE"/></td>
            </tr>
			<tr>
                <td align="right">PKA:</td>
                <td><input type="text" name="cPKA"/></td>
            </tr>
			<tr>
                <td align="right">HOMOenergy:</td>
                <td><input type="text" name="cHOMOenergy"/></td>
            </tr>
			<tr>
                <td align="right">LUMOenergy:</td>
                <td><input type="text" name="cLUMOenergy"/></td>
            </tr>
			<tr>
				<td colspan="2" align="center">
					<input type="reset" value="reset" style="font-size:15px;width:60px;height:30px"/>&nbsp &nbsp
					<input type="submit" value="submit" style="font-size:15px;width:60px;height:30px">
				</td>
            </tr>
		</table>
	</form>
	</center>
</body>
</html>
