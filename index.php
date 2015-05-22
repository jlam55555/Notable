<?php

	// Start session; Sign in user; Get tools
	session_start();
	$user = isset($_SESSION["user"]) ? $_SESSION["user"] : false;
	include "res/tools.php";
	
	// Connect to database
	$db = new PDO("mysql:host=localhost;dbname=notable", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Validate sign-in / sign-up
	if(!$user && isset($_POST["sign"]))
		if($_POST["sign"] == "in") {
			
			// Create validatable objects
			$username = new Data($_POST["user"],"user",2,30);
			$pass = new Data($_POST["pass"],"pass",8,30);
			
		} else {
			
			// Create validatable objects
			$fname = new Data($_POST["fname"],"text",2,30);
			$lname = new Data($_POST["lname"],"text",2,30);
			$email = new Data($_POST["email"],"email",8,50);
			$username = new Data($_POST["user"],"user",2,30);
			$pass1 = new Data($_POST["pass1"],"pass",8,30);
			$pass2 = new Data($_POST["pass2"],"pass",8,30);
			
		}

?>

<!DOCTYPE HTML>

<!-- Notable website by Jonathan Lam -->
<HTML>

	<HEAD>
		
		<TITLE>Notable</TITLE>
		<META charset="utf-8" />
		<META name="description" content="A tool to conveniently store and manage notes for easy review." />
		<META name="keywords" content="notable, note, manage, search, tool, school, jonathan lam" />
		<META name="author" content="Jonathan Lam" />
		<LINK rel="stylesheet" type="text/css" href="res/style.css" />
		<SCRIPT src="res/script.js"></SCRIPT>
		
	</HEAD>
	<BODY>
		
		<!-- Header -->
		<DIV>
			<H1>Notable</H1>
			<SPAN>
				<?php if(!$user) echo "Sign in or sign up."; else echo "Welcome, $user." ?>
			</SPAN>
		</DIV>
		
		<?php
			
			// if not signed in
			if(!$user) {
				
		?>
		
			<!-- Sign In form -->
			<FORM method="post">
			<FIELDSET>
			<LEGEND><H3>Sign In</H3></LEGEND>
			
			<input type="hidden" name="sign" value="in" />
				
				<TABLE>
					<TR>
						<TD>Username</TD>
						<TD><INPUT type="text" name="user" /></TD>
					</TR>
					<TR>
						<TD>Password</TD>
						<TD><INPUT type="password" name="pass" /></TD>
					</TR>
					<TR>
						<TD colspan="2">
							<BUTTON type="submit">Sign In</BUTTON>
						</TD>
					</TR>
				</TABLE>
				
			</FIELDSET>
			</FORM>

			<!-- Sign Up form -->
			<FORM method="post">
			<FIELDSET>
			<LEGEND><H3>Sign Up</H3></LEGEND>
			
			<input type="hidden" name="sign" value="up" />
			
				<TABLE>
					<TR>
						<TD>First Name</TD>
						<TD><INPUT type="text" name="fname" /></TD>
					</TR>
					<TR>
						<TD>Last Name</TD>
						<TD><INPUT type="text" name="lname" /></TD>
					</TR>
					<TR>
						<TD>Email</TD>
						<TD><INPUT type="text" name="email" /></TD>
					</TR>
					<TR>
						<TD>Username</TD>
						<TD><INPUT type="text" name="user" /></TD>
					</TR>
					<TR>
						<TD>Password</TD>
						<TD><INPUT type="password" name="pass1" /></TD>
					</TR>
					<TR>
						<TD>Password again</TD>
						<TD><INPUT type="password" name="pass2" /></TD>
					</TR>
					<TR>
						<TD colspan="2">
							<BUTTON type="submit">Sign Up</BUTTON>
						</TD>
					</TR>
				</TABLE>
		
		<?
			
			// end if not signed in; if signed in
			} else {
			
		?>
		
		
		<?php 
			
			// end if signed in
			}
			
		?>
		
	</BODY>

</HTML>