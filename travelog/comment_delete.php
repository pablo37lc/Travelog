<?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    mysqli_query($con,'SET NAMES utf8');

    $id = $_POST['id'];    
	$context = $_POST['context'];    
    $post = $_POST['idx'];

    $del_sql = "DELETE FROM comment WHERE id = ? AND context = ? AND post = ?";
    $stmt = mysqli_prepare($con, $del_sql);
    mysqli_stmt_bind_param($stmt, "sss", $id, $context, $post );
    mysqli_stmt_execute($stmt);

?> 

