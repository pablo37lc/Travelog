<?php

$state = $_POST['state'];

$city = array();

$con = mysqli_connect("localhost","root","qwer","travelog");
    
$query = "SELECT DISTINCT city FROM post WHERE state = '$state' ";
$statement = mysqli_query($con, $query);

if ($statement->num_rows > 0) {

    while($row = $statement->fetch_assoc()) {
        array_push($city, $row["city"]);
    }
}

for($i=0; $i<count($city); $i ++) {


    $query = "SELECT * FROM post WHERE state = '$state' and city = '$city[$i]' and NOT(private = 1) ORDER BY reg_date DESC LIMIT 0, 7";
    $statement = mysqli_query($con, $query);

    $count = mysqli_num_rows($statement);

    $orient = "";
    if(rand(0,3)==3) {
        $orient = "reverse";
    }

    if($count > 3) {
        $width = $count*600;

        if ($statement->num_rows > 0) {
            echo "<div class='slider'>
            <div class='city'>
                <img src='./img/address.png' alt=''>
                <div>".$city[$i]."</div>
            </div>
            <div class='image-box' style=' width:".$width."px; animation: bannermove ".(18+rand(-2,2)) ."s linear infinite ".$orient.";'>
            ";

            while($row = $statement->fetch_assoc()) {
                echo "<a href=post_view4.php?idx=".$row["idx"].">
                        <img src='".$row["image"]."' alt=''>
                    </a>";
            
            }

            
        }
        $statement = mysqli_query($con, $query);

        if ($statement->num_rows > 0) {

            while($row = $statement->fetch_assoc()) {
                echo "<a href=post_view4.php?idx=".$row["idx"].">
                        <img src='".$row["image"]."' alt=''>
                    </a>";
            }
            
        }

        echo "</div></div>";
    }
    else {
        if ($statement->num_rows > 0) {
            echo "<div class='slider'>
            <div class='city'>
                <img src='./img/address.png' alt=''>
                <div>".$city[$i]."</div>
            </div>
            <div class='image-box-not' style=' width:".$width."px;'>
            ";

            while($row = $statement->fetch_assoc()) {
                echo "<a href=post_view4.php?idx=".$row["idx"].">
                        <img src='".$row["image"]."' alt=''>
                    </a>";
            }

        }
        echo "</div></div>";
    }
}


?>