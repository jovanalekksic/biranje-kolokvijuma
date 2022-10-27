<?php

$host = "localhost";
$db = "kolokvijumi";
$user = "root";
$pass = "";
$port = 3307; //dodat port jer je bez njega bacalo gresku 1045

//kreiramo konekciju

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_errno) //ako se u $conn prosledi broj greske(npr 404,....) 
{
    exit("Neuspesna konekcija: greska> " . $conn->connect_errno . ", err kod>" . $conn->connect_errno);
}

?>
<!-- danas je lep dan -->