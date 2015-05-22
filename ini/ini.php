<?php

	// Initiate databases
	try {
		
		// Refresh database
		$new_db = new PDO("mysql:host=localhost", "root", "");
		$new_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {$new_db->exec("DROP DATABASE notable");} catch(Exception $e) {}
		$new_db->exec("CREATE DATABASE notable");
		echo "Database 'notable' refreshed successfully.<br />";
		
		// Refresh table
		$new_table = new PDO("mysql:host=localhost;dbname=notable", "root", "");
		try {$new_table->exec("DROP TABLE users");} catch(Exception $e) {}
		$new_table->exec("CREATE TABLE users(user CHAR(30) PRIMARY KEY, pass CHAR(64), fname CHAR(30), lname CHAR(30), email CHAR(64))");
		echo "Table 'users' refreshed successfully.<br />";
		
	// Catch exception
	} catch(PDOException $e) {
		
		echo $e->getMessage();
		
	}

?>