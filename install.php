<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
// Create database
if (mysql_query("CREATE DATABASE bookmanage",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
// Create table which is called "book" in bookmanage database
try
{
mysql_select_db("bookmanage", $con);
$sql = "CREATE TABLE book 
(
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
bookname varchar(30),
bookauthor varchar(15),
booktype varchar(15),
bookdata date(yy-mm-dd),
bookprice float
)";
mysql_query($sql,$con);
}
catch(Exception $e)
{
	echo $e->getMessage();
}
//init the table called book 
$sql = "INSERT INTO book
(
	bookname, bookauthor, booktype, bookdata, bookprice
	)
VALUES('programing', 'k&r', 'code', 2014-01-01, 200)
";
mysql_query($sql, $con);
mysql_close($con);
?>