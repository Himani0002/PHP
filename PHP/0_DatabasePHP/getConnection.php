<?php

function OpenCon()
{
    $conn=mysqli_connect("localhost", "root", "", "himanidb") or die("Connect failed: %s\n". $conn -> error);

    // $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or exit("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}
