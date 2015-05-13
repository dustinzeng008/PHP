<?php
	include("conn_mysql.php");

	switch($_GET["action"]){
		case "add":
			$cNAME=$_POST["cNAME"];
			$cFOMULAR=$_POST["cFOMULAR"];
			$cSMELL=$_POST["cSMELL"];
			$cSTRUCTURE=$_POST["cSTRUCTURE"];
			$cPKA=$_POST["cPKA"];
			$cHOMOenergy=$_POST["cHOMOenergy"];
			$cLUMOenergy=$_POST["cLUMOenergy"]; 
			$sql="insert into catalysts values('','$cNAME','$cFOMULAR','$cSMELL','$cSTRUCTURE','$cPKA','$cHOMOenergy','$cLUMOenergy')";
			$result=mysql_query($sql);
			if(!$result){
				echo "insert fail!";
			}else{
				echo "insert success!";
			}
			echo "<br>";
			echo "<a href='javascript:window.history.back();'>back</a>&nbsp &nbsp";
			echo "<a href='index.php'>view catalysts</a>";
			break;
		case "del":
			$id=$_GET['id'];
			$sql="delete from catalysts where id=$id";
			mysql_query($sql);

			header("Location:index.php");
			break;
		case "update":
			$cNAME=$_POST["cNAME"];
			$cFOMULAR=$_POST["cFOMULAR"];
			$cSMELL=$_POST["cSMELL"];
			$cSTRUCTURE=$_POST["cSTRUCTURE"];
			$cPKA=$_POST["cPKA"];
			$cHOMOenergy=$_POST["cHOMOenergy"];
			$cLUMOenergy=$_POST["cLUMOenergy"];
			$id=$_POST["id"];
			$sql="update catalysts set NAME='$cNAME', FOMULAR='$cFOMULAR', SMELL='$cSMELL', STRUCTURE='$cSTRUCTURE',
				PKA='$cPKA', HOMOenergy='$cHOMOenergy', LUMOenergy='$cLUMOenergy' where id='$id'";
			//echo $sql;
			mysql_query($sql);
			header("Location:index.php");
			break;
	}

 mysql_close();
?>
