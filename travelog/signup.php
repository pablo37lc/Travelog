<?php
    $id = $_POST["id"];
    $memo = $_POST["memo"];
    $image = "./user/".$id."/default.png";
    $pw = $_POST["pw"];
    $question = $_POST["pw-q"];
    $answer = $_POST["pw-a"];

    mkdir("./user/".$id);

    $con = mysqli_connect("localhost","root","qwer","travelog");
        
    $query = "INSERT INTO member VALUES (null,?,?,?,?,?,?)";
    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, "ssssss", $id, $pw, $image, $memo, $question, $answer);
    mysqli_stmt_execute($statement);

    if($_FILES["image"]["name"] != "") {

        $target_dir =  "./user/".$id."/";
        $target_file = $target_dir .basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $save_file = $target_dir.$id.".".$imageFileType;

        move_uploaded_file($_FILES["image"]["tmp_name"], $save_file);

        $query2 = "UPDATE member SET image = '".$save_file."' WHERE id = '".$id."'";

        $result = $con->query($query2);
    }
    else {
        copy("./img/default.png", "./user/".$id."/default.png");
    }

    echo "<script>location.href='./login.html';</script>";

?>