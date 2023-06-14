<?php

$memo = $_POST["memo"];
$id = $_POST["id"];

$con = mysqli_connect("localhost","root","qwer","travelog");

$query = "UPDATE member SET memo = '" . $memo . "' WHERE id = '".$id."'";

$result = $con->query($query);

if($_FILES["image"]["name"] != "") {

    $target_dir =  "./user/".$id."/";
    $target_file = $target_dir .basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $save_file = $target_dir.$id.".".$imageFileType;

    move_uploaded_file($_FILES["image"]["tmp_name"], $save_file);

    $query2 = "UPDATE member SET image = '".$save_file."' WHERE id = '".$id."'";

    $result = $con->query($query2);
}

?>