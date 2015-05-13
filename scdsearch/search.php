<html>
<head>
	<title>Biomass Catalysts Database</title>
	<script type="text/javascript">
		function dodel(id){
			if(confirm("confirm delete?")){
				window.location="action.php?action=del&id="+id;
			}
		}
	</script>
</head>
<body>
	<center>
	<?php include("menu.php"); ?>
		<h2>search  catalysts</h2>
			<form action="search.php" method="GET">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME:
				<input type="text" name="NAME" value="<?php echo $_GET['NAME']; ?>" /><br>
				&nbsp;&nbsp;&nbsp;FOMULAR: 
				<input type="text" name="FOMULAR" value="<?php echo $_GET['FOMULAR']; ?>" /><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMELL: 
				<input type="text" name="SMELL" value="<?php echo $_GET['SMELL']; ?>" /><br>
				STRUCTURE: <input type="text" name="STRUCTURE" value="<?php echo $_GET['STRUCTURE']; ?>" /><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PKA: 
				<input type="text" name="PKA" value="<?php echo $_GET['PKA']; ?>" /><br>
				HOMOenergy: <input type="text" name="HOMOenergy" value="<?php echo $_GET['HOMOenergy']; ?>" /><br>
				LUMOenergy: <input type="text" name="LUMOenergy" value="<?php echo $_GET['LUMOenergy']; ?>" /><br>
				<input type="button" value="all info" onclick="window.location='search.php'" />&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="search"/>
			</form>
		<br>		
		<table width="880" border="1">
			<tr>
				<th>NAME</th>
				<th>FOMULAR</th>
				<th>SMELL</th>
				<th>STRUCTURE</th>
				<th>PKA</th>
				<th>HOMOenergy</th>
				<th>LUMOenergy</th>
				<th>operation</th>
			</tr>
			
			<?php
				include("conn_mysql.php");
				$wherelist=array();
				$urllist=array();
				$NAME=$_GET["NAME"];
				$FOMULAR=$_GET["FOMULAR"];
				$SMELL=$_GET["SMELL"];
				$STRUCTURE=$_GET["STRUCTURE"];
				$PKA=$_GET["PKA"];
				$HOMOenergy=$_GET["HOMOenergy"];
				$LUMOenergy=$_GET["LUMOenergy"];

				if(!empty($NAME)){
					$wherelist[]="NAME like '%$NAME%'";
					$urllist[]="NAME=$NAME";
				}
				if(!empty($FOMULAR)){
					$wherelist[]="FOMULAR like '%$FOMULAR%'";
					$urllist[]="FOMULAR=$FOMULAR";
				}
				if(!empty($SMELL)){
					$wherelist[]="SMELL like '%$SMELL%'";
					$urllist[]="SMELL=$SMELL";
				}
				if(!empty($STRUCTURE)){
					$wherelist[]="STRUCTURE like '%$STRUCTURE%'";
					$urllist[]="STRUCTURE=$STRUCTURE";
				}
				if(!empty($PKA)){
					$wherelist[]="PKA like '%$PKA%'";
					$urllist[]="PKA=$PKA";
				}
				if(!empty($HOMOenergy)){
					$wherelist[]="HOMOenergy like '%$HOMOenergy%'";
					$urllist[]="HOMOenergy=$HOMOenergy";
				}
				if(!empty($LUMOenergy)){
					$wherelist[]="LUMOenergy like '%$LUMOenergy%'";
					$urllist[]="LUMOenergy=$LUMOenergy";
				}

				if(count($wherelist)>0){
					$where=" where ".implode(" and ",$wherelist);
					$url="&".implode('&',$urllist);
				}
				$page=isset($_GET["page"])?$_GET["page"]:1;
				$pageSize=3;
				$maxRows;
				$maxPages;  
				
				$sql="select count(*) from catalysts $where;";
				$result=mysql_query($sql);
				$maxRows=mysql_result($result,0,0);
				$maxPages=ceil($maxRows/$pageSize); 
				
				if($page>$maxPages){
					$page=$maxPages;
				}
				if($page<1){
					$page=1; 
				}
				
				$limit=" limit ".(($page-1)*$pageSize).",$pageSize";

				$sql="select * from catalysts $where $limit";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result)){
					echo "<tr>";
					  
					echo "<td>$row[1]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row[4]</td>";
					echo "<td>$row[5]</td>";
					echo "<td>$row[6]</td>";
					echo "<td>$row[7]</td>";
					echo "<td>
						<a href='javascript:dodel($row[0])'>delete</a> 
						| <a href='edit.php?id=$row[0]'>update</a></td>";
					
					echo "</tr>";
				}
				mysql_close();
			
			?>
		</table>
		<?php
			echo "<br>";
			echo "current page: $page/$maxPages, total data: $maxRows  ";
			echo " <a href='search.php?page=1$url'>first</a>";
			echo " <a href='search.php?page=". ($page-1) ."$url'>before</a>";
			echo " <a href='search.php?page=". ($page+1) ."$url'>next</a>";
			echo " <a href='search.php?page=$maxPages$url'>last</a>";
		?>

	</center>
</body>
</html>
