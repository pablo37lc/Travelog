<?php
    $id = $_POST['id'];

    $con = mysqli_connect("localhost","root","qwer","travelog");

    $sql_member = "DELETE FROM member WHERE id = '".$id."'";
    $sql_post = "DELETE FROM post WHERE id = '".$id."'";

    $con->query($sql_member);
    $con->query($sql_post);

    session_start();
    $_SESSION['id'] = "";

    rmdir("./user/".$id);

    echo "<script>alert('삭제하였습니다.');</script>";
    echo("<script>location.href='./main.html';</script>");     
?>