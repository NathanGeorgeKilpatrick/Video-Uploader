<?php

//Variable
$selectedvideo = $_COOKIE["WatchVidid"];

//Connect to the server details
$servername = "localhost";
$DBusername = "bob1";
$DBpassword = "Password";
$DBname = "videouploader";

// Connect Normally to the server
$link = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

// Check the connection
if (mysqli_connect_errno())
{
    echo"<br>Failed to connect to MySQL: " . mysqli_connect_errno();
}
else
{
    echo"<br>connected to db <br>";
    echo "Got Cookie: $selectedvideo <br>";
}


$query1 = 'UPDATE video SET Views = Views +1 WHERE Video_ID="'.$selectedvideo.'"';
$result1 = mysqli_query($link, $query1);

$query = 'SELECT * FROM video WHERE Video_ID="'.$selectedvideo.'"';
$result = mysqli_query($link, $query);

if ($result->num_rows == 1)
{
    while($row = $result->fetch_assoc())
    {
        echo "New selected video cookies set";
        
        setcookie("Watchvidname", $row["VideoName"]);
        setcookie("Watchviddef", $row["VideoDescription"]);
        setcookie("Watchviddef", $row["VideoDescription"]);
        setcookie("Watchvidrating", $row["Rating"]);
        setcookie("Watchvidviews", $row["Views"]);
    }
}
if ($result1 == true)
{
    echo "Record Updated <br>";
}
else {
    echo "Record Failed to Update";
}

header('Location: Videoplayer.html');
$link->close();
?>