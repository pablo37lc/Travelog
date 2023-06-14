<!DOCTYPE html>
<html lang="ko">
<?php
    $con = mysqli_connect("localhost", "root", "qwer", "php_db");
    mysqli_query($con,'SET NAMES utf8');	
    
//세션 데이터에 접근하기 위해 세션 시작
  if (!session_id()) 
  {
    session_start();      
  }

?>
  <head>
    <meta charset="UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Modal</title>

    <style>
            .modal {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(1.5px);
            -webkit-backdrop-filter: blur(1.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            display: none;
            }
            .border-blackbottom{
                               
            }


            .modal_body {
           
            background: rgba( 69, 139, 197, 0.6 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );            
            backdrop-filter: blur( 13.5px );
            -webkit-backdrop-filter: blur( 13.5px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            width: 400px;
            height: 500px;
            position: relative;
            top: -100px;
            padding: 10px;
            text-align: center;
            }


            .modal_body .com1{
                width:100%;
                height:10%
            }
            .close-area {
            display: inline;
            float: right;
            padding-right: 10px;
            cursor: pointer;
            text-shadow: 1px 1px 2px gray;
            color: white;
            }
            .titlem{
                display: inline; 
            }

            .modal_body .com2{
            width: 100%;
            height:80%;
            
            display: inline-block;
            overflow: auto;
            }
            ul{
            list-style: none;
            padding-left: 0;
            /* unordered list 기본 스타일 제거(점, 들여쓰기) */
            }
            .lim{
            /* 각각의 프로필을 flex box로 구성 */
            display: flex;
            flex-direction: row;
            align-items: center;
            flex-wrap: nowrap;
            margin-bottom: 1.25rem; /* 16 브라우저 기준 20px */
            margin-top: 0.625rem; /* 16 브라우저 기준 10px */  
            align-items: center;
            border: 1px solid #BED0DE
            }
            .lim > img{
            /* 프로필사진 사이즈 조절 */
            width: 60px;
            border-radius: 70%;
            object-fit: cover;
            }
            .profilem > *{
            /* 이름과 프로필 사진의 margin 조절 */
            margin: 5px; /* 5px (16px 브라우저 기준) */
            margin-left:15px;
            }
            .profilem > *:first-of-type{
            /* 이름 스타일 변경 : 굵게 처리 */
            font-weight: bold;
            font-size: 15px; /* 16 브라우저 기준 14px */
            } 
            .profilem > *:nth-of-type(2){
            /* 상태메시지 스타일 변경*/
            color: gray;
            font-size: 12px; /* 16 브라우저 기준 12px */
            }
            .modal_body .com3{
            width: 100%;
            height:10%;            
            text-align: left;
            display: inline-block;
            }
            .minput{
            width: 40%;
            height: 25px;
            font-size: 15px;
            border: 0;
            border-radius: 15px;
            outline: none;
            padding-left: 10px;
            background-color: rgb(233, 233, 233);
            }
            .m-btn {
            position: relative;
            border: none;
            display: inline-block;
            padding: 6px 25px;
            border-radius: 15px;
            font-family: "paybooc-Light", sans-serif;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            font-weight: 600;
            transition: 0.25s;
            }
            
            .m-btn-indigo {
            background-color: aliceblue;
            color: #1e6b7b;
            }
    </style>
  </head>
  <body>
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
    <button class="btn-open-popup">Modal 띄우기</button>


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
</html>