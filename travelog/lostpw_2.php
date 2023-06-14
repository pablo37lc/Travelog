<?php
$id = $_POST["id"];
$pw_a = $_POST["pw_a"];

$con = mysqli_connect("localhost","root","qwer","travelog");

$query = "SELECT * FROM member WHERE id = '".$id."' AND answer = '".$pw_a."'";
$statement = mysqli_prepare($con, $query);

$response = array();
$response["success"] = false;  

$result = $con->query($query);
while($row = $result->fetch_assoc())
{
    $response["success"] = true;
    $pw = $row["pw"];
}

if($response["success"]) {
    echo $pw;     
}
else {
    echo "no"; 
}

?>