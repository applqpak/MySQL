# MySQL
A simple yet useful MySQL API.

#Tutorial
###Connecting to a MySQL Server:

`<?php include("MySQL.php"); $MySQL = new MySQL("localhost", 3306, "root", ""); ?>`

###Querying the MySQL Database:

`<?php include("MySQL.php"); $MySQL = new MySQL("localhost", 3306, "root", ""); if($MySQL) { $query = "CREATE DATABASE test;"; $MySQL->query($query); } ?>`

###Closing the connection to the MySQL Server:

`<?php include("MySQL.php"); $MySQL = new MySQL("localhost", 3306, "root", ""); if($MySQL) { $query = "CREATE DATABASE test;"; $MySQL->query($query); } $MySQL->close(); ?>`
