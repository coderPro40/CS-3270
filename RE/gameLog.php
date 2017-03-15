<html>
<head>
	<title>GameLog</title>
	<LINK REL="stylesheet" HREF="pbw.css" TYPE="text/css">
</head>
<body>
	<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
		<TR VALIGN=BOTTOM>
			<TD ALIGN=LEFT><h1><B>GAME LOG</B></h1></TD>
		</TR>
	</TABLE>
	<hr>
	
	<?php
	readfile("gameLog.txt");
	$c = $_REQUEST['c'];
	echo "<br><a href=".$c."?return&r=1>Return To Game</a>";
	?>
		
</body>
</html>
