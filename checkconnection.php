<?php

$servername = "localhost";
$username = "bob1";
$password = "Password";

//Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected Successfully";

?>