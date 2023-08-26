<?php

//Get details from form
$deletevideoid = $_POST["videoID"];

//Connect to the server details
$servername = "localhost";
$DBusername = "bob1";
$DBpassword = "Password";
$DBname = "videouploader";

// Creating a connection to the server
$conn = new mysqli ($servername, $DBusername, $DBpassword, $DBname);

// Check the connection
if (mysqli_connect_errno())
{
    echo"<br>Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    echo"<br>connected to db <br>";
}

$query = 'SELECT * FROM video WHERE Video_ID="'.$deletevideoid.'"';
$result = mysqli_query($conn, $query);

if ($result->num_rows == 1)
{
    while ($row = $result->fetch_assoc()) {
        setcookie("DelVideoName", $row['VideoName']);
        setcookie("DelVideoDes", $row['VideoDescription']);
        setcookie("DelVideouser", $row['F_User_ID']);
    }
}
$conn->close();
?>