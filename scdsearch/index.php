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
		<h2>view catalysts</h2>
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
				
				$page=isset($_GET["page"])?$_GET["page"]:1;
				$pageSize=3;
				$maxRows;
				$maxPages;  
				
				$sql="select count(*) from catalysts";
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

				$sql="select * from catalysts $limit";
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
			echo " <a href='index.php?page=1'>first</a>";
			echo " <a href='index.php?page=". ($page-1) ."'>before</a>";
			echo " <a href='index.php?page=". ($page+1) ."'>next</a>";
			echo " <a href='index.php?page=$maxPages'>last</a>";
		?>
	</center>
</body>
</html>
