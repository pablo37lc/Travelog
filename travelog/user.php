<?php
$id = $_POST['id'];
$post_start = $_POST['post_start'];
$listSize = $_POST['size'];
$login = $_POST['login'];

$con = mysqli_connect("localhost","root","qwer","travelog");
$query = "SELECT * FROM post WHERE id = '$id' and NOT(private=1) ORDER BY reg_date DESC LIMIT $post_start, $listSize";
if($login) {
    $query = "SELECT * FROM post WHERE id = '$id' ORDER BY reg_date DESC LIMIT $post_start, $listSize";
}
$statement = mysqli_query($con, $query);

if ($statement->num_rows > 0) {
    while($row = $statement->fetch_assoc()) {
        echo "<a href=post_view4.php?idx=".$row["idx"].">
            <img src='".$row["image"]."' alt=''>
          </a>";
    }
}

?>