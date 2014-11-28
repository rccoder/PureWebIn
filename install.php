<?php
    $con = mysql_connect("localhost","root","");
    if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
    // Create database
    if (mysql_query("CREATE DATABASE bookmanage",$con))
    {
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
    bookdes varchar(200),
    bookauthor varchar(15),
    booktype varchar(15),
    bookdata date,
    bookprice float
    )";
    if(mysql_query($sql,$con))
    {
    echo "Success!";
    }
    //init the table called book 
    $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('c programing', 'this is a c book!', 'k&r', 'computer', '2014-01-01', 200);";
    mysql_query($sql, $con);

     $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('java programing', 'this is a java  book!', 'k&r', 'computer', '2014-01-01', 400);";
    mysql_query($sql, $con);

     $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('banking', 'this is a banking book!', 'hit', 'financial', '2014-01-01', 200);";
    mysql_query($sql, $con);

    $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('philosophy', 'this is a philosophy book!', 'hit', 'philosophy', '2012-01-01', 200);";
    mysql_query($sql, $con);

     $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('sea', 'this is a literature book!', 'hit', 'literature', '2012-01-01', 200);";
    mysql_query($sql, $con);

    $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200);";
    mysql_query($sql, $con);
    $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200);";
    mysql_query($sql, $con);
    $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200);";
    mysql_query($sql, $con);
    $sql = "INSERT INTO book
    (
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )
    VALUES('wuli', 'this is a literature book!', 'hit', 'lilun', '2012-01-01', 200);";
    mysql_query($sql, $con);

    mysql_close($con);
    }
    catch(Exception $e)
    {
    echo $e->getMessage();
    }
?>