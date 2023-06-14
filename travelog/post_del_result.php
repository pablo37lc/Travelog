<?php
	$con = mysqli_connect("localhost", "root", "qwer", "travelog");
    mysqli_query($con,'SET NAMES utf8');

	$idx = $_GET['idx'];   

	$query = "SELECT * FROM post WHERE idx = '".$idx."'";
	$result = $con->query($query);
	while($row = $result->fetch_assoc())
		{
			$image = $row["image"];
			unlink ($image) ;
		}

	
	$del_sql = "delete from post where idx='$idx';";



	if($con->query($del_sql)){
		echo "<script>location.href='main.html';</script>";
	}else{
			echo "<script>alert('삭제 오류')</script>";	   
			//echo "<script>location.href='./board.php';</script>";
	}
    
?> 

