<html>
<head>
<title>Shrimp DataBase</title>
</head>

<body>
	
	<?php
	$conn = mysql_connect("localhost", "rmartushev", "oq9477zg");
	$res = mysql_select_db("rmartushev");
	$res = mysql_query("select * from LogFile");
	?>
	<table border=1px>
	<?
	$r = mysql_num_rows($res);
	$c = mysql_num_fields($res);
	print "<tr>";
	for ($i=0;$i<$c;$i++)
	{
		print "<th>".mysql_field_name($res, $i) . "</th>";
		
	}
	print "</tr>";
	
	for ($i=0;$i<$r;$i++)
	{
		print "<tr>";
		$row = mysql_fetch_row($res);
		for ($j=0;$j<$c;$j++)
		{
			print "<td>".$row[$j] . "</td>";
		}
		print "</tr>";
	}
	?>
	</table>
	<?
	$res = mysql_query("select * from Tiles");
	?>
	<table border=1px>
	<?
	$r = mysql_num_rows($res);
	$c = mysql_num_fields($res);
	print "<tr>";
	for ($i=0;$i<$c;$i++)
	{
		print "<th>".mysql_field_name($res, $i) . "</th>";
		
	}
	print "</tr>";
	
	for ($i=0;$i<$r;$i++)
	{
		print "<tr>";
		$row = mysql_fetch_row($res);
		for ($j=0;$j<$c;$j++)
		{
			print "<td>".$row[$j] . "</td>";
		}
		print "</tr>";
	}
	?>
	</table>
	<?
	mysql_close($conn);
	?>
	
</body>
</html>
