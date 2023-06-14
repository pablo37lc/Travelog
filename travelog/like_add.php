<?php
    $con = mysqli_connect("localhost","root","qwer","travelog");
	
    $post = $_POST['post'];
    $id = $_POST['id'];
   
    $query = "INSERT INTO like_tf VALUES (null,?,?)";
    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, "ss", $id, $post);
    mysqli_stmt_execute($statement);
?>