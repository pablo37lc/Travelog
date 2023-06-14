<?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    
	
    $post = $_POST['post'];
    $id = $_POST['id'];

    $likeCheck = false;

    $query = "SELECT * FROM like_tf WHERE post = '".$post."' AND id='".$id."'";
    $result = $con->query($query);
    while($row = $result->fetch_row())
     {
        $likeCheck = true;                
     }


    if ($likeCheck) {
        echo "true";
    } else {
        echo "false";
    }
?>