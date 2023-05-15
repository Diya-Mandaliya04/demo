<?php

$hostname="localhost";
$username="root";
$password="";
$dbnm="demo";

$con=mysqli_connect($hostname,$username,$password,$dbnm);

if(!$con)
{
    echo "not connected";
}
else
{
    echo "connected";
}

?>