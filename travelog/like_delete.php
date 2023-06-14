<?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    
	
    $post = $_POST['post'];
    $id = $_POST['id'];

    $del_sql = "DELETE FROM like_tf WHERE post = ? AND id = ?";
    $stmt = mysqli_prepare($con, $del_sql);
    mysqli_stmt_bind_param($stmt, "ss", $post, $id);
    mysqli_stmt_execute($stmt);

?>