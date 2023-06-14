<?php

$city = $_POST['city'];
$state = $_POST['state'];
$post_start = $_POST['post_start'];
$listSize = $_POST['size'];

$con = mysqli_connect("localhost","root","qwer","travelog");

$query = "SELECT
          p.*,
          (select image from member m where m.id = p.id) profile,
          (SELECT COUNT(*) FROM like_tf l WHERE p.idx = l.post) likes
          FROM post p 
          WHERE state = '$state' and city LIKE '$city%' and NOT(private = 1) ORDER BY reg_date DESC LIMIT $post_start, $listSize";

$statement = mysqli_query($con, $query);

if ($statement->num_rows > 0) {

    while($row = $statement->fetch_assoc()) {
        echo
        "<div class='polaroid'>
            <div class='meta'>
                <img src='./img/address.png' alt=''>
                <div>".$row["state"]." ".$row["city"]." ".$row["location"]. "</div>
                    <a href=user.html?id=".$row["id"].">
                        <img class='profile-image' src='".$row["profile"]."' alt=''>
                    </a>
                    <a href=user.html?id=".$row["id"].">".$row["id"]."</a>
                <div>
                    <img src='./img/heartlo.png' alt=''>
                    <p>".$row["likes"]."</p>
                </div>
                
            </div>
    
            <div class='photo'>
                <a href=post_view4.php?idx=".$row["idx"].">
                    <img src='".$row["image"]."' alt=''>
                </a>
            </div>
        </div>            
        ";
    }

    echo "<br><br>";
}
?>