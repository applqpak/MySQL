# MySQL

####A simple yet useful MySQL API.

#Tutorial

###Connecting to a MySQL Server:

`<?php include("MySQL.php"); $MySQL = new MySQL("localhost", 3306, "root", ""); ?>`

###Querying the MySQL Database:

`<?php include("MySQL.php"); $MySQL = new MySQL("localhost", 3306, "root", ""); if($MySQL) { $query = "CREATE DATABASE test;"; $MySQL->query($query); } ?>`

###Closing the connection to the MySQL Server:

`<?php include("MySQL.php"); $MySQL = new MySQL("localhost", 3306, "root", ""); if($MySQL) { $query = "CREATE DATABASE test;"; $MySQL->query($query); } $MySQL->close(); ?>`

#Functions:

###MySQL::__construct($host, $port, $username, $password)

###MySQL::query($query, $fetch_assoc) - $fetch_assoc should be either true or false, Pretty self-explanatory.

###MySQL::close(void)
