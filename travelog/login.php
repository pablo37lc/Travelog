<?php
    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $con = mysqli_connect("localhost","root","qwer","travelog");

    $query = "SELECT * FROM member WHERE id = '".$id."' AND pw = '".$pw."'";
    $statement = mysqli_prepare($con, $query);

    $response["success"] = false;  

    $result = $con->query($query);
    
    while($row = $result->fetch_assoc())
    {
        $response["success"] = true;  
    }

    if($response["success"]) {
        session_start();
        $_SESSION['id'] = $id;
        echo "done";     
    }
    else {
        echo "정보가 일치하지않습니다"; 
    }

?>