
<?php
if (!session_id()) {
  session_start();


}

$con = mysqli_connect("localhost", "root", "qwer", "travelog");

$usrId = $_GET['usrId'];
$sessionId =  $_SESSION['id'];


            /** 세션ID, 선택한 ID 같이 있고  chat_gb = 1 인 chat_id 구하기 */
            $query = "select A.chat_id from chatroom A , chat_member B
            WHERE  A.chat_id = B.chat_id 
            and A.DEL_YN = 'N' AND B.DEL_YN = 'N' and A.chat_gb = '1'
            and (A.RGTR_ID = '$sessionId' or A.RGTR_ID = '$usrId')  
            and (B.USR_ID = '$sessionId' or B.USR_ID = '$usrId')
            and A.RGTR_ID != B.USR_ID";
            $result = mysqli_query($con, $query);
            $chatId =mysqli_fetch_array($result);
            echo $chatId['chat_id'];            
            if($chatId['chat_id']){
              ?>   
              <script>
                //기존 chat_id 값으로 채팅방 이동
                     location.href="layout.php?chatId=<?=$chatId['chat_id']?>"
              </script>
              <?php
            } else {
              /*  chatroom 의 chat_id 의 max 값 구하는 쿼리 */
              $query = "select max(chat_id)+1 as chat_id from chatroom";
              $result = mysqli_query($con, $query);
              $maxChatId =mysqli_fetch_array($result);
              $maxId = $maxChatId['chat_id'];
             

              /* chatroom 인서트 */
              $query = "INSERT INTO travelog.chatroom( chat_id , del_yn, rgs_dt,chat_gb,rgtr_id,get_id) 
              values ( '$maxId' , 'N',date_format(now(),'%Y%m%d') ,'1' ,'$sessionId','$usrId')";
              $result = mysqli_query($con,$query);
              
              /* chat_member 인서트 */               
              $query = "INSERT INTO travelog.chat_member
                        SELECT 
                        '$maxId'
                        ,id
                        ,'N' aS DEL_YN  
                        ,date_format(now(),'%Y%m%d')
                        ,''
                        FROM travelog.member
                        WHERE id IN ( '$sessionId', '$usrId')";
              $result = mysqli_query($con,$query);

              ?>   
              <script>
                // 새로구한 maxId 값으로 채팅방 이동
               location.href="layout.php?chatId=<?=$maxId?>"    
              </script>
              <?php
            }
            ?>            
             

                
 

           

   


