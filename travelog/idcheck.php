<?php
    $id = $_POST["id"];

    $con = mysqli_connect("localhost","root","qwer","travelog");

    $query = "SELECT * FROM member WHERE id = '".$id."'";
    $statement = mysqli_prepare($con, $query);

    $response = array();
    $response["success"] = false;  

    $result = $con->query($query);
    while($row = $result->fetch_assoc())
    {
        $response["success"] = true;  
    }

    if($response["success"]) {
       $id = "";
    }

    echo $id;

?>