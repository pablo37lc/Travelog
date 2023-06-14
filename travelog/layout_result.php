
<?php
if (!session_id()) {
  session_start();
}

  $con = mysqli_connect("localhost", "root", "qwer", "travelog");


$postMemo = $_POST['postMemo'];
$sessionId =  $_POST['sessionId'];
$chatindex = $_POST['chatindex'];

$query = "SELECT max(idx)+1 as idx FROM chat_content";
$result = mysqli_query($con, $query);
$maxIdx = mysqli_fetch_array($result);
$maxIndex = $maxIdx['idx'];


$today = date("Ymd");

$statement = mysqli_prepare($con, "INSERT INTO chat_content 
                                  (chat_id, idx, usr_id, content, del_yn, rgs_dt) 
                                  VALUES ('$chatindex', '$maxIndex', '$sessionId', '$postMemo', 'N', '$today')");
mysqli_stmt_execute($statement);

/* chat_member read_check update */               


$query3 = "UPDATE travelog.chat_member
          SET read_check = 'new'
          WHERE chat_id='$chatindex' and usr_id = '$sessionId' ";
$result3 = mysqli_query($con,$query3); 

  echo "<script>
        location.href='layout.php?chatId=".$chatindex."';
        </script>";

?>

