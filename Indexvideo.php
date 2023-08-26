<?php
$Chill = "4";
$Variant = "7";
$Professional = "5";
$Tournament = "6";
$Lecture = "3";
$Teaching = "1";

$I = 0;
$array = array();

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

$query = 'SELECT Video_ID FROM video WHERE F_Tags_ID="'.$Chill.'" OR F_Tags_ID="'.$Variant.'"';
$query1 = 'SELECT Video_ID FROM video WHERE F_Tags_ID="'.$Professional .'" OR F_Tags_ID="'.$Tournament.'"';
$query2 = 'SELECT Video_ID FROM video WHERE F_Tags_ID="'.$Lecture.'" OR F_Tags_ID="'.$Teaching.'"';

$result = mysqli_query($link, $query);
$result1 = mysqli_query($link, $query1);
$result2 = mysqli_query($link, $query2);

if (mysqli_num_rows($result) > 0)
{
    $row2 = mysqli_num_rows($result);
    while($row = mysqli_fetch_object($result))
    {
        
        $array[] = $row->Video_ID;
        setcookie("funvidarray", json_encode($array));
    }
    echo "<br>$row2 <br>";
    setcookie("numbofchill", $row2);
    print_r($array);
}

if (mysqli_num_rows($result1) > 0)
{
    $row3 = mysqli_num_rows($result1);
    while($row4 = mysqli_fetch_object($result1))
    {
        
        $array1[] = $row4->Video_ID;
        setcookie("providarray", json_encode($array1));
    }
    echo "<br>$row3 <br>";
    setcookie("numbofpro", $row3);
    print_r($array1);
}

if (mysqli_num_rows($result2) > 0)
{
    $row5 = mysqli_num_rows($result2);
    while($row6 = mysqli_fetch_object($result2))
    {
        
        $array2[] = $row6->Video_ID;
        setcookie("learnvidarray", json_encode($array2));
    }
    echo "<br>$row5 <br>";
    setcookie("numboflearn", $row5);
    print_r($array1);
}

$link->close();
?>