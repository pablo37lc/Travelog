<?php 
session_start();
unset($_SESSION['id']);

echo("<script>location.href='./main.html';</script>");
?>