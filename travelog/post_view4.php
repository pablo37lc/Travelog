<?php 
// 데이터베이스 구성 
$dbHost      =  "localhost" ; 
$dbUsername  =  "root" ; 
$dbPassword  =  "qwer" ; 
$dbName      =  "travelog" ; 

 session_start();
 $login_id = $_SESSION["id"];

 $logined = true;
 if($login_id == "") {
    $logined = false;
 }

// 데이터베이스 연결 생성 
$db  = new  mysqli ( $dbHost ,  $dbUsername ,  $dbPassword ,  $dbName ); 

// 연결 확인 
if ( $db -> connect_error ) { 
    die( "연결 실패: "  .  $db ->연결_오류 ); 
} 
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="style.css" rel="stylesheet">
    
    <script src="//code.jquery.com/jquery.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
        }

        .logo_img{
            position: relative;
            width:160px;
            margin-left:130px;
            top:20px;
        }
        .logo_img2{
            position: relative;
            width:100px;
            margin-left:80px;
            top:-85px;
        }
        .content{
            padding-top: 70px;
            height: calc(100% - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*
        칼럼 구성하는 곳입니다.
        너비(width)는 총합 100%을 넘지 않도록 해주세요.
        */
        #left, #center, #right {
            float: left;
            height: 100%;
        }

        #center{
            width: 60% ;

        }

        /*
        화면 크기 조절시 화면 구성 변화하도록 하는 옵션입니다.
        */
        @media screen and (max-width: 600px) {
            #left, #center, #right {   
                width: 100%;
                padding: 0;
            }
        }  

ul,li {
    margin: 0;
    padding: 0;
    list-style-type: none;
    list-style-position: inside;
}

.pic {
    border-radius: 100%;
}
span.userID {
    margin-right: 5px;
}
span.sub-span {
    font-size: 12px;
    color: #8e8e8e;
}
span.point-span {
    font-weight: 500;
    font-weight: bold;
    font-size: 14px;
    color: #262626;
}
.vl {
    height: 22px;
    margin: 0 10px;
    border-left: 1px solid #262626;
}

/* main */
main {
    width: 960px;
    margin: 0 auto;
    padding-top: 120px;
    padding-bottom: 40px;
    
}
.main-right {
    width: 310px;
    display: inline-block;
    position: fixed;
    top: 94px;
}
.feeds {
  width: auto;
  margin-right:30px; /* 가로 간격 조정 */
  display: flex;
  margin-left:30px;
  flex-direction: row; /* 수평 방향으로 요소 정렬 */
  
}
.section-story, .section-recommend {
    background-color: #fff;
    border-radius: 3px;
    border: 1px solid #DBDBDB;
}
article {
    margin-bottom: 8px;
    margin-left:10px;
    margin-right:50px;
    border: 1px solid #DBDBDB;
    width:470px;
}
.section-story, .section-recommend {
    width: 310px;
    padding: 14px 16px;
    overflow-y: hidden;
}
.section-story {
    height: 212px;
    margin-bottom: 20px;
}
.section-recommend {
    height: 180px;
}
/* article */
header {
    height: 60px;
    padding: 0 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top:60px;
}
.profile-of-article {
    display: flex;
    align-items: center;
    
    margin-top:40px;
}


.profile-of-region{
    display: flex;
    align-items: center;
    flex-direction: column;
    margin-top:5px;
    height:50px;
    margin-right:27px;
}
.profile-of-location1 {
    display: flex;
    align-items: center;
    margin-left:-150px;
    width:300px;
}
.profile-of-location2 {
    display: flex;
    width:420px;
    position:relative;
    align-items: center;
    margin-top:20px;
    margin-left:-22px;
}

.img-profile {
    width: 32px;
    height: 32px;
    border: 1px solid #fafafa;
    border-radius: 100%;
}
.main-image img {
    width: 475px;
    height: 475px;
    margin-left:10px;
    top:10px;
    position: relative;
    object-fit: cover;
}
.main-id {
    margin-left: 14px;
}

.icons-react {
    height: 40px;
    padding: 0 16px;
    display: flex;
    align-items: center;
    margin-top:18px;
    justify-content: space-between;
}

.icon-react {
    width: 24px;
    height: 24px;
}

.icons-left {
    display: flex;
    align-items: center;
}
.icons-left .icon-react {
    margin-right: 12px;
}
/* article text data */
.reaction {
    padding: 0 16px;
    margin-top:10px;
}
.liked-people {
    display: flex;
    align-items: center;
    height: 18px;
    margin: 1px 0 8px 0;
}

.liked-people img {
    display: inline-block;
    margin-right: 4px;
    width: 20px;
    height: 20px;
    border: 1px solid #fafafa;
}
.liked-people p {
    display: inline-block;
    color: #262626;
    font-size: 14px;
}
.description {
    margin-top:55px;
    display: flex;
    align-items: top;
    height: 110px;
    flex-wrap: wrap;
}
span.at-tag {
    color: #00376B;
}
ul.comments {
    margin-top: 4px;
}
ul.comments li {
    height: 20px;
    display: flex;
    justify-content: space-between;
    color: #262626;
    font-size: 14px;
    border:
}


.hl {
    width: 460px;
}
/* comment input */
.input-comment {
    font-size: 13px;
    width: 440px;
    height: 18px;
    padding: 18px 16px;
    top:30px;
    position: relative;
    border-style: none;
    box-sizing: border-box;
    color: #262626;

}
.input-comment:focus {
	outline: none;
}
.input-comment::placeholder {
    color: #8e8e8e;
}
.comment-delete{
    font-size: 13px;
    font-weight: 600;
    color:#A6A6A6;
    background-color: #fff;
    border-style: none;
}
#id_button{
border:none;
background-color: white;
font-weight: 500;
    font-weight: bold;
    font-size: 14px;
    color: #262626;
}
#region_button{
    border:none;
background-color: white;
font-weight: 500;
    font-weight: bold;
    font-size: 14px;
    color: #262626;
}
button.submit-comment {
    color: #0095f6;
    background-color: #fff;
    border-style: none;
    height: 38px;
    width: 40px;
    position:relative;
    bottom:8px;
    margin-left:400px;
    padding: 4px;
    font-size: 14px;
    font-weight: 600;
}
.submit-comment:disabled {
    color: #B9DFFC;
    
}
button.submit-comment:focus {
    outline: none;

}
/* main-right */
.myProfile {
    height: 56px;
    margin-top: 10px;
    margin-bottom: 25px;
    padding-left: 12px;
    display: flex;
    align-items: center;
}
.myProfile img {
    width: 56px;
    height: 56px;
}
.myProfile div {
    display: inline-block;
    margin-left: 14px;
}
.myProfile div span {
    display: block;
}
.myProfile div span.userID {
    margin-bottom: 4px;
}

.location_font{
    font-size:14px;
    margin-left:28px;
}

#hr1{
    position: relative;
    top:30px;
    transform: translate(-3%, 10%);
    width: 468px;
    border-style: solid ;
    border-color: #E0E0E0 ;
    border-width: 1px ;
}
.button_react{
  border: none;
  background-color: white;
  width: 35px;
 }
.button_react:hover,#id_button:hover,.button_react_more:hover,#region_button:hover
{
background-color: #EAEAEA;
}  

.button_react_more {
  border: none;
  background-color: white;
  width: 40px;
  position: absolute;
  top:320px;
  margin-left:400px;
}  
#button_msg{
position: relative;
margin-left:330px;    
width: 40px;
}
.example{
position: relative;
margin-right:30px; 
top:100px;
}
textarea {
    width : 100%;
    border : none;
    resize: none;
    background : white;
}

/*//////모달창/////////*/
#more-modal {
    position: fixed;
    margin-left: 300px;
    padding-top: 1px;
    top:345px;
    translate: 30px; 
    width: 110px;
    background-color: #EAEAEA;
    display: none;
    z-index: 99;
  }
  #more-modal > div > div {
    height: 30px;
    border: 1px solid #EAEAEA;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #more-modal > div > div > a {
    font-size: 15px;
  }
.more_btns{
    border:none;
    background-color:#EAEAEA;
    width:100px;
    height:30px;
}
.more_btns:hover{
background-color: #D5D5D5;
}

</style>
</head>
<body>
    <div id="header">
        <div id="header-left">
            <input type="image" src="./img/map.png" alt="" onclick="korea()">
            <input type="text" id="location" value="<?php echo $region; ?>">
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
                <input type="image" src="./img/photo.png" alt="" onclick="add('<?php echo $login_id; ?>')">
                <input type="image" src="./img/message.png" alt=""  onclick="chat('<?php echo $login_id; ?>')">
                <input type="image" src="./img/user.png" alt="" onclick="user('<?php echo $login_id; ?>')">
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

    <div class="content">


        <div id="center">
           
        <main>
            <div class="feeds" >
            <div class="main-image">
                <?php
                    $con = mysqli_connect("localhost", "root", "qwer", "travelog");
                    mysqli_query($con, 'SET NAMES utf8');

                    if (isset($_GET['idx'])) {
                        $idx = $_GET['idx'];
                        $query = "SELECT p.* , (SELECT image FROM member m WHERE p.id = m.id) profile_image FROM post p WHERE idx = '".$idx."'";
                        $result = $con->query($query);

                        while ($row = $result->fetch_assoc()) {
                            $post_idx = $row['idx'];
                            $fileName = $row['image'];
                            $post_id = $row['id'];
                            $profile_image = $row['profile_image'];
                            $memo = $row['memo'];
                            $region = $row['state'] . " " . $row["city"];
                            $location = $row['location'];

                        }

                    }
                ?>
                    <img id="img_exphoto" src="<?php echo $fileName; ?>" lt="피드 사진" class="mainPic">

            </div>
            
                <!-- article -->
                <article >
                <header  > 
                   <div class="profile_whole"> 
                    <div class="profile-of-region">
                        <div class="profile-of-location1" >
                            <img class="img_region" src="img/sarp.png" hegiht="25" width="25"alt="region">
                            <a href = 'main.html?region=<?php echo $region; ?>'>
                            <button class="userID main-id point-span" id="region_button"><?php echo $region; ?></button>
                            </a>

                        </div>
                        <div class="profile-of-location2" >
                        <img class="img_local" src="img/we1.png" hegiht="13" width="13"alt="location">
                        <span class="location_font "> <?php echo $location; ?></span>
                        </div>
                    </div>
                   <hr id="hr1">
                    <div class="profile-of-article" >
                            <img class="img-profile pic" src="<?php echo $profile_image; ?>" alt="<?php echo $post_id; ?>님의 프로필 사진" onclick="location.href='user.html?id=<?php echo $post_id; ?>'">
                            <button class="userID main-id point-span" id="id_button" onclick="location.href='user.html?id=<?php echo $post_id; ?>'"><?php echo $post_id; ?></button>
                    </div>    
                    </div>
                    <button class="button_react_more" id="more_btn" onclick="moreCheck()" type="button">
                        <img class="icon-react" src="https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/bearu/more.png" alt="more">
                        </button>

                        <div id="more-modal">
                        <div id="logined">
                            <div>
                            <button class="more_btns" id="user_display" onclick="location.href='./post_modi.php?idx=<?php echo $idx; ?>'; return false;">수정</button>
                            </div>
                            <div>
                            <button  class="more_btns" id="user_edit" onclick="location.href='./post_del_result.php?idx=<?php echo $idx; ?>'; return false;">삭제</button>
                            </div>
                        </div>
                        </div>


                </header>
                <div class="reaction">
                <div class="description">
                   <textarea disabled><?php echo $memo; ?></textarea>
                </div>
                </div>
                <div class="icons-react">
                    <div class="icons-left">
                    <button class="button_react" id="heart_btn" onclick="heartCheck()" type="button"><img class="icon-react"id="heart_btn_img" src=img/heart.png alt="좋아요"></button>
                    <input type="hidden" name="heart_push" id="heart_push">
                    <button class="button_react" id="button_heart" onclick="commentCheck()" type="button"><img class="icon-react" src="https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/bearu/comment.png" alt="댓글"></button>
                    <button class="button_react" id="button_msg" onclick="msgClick('<?php echo $post_id; ?>')" type="button"><img class="icon-react" src=img/msg.png alt="쪽지" ></button>
                    </div>
                   
                </div>
                
                <!-- article text data -->
                <div class="reaction">
                    <?php
                        $con = mysqli_connect("localhost", "root", "qwer", "travelog");
                        mysqli_query($con, 'SET NAMES utf8');

                        if (isset($_GET['idx'])) {
                            $idx = $_GET['idx'];
                            $query = "SELECT l.* , (SELECT image FROM member m WHERE l.id = m.id) profile_image FROM like_tf l WHERE post = '".$idx."' ORDER BY RAND() LIMIT 1";
                            $result = $con->query($query);

                            while ($row = $result->fetch_assoc()) {
                                $like_image = $row['profile_image'];
                                $like_id = $row['id'];
                            }

                        }
                    ?>
                    <div class="liked-people">
                        <?php if($like_id != "") {
                            echo "
                            <img class='pic' src='".$like_image."' alt='johnnyjsuh님의 프로필 사진'>
                            <p><span class='point-span'>".$like_id."</span>님 포함 
                            ";
                        }
                        ?>
                    <span id="like_cnt" class="point-span"></span>명이 좋아합니다</p>
                    </div>
                   
                    <div class="comment-section">
                    <div class="comments">
                        
                    </div>
                    </div>   
                   <?php
                        $con = mysqli_connect("localhost", "root", "qwer", "travelog");
                        mysqli_query($con, 'SET NAMES utf8');
               

                        if (isset($_GET['idx'])) {
                            $idx = $_GET['idx'];
                            $query = "SELECT * FROM comment WHERE post = '".$idx."'" ;
                            $result = $con->query($query);

                            while ($row = $result->fetch_assoc()) {
                                $context = $row["context"];
                                $id = $row["id"];

                                echo "
                                <div id='id_tag'>
                                <span class='point-span userID' onclick='usernameTag(this)' data-id='".$id."'>".$id."</span> 
                                <span data-context='".$context."'>".$context."</span>";
                                if($id == $login_id ) {
                                    echo "<button type='submit' class='comment-delete' value='".$row["idx"]."'onclick='deleteComment(this)'>삭제</button>";
                                }
                                echo "</div>";

                            }
                         }
                        ?>
                
                   
                <div class="hl"></div>
                
                <div class="comment">
                    <input id="input-comment" class="input-comment" type="text" placeholder="댓글 달기..." >
                    <button id="submit-comment" class="submit-comment" disabled>게시</button> 
                </div>
                
                <div class="hl"></div>
                
                </article>
            
                </div>
                </main>
        </div>

    </div>


    <script>
        
    const commentInput = document.getElementById('input-comment');
    const commentBtn = document.getElementsByClassName('submit-comment')[0];
    const commentList = document.getElementsByClassName('comments')[0];
    var username = "<?php echo $login_id; ?>" ;
    var post = "<?php echo $post_idx; ?>";
   

    commentInput.addEventListener('keypress', function(e){
    if (commentInput.value) {
        if (e.which === 13) {
            btn_comment();
            var newComment = document.createElement('div');
            newComment.classList.add('comment');

            var commentContent = document.createElement('span');
            var userIDSpan = document.createElement('span');
           // 변경하고자 하는 사용자 이름
            userIDSpan.className = 'point-span userID';
            userIDSpan.textContent = username;
            commentContent.textContent = commentInput.value; //아마한줄?

            var commentDiv = document.createElement('div') ;
            commentDiv.id = 'id_tag';

            var user_id = document.createElement('span');
            user_id.className = 'point-span userID';
            user_id.textContent = username; 

            var commentTextSpan = document.createElement('span');
            var commentText = document.createTextNode(this.value);

            var deleteButton = document.createElement('button');  
            deleteButton.type = 'submit';
            deleteButton.className = 'comment-delete';   
            deleteButton.textContent = '삭제';  
 

            commentTextSpan.appendChild(commentText);
            commentDiv.appendChild(user_id);
            commentDiv.appendChild(commentTextSpan);
            commentDiv.appendChild(deleteButton);

            newComment.appendChild(commentDiv);
            commentList.appendChild(newComment);
            this.value = '';

            user_id.addEventListener('click', function() {
                commentInput.value = '@' + username;
            });
            commentInput.style.color = '#00376B';
         
            deleteButton.addEventListener('click', function() {
                var comment = this.parentNode.parentNode;
                var commentparent = this.parentNode;

                var commentspan_id = commentparent.children[0];
                var commentspan_context = commentparent.children[1];

                alert(commentspan_id.innerHTML);
                $.ajax({
                    url : 'comment_delete.php', 
                    data : {
                        "id" : commentspan_id.textContent,
                        "context" : commentspan_context.textContent
                    },
                    type : 'POST'
                }).done(function(data){         
                });
                commentList.removeChild(comment);

            });
              // @ 뒤에 붙은 값만 색상 변경
        var commentTextValue = commentText.textContent;
        var atSignIndex = commentTextValue.indexOf('@');
        if (atSignIndex !== -1) {
            var plainText = commentTextValue.substring(0, atSignIndex);
            var coloredText = commentTextValue.substring(atSignIndex);
            commentText.textContent = plainText;
            var coloredSpan = document.createElement('span');
            coloredSpan.style.color = '#00376B';
            coloredSpan.textContent = coloredText;
            commentDiv.insertBefore(coloredSpan, deleteButton);
        }
      

        }
    }
});

    commentBtn.addEventListener('click', function(){
        btn_comment();
        if (commentInput.value) {
            var newComment = document.createElement('div'); // <div> 요소로 변경
            newComment.classList.add('comment'); // comment 클래스 추가

            var commentContent = document.createElement('span');
                var userIDSpan = document.createElement('span');
              // 변경하고자 하는 사용자 이름
                userIDSpan.className = 'point-span userID';
                userIDSpan.textContent = username;
                commentContent.textContent = commentInput.value;

              var commentDiv = document.createElement('div');
            commentDiv.id = 'id_tag';

            var user_id = document.createElement('span');
            user_id.className = 'point-span userID';
            user_id.textContent = username; 
 
            var commentTextSpan = document.createElement('span');
            var commentText = document.createTextNode(commentInput.value);
 
            var deleteButton = document.createElement('button');  
            deleteButton.type = 'submit';
            deleteButton.className = 'comment-delete';   
            deleteButton.textContent = '삭제';  
 
            commentTextSpan.appendChild(commentText);
            commentDiv.appendChild(user_id);
            commentDiv.appendChild(commentTextSpan);
            commentDiv.appendChild(deleteButton);

            newComment.appendChild(commentDiv);
            commentList.appendChild(newComment);
            commentInput.value = '';

            user_id.addEventListener('click', function() {
                commentInput.value = '@' + username;
            });
            commentInput.style.color = '#00376B';
         
            deleteButton.addEventListener('click', function() {
                var comment = this.parentNode.parentNode;
                var commentparent = this.parentNode;

                var commentspan_id = commentparent.children[0];
                var commentspan_context = commentparent.children[1];

                alert(commentspan_context.innerHTML);
                $.ajax({
                    url : 'comment_delete.php', 
                    data : {
                        "id" : commentspan_id.textContent,
                        "context" : commentspan_context.textContent
                    },
                    type : 'POST'
                }).done(function(data){         
                });

                commentList.removeChild(comment);

            });
        
        }
    })

    commentInput.addEventListener('keyup', function(event) {
        if (commentInput.value) {
            commentBtn.disabled = false;
        }
        else {
            commentBtn.disabled = true;
        }
    })


//////로그인-체크//////
var logined = "<?php echo $logined ?>";
var likecheck = "";
var post_id_check= "<?php echo $post_id ?>";

function logincheck() {
   
  if (logined) { // 로그인 O
    $.ajax({
      // 좋아요 눌렀나 조회
      url: 'like_ser.php',
      data: {
        "post": post,
        "id": username
      },
      type: 'POST'
    }).done(function(data) {
        
      // php echo "true";
      // php echo "false";
      if (data == "true") {
        document.getElementById('heart_btn_img').src = "./img/heart_push.png";
        likecheck = true;
      } else {
        document.getElementById('heart_btn_img').src = "./img/heart.png";
        likecheck = false;
      }
    });
     
    if(username == post_id_check) {
        document.getElementById("more_btn").disabled = false;
    }else{
        document.getElementById("more_btn").disabled = true;
    }

  } else { // 로그인 X
    document.getElementById("heart_btn").disabled = true;
    document.getElementById("input-comment").disabled = true;
    document.getElementById("submit-comment").disabled = true;
    document.getElementById("more_btn").disabled = true;

  }


}

function heart_cnt() {
    $.ajax({
      //좋아요 수 조회
      url: 'like_count.php',
      data: {"post": post},
      type: 'POST'
    }).done(function(data) {
        document.getElementById("like_cnt").innerHTML = data;
    });

}

window.onload = logincheck();
window.onload = heart_cnt();

//////좋아요-버튼//////
var heart_btn = document.getElementById('heart_btn');

    function heartCheck() {

        if (likecheck == false) {
            document.getElementById('heart_btn_img').src = "./img/heart_push.png"

            $.ajax({
                url : 'like_add.php', 
                data : {
                    "id" : username,
                    "post" : post
                },
                type : 'POST'
            }).done(function(data){         
                likecheck = true ;
                heart_cnt();
            });
            
            return;

        } else {
            document.getElementById('heart_btn_img').src = "./img/heart.png"
            $.ajax({
                url : 'like_delete.php', 
                data : {
                    "id" : username,
                    "post" : post
                },
                type : 'POST'
            }).done(function(data){     
                likecheck = false ;
                heart_cnt();
            });
            
            return;

        }
        
    }

//댓글입력Ajax//
 function btn_comment(){
    $.ajax({
                    url : 'comment_upload.php', 
                    data : {
                        "context" : commentInput.value,
                        "id" : username,
                        "idx" : post
                    },
                    type : 'POST'
                }).done(function(data){         
                });
 }

 function deleteComment(button) {
    var commentDiv = button.parentNode; 

    var userID = commentDiv.querySelector('.point-span.userID').getAttribute('data-id');
    var context = commentDiv.querySelectorAll('span')[1].innerHTML;

   $.ajax({
                    url : 'comment_delete.php', 
                    data : {
                        "context" : context,
                        "id" : userID,
                        "idx" : post                    
                    },
                    type : 'POST'
                }).done(function(data){         
                });
    commentDiv.parentNode.removeChild(commentDiv); 
}

/////모달--수정,삭제버튼--/////
var modal_btncheck = false;
function moreCheck() {
    const header_modal = document.getElementById("more-modal");

    if(! modal_btncheck){
    header_modal.style.display = "block";
    modal_btncheck=true;
    }
    else{
        header_modal.style.display = "none";
        modal_btncheck=false;

    }
  }

  /////메시지 화면으로 이동/////
  function msgClick(id) {
    if(logined) {
        location.href = 'create_chatroom.php?usrId='+id;
    }
    else {
        alert("로그인이 필요합니다");
    }
  }
  function usernameTag(userspan) {
    commentInput.value = '@' + userspan.innerHTML;
    commentInput.style.color = '#00376B';
 }
</script>
<script type="text/javascript" src="common.js"></script>

</body>
</html>