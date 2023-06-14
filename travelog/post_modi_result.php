<?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    mysqli_query($con,'SET NAMES utf8');

	$idx = $_POST['idx'];
    $selectedRegion = $_POST['region'];
	$region = explode(' ' , $selectedRegion);
	$location = $_POST['location'];
    $memo = $_POST['memo'];

	$update_query = "update post set memo = '$memo', state='$region[0]', city='$region[1]', location = '$location'  where idx=' $idx'"; 

	if($con->query($update_query)){

		
	}

	echo "<script>location.href='post_view4.php?idx=".$idx."';</script>";
?> 


