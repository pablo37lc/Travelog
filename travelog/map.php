<?php
$con = mysqli_connect("localhost","root","qwer","travelog");
    
$query = "SELECT * FROM post WHERE NOT(private = 1) ORDER BY reg_date DESC LIMIT 0, 7";
$statement = mysqli_query($con, $query);

$count = mysqli_num_rows($statement);

$orient = "";
if(rand(0,1)==0) {
    $orient = "reverse";
}

if($count > 2) {
    $width = $count*600;

    if ($statement->num_rows > 0) {
        echo "<div class='slider'>
        <div class='city'>
            <img src='./img/address.png' alt=''>
            <div>최근 게시물</div>
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

$query = "SELECT p.* , (SELECT COUNT(*) FROM like_tf l WHERE p.idx = l.post) likes FROM post p WHERE NOT(private = 1) ORDER BY likes DESC LIMIT 0, 7";
$statement = mysqli_query($con, $query);

$count = mysqli_num_rows($statement);

$orient = "";
if(rand(0,1)==0) {
    $orient = "reverse";
}

if($count > 2) {
    $width = $count*600;

    if ($statement->num_rows > 0) {
        echo "<div class='slider'>
        <div class='city'>
            <img src='./img/address.png' alt=''>
            <div>인기 게시물</div>
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

$query = "SELECT * FROM post WHERE NOT(private = 1) ORDER BY RAND() LIMIT 0, 7";
$statement = mysqli_query($con, $query);

$count = mysqli_num_rows($statement);

$orient = "";
if(rand(0,1)==0) {
    $orient = "reverse";
}

if($count > 2) {
    $width = $count*600;

    if ($statement->num_rows > 0) {
        echo "<div class='slider'>
        <div class='city'>
            <img src='./img/address.png' alt=''>
            <div>무작위</div>
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
?>