<!DOCTYPE html>
<html lang="ko">

  <?php
    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
    mysqli_query($con,'SET NAMES utf8');	
    
//세션 데이터에 접근하기 위해 세션 시작
  if (!session_id()) 
  {
    session_start();

    //echo "<script>location.href='http://localhost/member_login.html'</script>";    
  }

  $sessionId =  $_SESSION['id'];     
  //if($sessionId==""){
    //echo"<script></script>"
  //}
?>


  <?php $chatId = $_GET['chatId']; ?>

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/8822be830d.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="css/layout.css">
      <!--<META HTTP-EQUIV="refresh" CONTENT="10">-->
      <title>Document</title>

      <style>
        /*
해더
*/
#header{
    position: fixed;
    height: 70px;
    width: 100%;
    border-bottom: 1px lightgray solid;
    background-color:white;
    z-index: 100;
}
#header > * , #header > * > *{
    height: 100%;
    display: flex;
    align-items: center;
}
#header-left {
    float:left;
    vertical-align:middle;
    width: calc(50% - 125px);
    min-width: 350px;
}
#header-left input:last-child{
    margin-left: 7px;
    width: 30px;
    height: 30px;
}
#header-left input:last-child{
    margin-left: 7px;
    width: 30px;
    height: 30px;
}
#header-left input:first-child{
    width: 50px;
    height: 45px;
}
#header-center {
    float:left;
    width: 250px;
}
#header-center > *  {
    margin: 0 auto;
    
}

#header-right {
    float: right;  width: 30%;
    
}
#header-right > * {
    margin-left: auto; 
    margin-right: 0;
}
#header-right > div > input {
    height: 40px;
    width: 40px;
    margin-right: 30px;
}
#header-left > input {
    height: 40px;
    width: 40px;
}
#header-left > input:first-child{
    margin-left: 6px;
}
#header-left > input:nth-child(2) {
    height: 40px;
    font-size: 18px;
    width: 230px;
    margin-left: 4px;
    padding-left: 10px;
}
#header-left > input:last-child {
    height: 35px;
    width: 35px;
    margin-right: 10px;
}
#location {
    border: none;
    background-color: rgb(233, 233, 233);
    border-radius: 15px;
}
.map {
    display: none;
    width: 100%;
    height: 100%;
}
a:link {
    color: black;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: black;
    background-color: transparent;
    text-decoration: none;
}

/*
유저 버튼
*/
#header-modal {
    position: fixed;
    margin-right: 0;
    margin-left: calc(100% - 120px);
    padding-top: 71px;
    width: 120px;
    background-color:#0070C0;
    display: none;
    z-index: 99;
}
#header-modal >div > div {
    height: 30px;
    border: 1px solid ghostwhite;
    display: flex;
    justify-content: center;
    align-items: center;

}
#header-modal > div > div > a {
    font-size: 15px;
    color:white;
}
      </style>
    </head>

             
    <body>
      <div id="header">
          <div id="header-left">
              <input type="image" src="./img/map.png" alt="" onclick="korea()">
              <input type="text" id="location" value="">
              <input type="image" src="./img/search.png" alt="" onclick="search()">

          </div>
          
          <div id="header-center" onclick="korea()">
            <div>
                <input type="image" src="./img/logo.png" height="45px"  alt="로고">
                <input type="image" src="./img/logoText.png" height="45px" width ="160px" style="margin-top:8px; translate: -8px;"  alt="로고">
            </div>
        </div>
          
          <div id="header-right" style="width: 200px;">
              <div>
                  <input type="image" src="./img/photo.png" alt="" onclick="add('<?php echo $sessionId; ?>')">
                  <input type="image" src="./img/message.png" alt="" onclick="chat('<?php echo $sessionId; ?>')">
                  <input type="image" src="./img/user.png" alt="" onclick="user('<?php echo $sessionId; ?>')">
              </div>
          </div>        
      </div>

      <div id="header-modal">
          <div id="not_logined">
              <div>
                  <a href="login.html">로그인</a>
              </div>
              <div>
                  <a href="signup.html">회원가입</a>
              </div>
          </div>
          <div id="logined">
              <div>
                  <a id="user_display" href="">계정화면</a>
              </div>
              <div>
                  <a id="user_edit" href="">정보수정</a>
              </div>
              <div>
                  <a id="sign_out" href="">로그아웃</a>
              </div>
          </div>
      </div>

<!--  왼쪽  -->  
             
<!--  왼쪽 타이틀 -->     
      <div class="body-container">
        <div class="temp-box box-one">
          <div class="border-blacktop">                  
 
              받은 메모함
          </div>
<!--  왼쪽 타이틀 끝 --> 

<!--  내프로필 사항  -->
      <?php
        $userId = $_GET['id'];
        $pimage = $_GET['image'];                                        
        $sql = "select * from member where id ='$sessionId'"; 
        $result = mysqli_query($con, $sql); 
        $row = mysqli_fetch_array($result); 
      ?> 
      
      <div class="border-blackbottom">
        <div id= "myProfile">
          <ul>
            <li>   
              <img src=<?php echo $row['image']?> alt="나의프로필사진">
              <div class="profile">
                  <p><?php echo $row['id']?></p>
                  <!-- 상태 메세지  -->
                  <p><?php echo $row['memo']?></p>
              </div>
            </li>
          </ul>
        </div>
      <div class="underbar"><hr></div>
<!--  내프로필 사항 끝  -->

<!--  채팅방 목록  -->
            <div id= "chatList" >                                 
              <?php
                $sessionId =  $_SESSION['id'];
                $query = "SELECT a.chat_id,a.get_id,a.rgtr_id,b.usr_id,b.rgs_dt,c.id,c.image,b.read_check
                FROM travelog.chatroom a, travelog.chat_member b, travelog.member c, travelog.member d
                WHERE a.chat_id = b.chat_id and b.usr_id=c.id and b.usr_id=d.id
                and (a.rgtr_id='$sessionId ' or a.get_id='$sessionId ') 
                and b.usr_id !='$sessionId '"; 
                $result = $con->query($query);
                while($row = $result->fetch_assoc())
                {                  
                ?> 
                <ul> 
                  <a onclick="enterchat('<?php echo $row['chat_id']; ?>')" class="rdc">
                  <li>
                    <img src=<?=$row["image"]?>>                                                 
                    <div class="profile">
                    <p><?=$row["id"]?>  
                    <?php
                      if($row["read_check"] == "new") {
                        echo "<img src=./img/mesege.png style='width:10px; float:right; display:flex' id='readcheck'>";
                      }
                    ?>
                    </p>                       
                    <p style="float:right"><?=$row["rgs_dt"]?></p>
                    <p></p>
                    </div> 
                  </li>
                  </a>
                </ul> 
              <?php
                }
              ?> 
                              
            </div>
            <div class="btn-open-popup" style="position:fixed; top: 735px; left: calc(15% + 20px) ;">
              <img src="./img/add.png"> 
            </div>
<!--  채팅방 목록  끝 -->
          </div>
        </div>
<!--  왼쪽  끝 -->

<!--  오른쪽  --> 
<!--  오른쪽  상단 바--> 
        <div class="temp-box box-two">
          <div class="border-black">            
            <div class="top-bar">
              <div class="image">
                <?php	
                  $sessionId =  $_SESSION['id'];              
                  $query = "SELECT * FROM travelog.member
                  INNER JOIN travelog.chat_member
                  on member.id = chat_member.usr_id
                  and member.id != '$sessionId'
                  and chat_member.chat_id='$chatId'";
                  $result = $con->query($query);
                  while($row = $result->fetch_assoc())
                  {
                ?>
                    <img src=<?=$row["image"]?>> 
                <?php
                  }
                ?>
                </div>
<!--  채팅방 목록 상대방 이름 출력-->
              <div class="name">
                <?php
                  $sessionId =  $_SESSION['id'];
                  $query = "SELECT member.id FROM travelog.member 
                  INNER JOIN travelog.chat_member
                  on member.id = chat_member.usr_id
                  and member.id != '$sessionId'
                  and chat_member.chat_id='$chatId';";
                  $result = $con->query($query);
                  while($row = $result->fetch_assoc())
                  {
                  ?> 
                  <p><?=$row["id"]?></p>
                  <?php
                  }
                ?> 
              </div>          
            </div>
          </div>
<!--  오른쪽  상단 바 끝--> 

<!--  오른쪽 채팅방  --> 
          <div class="scoll box2" id=chatroom>
            <div class="border-black2">        
              <?php	
                $chatId = $_GET['chatId'];            
                $sessionId =  $_SESSION['id'];  
                $query = "SELECT a.usr_id,a.chat_id,a.idx,a.content,a.rgs_dt,b.id,b.image
                FROM travelog.chat_content a, travelog.member b
                WHERE a.chat_id='$chatId' and a.usr_id=b.id
                ORDER BY idx ASc";
                $result = $con->query($query);		
                while($row = $result->fetch_assoc())
                {
                  
                  if($row["usr_id"]== $sessionId) {              
                    echo "
                    <div class='chat ch2'>
                    <div class='icon'><img src=".$row["image"]."></div>
                    <div class='textbox'>".$row["content"]."</div>
                    </div> ";
                  }
                  else{
                    echo "
                    <div class='chat ch1'>
                    <div class='icon'><img src=".$row["image"]."></div>
                    <div class='textbox'> " .$row["content"]."</div>
                    </div>";
                  }  
                }
              ?>         
            </div> 
          </div>
<!--  오른쪽 채팅방 끝 --> 

<!--  오른쪽 채팅방 입력창&입력버튼 -->        
          <div class="border-white">
            <form  method="POST" action="layout_result.php" name="formname" >        
              <div class="btnlayout">            
                <input type="text" id="postMemo" name="postMemo" value="<?php if($chatId=="") {echo "상대가 없습니다.";}?>" <?php if($chatId=="") {echo "readonly";}?>>
                <input type="hidden" id="chatindex"  name="chatindex" value="<?php echo $chatId ;?>">
                <input type="hidden"  name="sessionId" value="<?php echo $sessionId; ?>">
                <input type="submit" class="w-btn w-btn-yellow" id="postMemo" value="입력하기" <?php if($chatId=="") {echo "disabled";}?>>
              </div>                 
            </form>		
          </div>   
        </div>
<!--  오른쪽 채팅방 입력창&입력버튼 끝--> 
<!--  오른쪽 끝 -->
<div class="modal" id="modal">
      <div class="modal_body">
        <div class="com1">
        <div class="close-area">X</div>
      <div class="titlem">유저 찾기</div>
        </div>
   
        <div class="com2" id="demo">
   
            

        </div>
        <div class="com3">
        <div><input id="userid" type=""class="minput"> 
                <button class="m-btn m-btn-indigo" id="kk" name="kk" onclick="btn()">찾기</button>
            </div>        
        </div>
      </div>
    </div>
    


    <script>
    const modal = document.querySelector('.modal');
    const btnOpenPopup = document.querySelector('.btn-open-popup');

    btnOpenPopup.addEventListener('click', () => {
    modal.style.display = 'flex';
    });

    const closeBtn = modal.querySelector(".close-area")
    closeBtn.addEventListener("click", e => {
        modal.style.display = "none"
    })
    modal.addEventListener("click", e => {
        const evTarget = e.target
        if(evTarget.classList.contains("modal")) {
            modal.style.display = "none"
        }
    })
    window.addEventListener("keyup", e => {
        if(modal.style.display === "flex" && e.key === "Escape") {
            modal.style.display = "none"
        }
    })
    </script>  
    <script >
        function btn() {
            $.ajax({ // ajax 기본형태
                    //////////////////// send(가는것)
                    url : "modal.php",
                    type : "post",                	
                    data : {userid : document.getElementById("userid").value}
                }).done(function(data){
                    document.getElementById("demo").innerHTML = data;
                })
                ;
        }
</script>
    </body>
    <script>
      var element = document.querySelector("#chatroom");

      var scroll_position = localStorage.getItem("sidebar-scroll");
      if (scroll_position !== null) {
          console.log("scroll position : ",scroll_position)
          element.scrollTop = parseInt(scroll_position, 10);
      }

      window.addEventListener("beforeunload", () => {
          localStorage.setItem("sidebar-scroll", element.scrollTop);
      });

      var postMemo = document.getElementById('postMemo').value 

      function press(f){
          if(f.keyCode == 13){ //javascript에서는 13이 enter키를 의미함
              formname.submit(); //formname에 사용자가 지정한 form의 name입력
          }
      }

      var rdc=document.querySelector('.rdc');      
      function enterchat(chat_id){        
        <?php            
        $query = "UPDATE travelog.chat_member
        SET read_check = null
        WHERE chat_id='$chatId' and usr_id != '$sessionId' ";
        $result = mysqli_query($con,$query);                
        ?>
        location.href="layout.php?chatId="+chat_id;
      }

      </script>
          <script type="text/javascript" src="common.js"></script>
</html>


