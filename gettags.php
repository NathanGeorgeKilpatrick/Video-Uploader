<?php

//Connect to the server details
$servername = "localhost";
$DBusername = "bob1";
$DBpassword = "Password";
$DBname = "videouploader";

// Creating a connection to the server
$conn = new mysqli ($servername, $DBusername, $DBpassword, $DBname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn_>connect_error);
}

$sql = "SELECT TagName FROM tags";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{ 
    //Output the data of each row
    while($row = $result->fetch_assoc())
    {
        echo "<option value=''>";
        echo $row["TagName"];
        echo "</option>";
    }
}
else
{
    echo"0 results";
}

$conn->close();
?>
    