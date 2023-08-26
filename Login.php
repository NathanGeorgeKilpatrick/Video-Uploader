<?php

//Get details from the form
$username = $_POST["email"];
$password = $_POST["password"];

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
}

$query = 'SELECT User_ID, AccessLevel FROM users WHERE Username="'.$username.'" AND password="'.$password.'"';
$result = mysqli_query($link, $query);

if ($result->num_rows == 1)
{ 
    //Output the data of each row
    while($row = $result->fetch_assoc())
    {
        echo $username . " logged in and cookie created";
        setcookie("Al", $row["AccessLevel"]);
        setcookie("users", $row["User_ID"]);
    }
}
else
{
    echo "This cookie creation has failed";
}

$link->close();
?>