<?php
    $serverName="chemistry-hpc.newhaven.edu";
    $userName="root";
    $password="unh1234";
    $databaseName="database_search";

	$conn=mysql_connect($serverName,$userName,$password)or die("connect database server error!");
    mysql_select_db($databaseName,$conn);
	 mysql_query("set names 'utf8'");
?>
