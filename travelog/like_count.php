<?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    
	
    $post = $_POST['post'];

    $query = "SELECT * FROM like_tf WHERE post = '".$post."'";
    $result = $con->query($query);
  
    $count = mysqli_num_rows($result); 
    echo $count;

?>