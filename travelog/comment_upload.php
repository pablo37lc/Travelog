<?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    mysqli_query($con,'SET NAMES utf8');

    $context = $_POST['context'];
    $id = $_POST['id'];
	$post = $_POST['idx'];
	



    $statement = mysqli_prepare($con, "INSERT INTO comment VALUES (null,?,?,?)");
    mysqli_stmt_bind_param($statement, "sss", $id, $post, $context);
    mysqli_stmt_execute($statement);

    echo "<script>alert('댓글등록완료!');</script>"; 
?> 

