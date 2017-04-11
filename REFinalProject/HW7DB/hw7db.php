<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML LANG="en">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Reef Encounter </TITLE>
<LINK REL="stylesheet" HREF="pbw.css" TYPE="text/css">
</HEAD>
<BODY>
<script language="JavaScript" type="text/javascript">var ol_width = 60;</script>
<DIV ID="overDiv" STYLE="position:absolute; visibility:hidden; z-index:1000;"></DIV>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript" SRC="overlib.js"><!-- overLIB (c) Erik Bosrup --></SCRIPT>
<DIV CLASS=normal_text>
	<TABLE CELLPADDING=3 CELLSPACING=0 WIDTH="100%">
		
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                 This is the heading which contains the heading all the way up to Rules  
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
		<TR>
			<TD>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
					<TR>
						<TD COLSPAN=3>
							<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
								<TR VALIGN=BOTTOM>
									<TD ALIGN=LEFT><h1><B>REEF ENCOUNTER</B></h1></TD>
									<TD ALIGN=right><b>|</b><A CLASS=menu HREF="hw7db.php?act=returnpage&n=2">New Game</A><b>|</b></TD>
									<TD ALIGN=right><b>|</b><A CLASS=menu HREF="gameLog.php?act=returnpage&g=hw7db.php">Display_Log file</A><b>|</b></TD>
									<TD ALIGN=right><b>|</b><A CLASS=menu HREF="hw7db.php?act=saveGame&s=1">Save_Game State</A><b>|</b></TD>
									<TD ALIGN=right><b>|</b><A CLASS=menu HREF="saveGame.php?s=2">Show Saved Game</A><b>|</b></TD>
									<TD ALIGN=right><b>|</b><A CLASS=menu HREF="../rules.html">Rules</A><b>|</b></TD>
									<?php
									// script for handling game saving and saved game display and new game
									$s = filter_input(INPUT_GET, "s");
									$n = filter_input(INPUT_GET, "n");
									if($s == 1){
										include_once 'saveGame.php'; // get saveGame file
										$sb0 = $_SESSION["sb0"];    // always guaranteed that this will be filled as it'll only occur after initial script
										$sb3 = $_SESSION["sb3"];
										$rf0 = $_SESSION['rf0'];
										$rf3 = $_SESSION['rf3'];
										saveFile($sb0, $sb3);       // save file if button is clicked
										saveFile2($rf0,$rf3);
									}
									if($n == 2){
										// create connection to mysql database
										$conn = mysql_connect("localhost", "tofurum", "si1170zv");
										mysql_select_db("tofurum");

										// delete and recreate Files table to avoid double instanciation
										mysql_query("delete from Files"); 
										mysql_query("Create table Files (GameLog varchar(50))");
										
										mysql_close($conn);             	// close db
										
										session_unset();                	// clear everything and start new game
										header('Location:../start.php');	// return to start page
										exit;
									}
									?>
								</TR>
							</TABLE>
						</TD>
					</TR>
					<TR>
						<TD COLSPAN=3 BGCOLOR=0066CC HEIGHT=1></TD>
					</TR>
					<TR>
						<TD COLSPAN=3 HEIGHT=1></TD>
					</TR>
					<TR>
						<TD COLSPAN=3>
							<TABLE WIDTH=100% CELLPADDING=0 CELLSPACING=0>
								<TR VALIGN=TOP>
									<TD WIDTH=50%>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH=100%>
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH=100%>
														<TR ALIGN=CENTER>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                                                                                        This is the heading for the player score chart
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Player</SPAN></TD>
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Consumed<BR>Polyp Tiles</SPAN></TD>
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Shrimp<BR>Eaten</SPAN></TD>
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Initial larva cubes</SPAN></TD>
														</TR>
														
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                        This shows player 1 and his scores all the way up to how many initial larva cubes
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                                                                
														<TR ALIGN=CENTER VALIGN=TOP BGCOLOR=#FFFF70>
															<TD CLASS=thin ALIGN=LEFT>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<TD><IMG SRC="images/P.gif" WIDTH=16 HEIGHT=16 ALT="P" ALIGN=ABSMIDDLE>&nbsp;</TD>
																		<TD>Player1</TD>
																	</TR>
																</TABLE>
															</TD>
															<TD CLASS=thin>&nbsp;</TD>
															<TD CLASS=thin>&mdash;</TD>
															<TD CLASS=thin>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<?php
																			include_once "playerInfo.php";
																			player1();	// displays player 1s info
																		?>
															<TD>&nbsp;</TD>
															<TD>&nbsp;</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                This shows player 2 and his scores all the way up to how many initial larva cubes
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<TR ALIGN=CENTER VALIGN=TOP >
															<TD CLASS=thin ALIGN=LEFT>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<TD><IMG SRC="images/G.gif" WIDTH=16 HEIGHT=16 ALT="G" ALIGN=ABSMIDDLE>&nbsp;</TD>
																		<TD>Player2</TD>
																	</TR>
																</TABLE>
															</TD>
															<TD CLASS=thin>&nbsp;</TD>
															<TD CLASS=thin>&mdash;</TD>
															<TD CLASS=thin>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<?php
																			include_once "playerInfo.php";
																			player2();						// displays player 2s info
																		?>
															<TD>&nbsp;</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
									<TD WIDTH=10></TD>
									<TD>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                This is the heading that contains Behind your screen
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
															<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Behind Your Screen</SPAN></TD>
														</TR>
														
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                This is where the number of the players polyp tiles are shown
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<TR>
															<TD CLASS=border>
																<TABLE>
																	<TR>
																		<TD ALIGN=left>Polyp Tiles:</TD>
																		<TD></TD>
																		<?php
																			include_once "BehindYourScreen.php";
																			polypTilesArray();	// displays players polyptiles
																		?>
																	</TR>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                    This is where the number of the players larva cubes are shown
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
																	<TR>
																		<TD ALIGN=left>Larva Cubes:</TD>
																		<TD></TD>
																		<?php
																			include_once "BehindYourScreen.php";
																			larvaCubesArray();	// displays players larva cubes
																		?>
																	</TR>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                    This shows how many shrimp the player still has (that are not eaten)
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                                                                                <TR>
																	<TR>
																		<TD ALIGN=left>Shrimp:</TD>
																		<TD></TD>
																		<?php
																			include_once "BehindYourScreen.php";
																			shrimpArray();	// displays player 1s info
																		?>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                        This shows what is inside the players parrotfish
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                    <TD WIDTH=10></TD>
									<TD WIDTH=10></TD>
									<TD>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
															<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>In Your Parrotfish</SPAN></TD>
														</TR>
														<TR>
															<TD CLASS=border>
																<TABLE WIDTH=100%>
																	<TR ALIGN=CENTER>
																		<TD>
																			<TABLE CELLSPACING=0 CELLPADDING=0>
																				<TR>
																					<?php
																						include_once "parrotFish.php";
																						parrotFish();						// displays players parrotfish info
																					?>
																					<TD>&nbsp;</TD>
																				</TR>
																			</TABLE>
																		</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
								</TR>
								
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                        This contains the heading Choose an Action and the entire Action list all the way until [start your turn over]
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->								<TR>
								<TR>
									<TD COLSPAN=5>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=borderred>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
															<TD CLASS=borderred BGCOLOR='#FF3333'><SPAN CLASS=yellow_text_bold>Choose an Action</SPAN></TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<TABLE WIDTH=100%>
																	<TR>
																		<?php
																			$a2 = filter_input(INPUT_GET, 'w');
																			if($a2 != 1){
																				include_once "action4Disable.php";
																				action1ED();						// enable/ disable action4
																		?>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<TABLE WIDTH=100%>
																	<TR>
																		<?php
																				include_once "action4Disable.php";
																				if (isset($_SESSION['two']))
																				{
																					$two = $_SESSION['two'];
																					action2ED($two);		// enable/ disable action2
																				}
																				else
																					action2ED();		// enable/ disable action2
																				include_once "action4Disable.php";
																				action6ED();						// enable/ disable action4
																		?>
																	</TR>
																	<TR>
																		<?php
																				include_once "action4Disable.php";
																				if (isset($_SESSION['three']))
																				{
																					$three = $_SESSION['three'];
																					action3ED($three);						// enable/ disable action4
																				}
																				else
																					action3ED();						// enable/ disable action4
																				include_once "action4Disable.php";
																				action7ED();						// enable/ disable action4
																		?>
																	</TR>
																	<TR>
																		<?php
																				include_once "action4Disable.php";
																				$four = filter_input(INPUT_GET, 'four');
																				if ($four == 1)
																					$_SESSION['four'] = $four;
																					
																				if (isset($_SESSION['four']))
																				{
																					$four = $_SESSION['four'];
																					action4ED($four);						// enable/ disable action4
																					$_SESSION['five'] = 0;
																				}
																				else
																					action4ED();						// enable/ disable action4
																				include_once "action4Disable.php";
																				action8ED();						// enable/ disable action4
																		?>
																	</TR>
																	<TR>
																		<?php
																				include_once "action4Disable.php";
																				if (isset($_SESSION['five']))
																				{
																					$five = $_SESSION['five'];
																					action5ED($five);						// enable/ disable action4
																				}
																				else
																					action5ED();						// enable/ disable action4
																			
																				include_once "action4Disable.php";
																				action9ED();						// enable/ disable action4
																		?>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<TABLE WIDTH=100%>
																	<TR>
																		<?php
																				include_once "action4Disable.php";
																				action10ED();						// enable/ disable action4
																			}
																			else{
																				include_once "action2.php";
																				displayCubes();
																				$action = filter_input(INPUT_GET, 'action');
																				if ($action==1)
																				{
																					unset($_SESSION['num']);
																					unset($_SESSION['num1']);
																					unset($_SESSION['type']);
																				}
																				$two = filter_input(INPUT_GET, 'two');
																				if ($two == 1)
																					$_SESSION['two'] = $two;
																				
																				$three = filter_input(INPUT_GET, 'three');
																				if ($three == 1)
																					$_SESSION['three'] = $three;
																			}
																		?>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<P><A HREF="hw7db.php?act=reset&p=1">[Start your turn over]</A></P>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
								</TR>
								<TR VALIGN=TOP>
									<TD COLSPAN=5>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
															<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Game Board</SPAN></TD>
														</TR>
														<TR>
															<TD CLASS=border>
																<TABLE CELLPADDING=0 CELLSPACING=0 WIDTH="100%">
																	<TR>
																		<TD ALIGN=CENTER>
																			<TABLE CELLPADDING=0 CELLSPACING=2>
																				<TR ALIGN=CENTER VALIGN=BOTTOM>
																					<TD>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                                                These are the numbered squares that show which coral has control over others
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct00.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>1</B>
																					</TD>
																					<TD>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct10.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>2</B>
																					</TD>
																					<TD>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct20.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>3</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct30.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>4</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct40.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>5</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct50.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>6</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct60.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>7</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct70.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>8</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct80.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>9</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct90.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>10</B>
																					</TD>
																				</TR>
																			</TABLE>
																			
																			<P>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                        This shows the larva cube and polyp tiles you collect when Action 10 is executed
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->																			<TABLE CELLPADDING=2 CELLSPACING=2 BORDER=0>
																			<TABLE CELLPADDING=2 CELLSPACING=2 BORDER=0>
																				<TR ALIGN=CENTER VALIGN=TOP>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l0.gif ALT=[w] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+6 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l1.gif ALT=[y] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+9 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p1.jpg" HEIGHT=32 WIDTH=32 ALT="y"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l2.gif ALT=[o] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+8 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p2.jpg" HEIGHT=32 WIDTH=32 ALT="o"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l3.gif ALT=[p] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+9 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p2.jpg" HEIGHT=32 WIDTH=32 ALT="o"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p3.jpg" HEIGHT=32 WIDTH=32 ALT="p"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l4.gif ALT=[g] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+9 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD></TD>
																					<TD WIDTH=110 VALIGN=TOP STYLE="border: solid 1px black; font-size: 11px; font-weight: bold; padding-top: 6px;">Alga Cylinder Space<BR><BR><BR>none</TD>
																				</TR>
																			</TABLE>
																			
																			<P>
																			
																			<TABLE CELLPADDING=0 CELLSPACING=5>
																				<TR VALIGN=TOP>
																					<TD>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                                                This gives you the row and column heading for the left gameboard and also the first 
																						corals that start on the board as well as the gameboard its self
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->																						<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC="game/reef/images/b0.jpg" ></SPAN>
																						<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC="game/reef/images/b0.jpg" ></SPAN>
																							<?php
																																														if (isset($_SESSION['rf0']))
																																															$rf0 = $_SESSION['rf0'];
																																														else
																																															$rf0 = array(0=>'x','x','x','','','','x','x','','','y','','','x','','','x','','w','','','','g','','_','','x','','','','p','x','o','','','','','','','','','');
																																														
																																														if (isset($_SESSION['rf3']))
																																															$rf3 = $_SESSION['rf3'];
																																														else
																																															$rf3 = array(0=>'x','','','','','','x','','','','o','x','','','','','x','','g','','','','w','','_','','','','x','','p','','y','','x','x','','','x','','','x');
                                                                                                                                                                                        // get URL r = 0 to show player clicked action 4
                                                                                                                                                                                        $r = (isset($_GET['r'])) ? filter_input(INPUT_GET, 'r'): 1;
                                                                                                                                                                                        $prompt = ($r == 0)? true: false;   // check to see if current pass is action 4 or not
                                                                                                                                                                                        
                                                                                                                                                                                        include_once 'action4.php';         // include action 4 file
                                                                                                                                                                                        include_once 'shrimpBrdOne.php';    // include file with shrimp1 php implementation        
                                                                                                                                                                                        include_once 'placeTiles.php';
                                                                                                                                                                                        showBoard($rf0);
                                                                                                                                                                                        showTiles1();
                                                                                                                                                                                        ?>
																							<SPAN STYLE="left:44; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">A</SPAN>
																							<SPAN STYLE="left:84; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">B</SPAN>
																							<SPAN STYLE="left:124; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">C</SPAN>
																							<SPAN STYLE="left:164; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">D</SPAN>
																							<SPAN STYLE="left:204; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">E</SPAN>
																							<SPAN STYLE="left:244; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">F</SPAN>
																							<SPAN STYLE="left:284; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">G</SPAN>
																							
																							<SPAN STYLE="left:0; top:39; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">1</SPAN>
																							<SPAN STYLE="left:0; top:79; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">2</SPAN>
																							<SPAN STYLE="left:0; top:119; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">3</SPAN>
																							<SPAN STYLE="left:0; top:159; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">4</SPAN>
																							<SPAN STYLE="left:0; top:199; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">5</SPAN>
																							<SPAN STYLE="left:0; top:239; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">6</SPAN>
                                                                                                                                                                                        <?php
                                                                                                                                                                                            if($prompt == true){    // if action 4 was just pressed
                                                                                                                                                                                                placeTarget0();     // run action 4 command for markers on board
                                                                                                                                                                                            }
                                                                                                                                                                                            $r = filter_input(INPUT_GET, 'r');
                                                                                                                                                                                            $place = filter_input(INPUT_GET, 'place');
                                                                                                                                                                                            $num = filter_input(INPUT_GET, 'num');
                                                                                                                                                                                            $num1 = filter_input(INPUT_GET, 'num1');
                                                                                                                                                                                            if ($place != '' or $num != 0 or $num1 !=0)
																																																placeTileTargets($place);
																																															$ms = filter_input(INPUT_GET, 'ms');
																																															if ($ms != '')
																																															{
																																																include_once 'action5.php'; // include file with php declarations
																																																moveShrimp();
																																																showMoveShrimp();
																																															}
																																															$mv = filter_input(INPUT_GET, 'mv');
																																															if ($mv != '' and $r == '')
																																															{
																																																include_once 'action5.php';
																																																placeTargetM0();
																																															}
																																															showShrimp1($prompt);
                                                                                                                                                                                        ?>
                                                                                                                                                                                </DIV>
																					</TD>
																					
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                                        This gives you the row and column heading for the right gameboard and also the first 
                                                                                                                                                                        corals that start on the board as well as the gameboard its self
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
																					<TD>
																						<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC="game/reef/images/b3.jpg" ></SPAN>
                                                                                                                                                                                        <?php
                                                                                                                                                                                        include_once 'shrimpBrdTwo.php'; // include file with php declarations
                                                                                                                                                                                        showBoard($rf3);
                                                                                                                                                                                        showTiles2();
                                                                                                                                                                                        
                                                                                                                                                                                        ?>
																							<SPAN STYLE="left:44; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">H</SPAN>
																							<SPAN STYLE="left:84; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">I</SPAN>
																							<SPAN STYLE="left:124; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">J</SPAN>
																							<SPAN STYLE="left:164; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">K</SPAN>
																							<SPAN STYLE="left:204; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">L</SPAN>
																							<SPAN STYLE="left:244; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">M</SPAN>
																							<SPAN STYLE="left:284; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">N</SPAN>
																							<SPAN STYLE="left:320; top:39; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">1</SPAN>
																							<SPAN STYLE="left:320; top:79; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">2</SPAN>
																							<SPAN STYLE="left:320; top:119; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">3</SPAN>
																							<SPAN STYLE="left:320; top:159; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">4</SPAN>
																							<SPAN STYLE="left:320; top:199; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">5</SPAN>
																							<SPAN STYLE="left:320; top:239; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">6</SPAN>
                                                                                                                                                                                        <?php
                                                                                                                                                                                            if($prompt == true){    // if action 4 was just pressed
                                                                                                                                                                                                placeTarget1();     // run action 4 command for markers on board
                                                                                                                                                                                            }
                                                                                                                                                                                            if ($place != '' or $num != 0 or $num1 !=0)
																																																placeTileTargets2($place);
																																															if ($ms != '')
																																															{
																																																include_once 'action5.php'; // include file with php declarations
																																																showMoveShrimp2();
																																															}
																																															if ($mv != '' and $r == '')
																																															{
																																																include_once 'action5.php';
																																																placeTargetM1();
																																															}
																																															showShrimp2($prompt);
                                                                                                                                                                                        ?>
                                                                                                                                                                                </DIV>
																					</TD>
																				</TR>
																			</TABLE>
																		</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
									</TD>
								</TR>
							</TABLE>
						</TD>
					</TR>
				</TABLE>
				<BR>
			</TD>
		</TR>
	</TABLE>
	</DIV>
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-3991266-1");
		pageTracker._initData();
		pageTracker._trackPageview();
	</script>
</BODY>
</HTML>

