<?php
	// This enables or disables action 1
	
	function action1ED($one=0) {
		if ($one == 1)
			echo "<TD><IMG SRC=game/reef/images/a1d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 1</B>:</B> Eat one coral and a shrimp with your parrotfish<BR>(once at start of turn only)</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php'><IMG SRC=game/reef/images/a1d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 1</B>:</A>Eat one coral and a shrimp with your parrotfish<BR>(once at start of turn only)</TD>";
	}
	// This enables or disables action 2
	
	function action2ED($two=0) {
		if ($two == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a2.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT BORDER=0> <B>Action 2:</B></A></B> Play a larva cube and polyp tiles<BR>(only once per turn)</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php?act=chooselarva&w=1&two=1'><IMG SRC=game/reef/images/a2.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT BORDER=0> <B>Action 2:</B></A>Play a larva cube and polyp tiles<BR>(only once per turn)</TD>";
	}
	// This enables or disables action 3
	
	function action3ED($three=0) {
		if ($three == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a3d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 3</B>:</B> Play a second larva cube and polyp tiles<BR>(only once per turn)</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php?act=chooselarva&w=1&action=1&three=1'><IMG SRC=game/reef/images/a3d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 3</B>:</A>Play a second larva cube and polyp tiles<BR>(only once per turn)</TD>";
	}
	// This enables or disables action 4
	
	function action4ED($four=0) {
		if ($four == 1)
			echo "<TD WIDTH=50%><IMG SRC='game/reef/images/a4.jpg' WIDTH='50' HEIGHT='32' ALIGN=LEFT BORDER=0> <B>Action 4:</B></B> Introduce a shrimp<BR>(only once per turn)</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php?act=shrimplocs&r=0'><IMG SRC='game/reef/images/a4.jpg' WIDTH='50' HEIGHT='32' ALIGN=LEFT BORDER=0> <B>Action 4:</B></A>Introduce a shrimp<BR>(only once per turn)</TD>";
	}
	// This enables or disables action 5
	
	function action5ED($five=1) {
		if ($five == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a5d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 5</B>:</B> Move or remove a shrimp</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php?action=moveShrimp&ms=0'><IMG SRC=game/reef/images/a5d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 5</B>:</A>Move or remove a shrimp</TD>";
	}
	// This enables or disables action 6
	
	function action6ED($six=0) {
		if ($six == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a6d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 6</B>:</B> Exchange a consumed polyp tile for a larva cube of the same colour (larva cube must be played immediately)</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php'><IMG SRC=game/reef/images/a6d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 6</B>:</A>Exchange a consumed polyp tile for a larva cube of the same colour (larva cube must be played immediately)</TD>";
	}
	// This enables or disables action 7
	
	function action7ED($seven=0) {
		if ($seven == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a7d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 7</B>:</B> Acquire and play an alga cylinder</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php'><IMG SRC=game/reef/images/a7d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 7</B>:</A>Acquire and play an alga cylinder</TD>";
	}
	// This enables or disables action 8
	
	function action8ED($eight=0) {
		if ($eight == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a8.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT BORDER=0> <B>Action 8:</B></A></B> Exchange a larva cube for a polyp tile of the same colour</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php'><IMG SRC=game/reef/images/a8.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT BORDER=0> <B>Action 8:</B></A>Exchange a larva cube for a polyp tile of the same colour</TD>";
	}
	// This enables or disables action 9
	
	function action9ED($nine=0) {
		if ($nine == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a9d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 9</B>:</B> Do none of the above</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php'><IMG SRC=game/reef/images/a9d.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT> <B>Action 9</B>:</A>Do none of the above</TD>";
	}
	// This enables or disables action 10
	
	function action10ED($ten=0) {
		if ($ten == 1)
			echo "<TD WIDTH=50%><IMG SRC=game/reef/images/a10.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT BORDER=0> <B>Action 10:</B></A></B> Collect a larva cube and polyp tiles from the open sea<BR>(must do once, at end of turn only)</TD>";
		else
			echo "<TD WIDTH=50%><A HREF='hw7db.php'><IMG SRC=game/reef/images/a10.jpg WIDTH=50 HEIGHT=32 ALIGN=LEFT BORDER=0> <B>Action 10:</B></A>Collect a larva cube and polyp tiles from the open sea<BR>(must do once, at end of turn only)</TD>";
	}
?>
