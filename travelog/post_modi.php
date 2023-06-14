<?php 

 session_start();
 $login_id=$_SESSION["id"];

// 연결 확인 
if ( $db -> connect_error ) { 
    die( "연결 실패: "  .  $db ->연결_오류 ); 
} 

$con = mysqli_connect("localhost", "root", "qwer", "travelog");
mysqli_query($con,'SET NAMES utf8');	
$idx = $_GET['idx'];                                             
$sql = "select * from post where idx ='".$idx."'"; 
$result = mysqli_query($con, $sql); 
$row = mysqli_fetch_array($result);  

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
        #left{
            width: 20%;
            background-color: #D1C4E9;
        }
        #center{
            width: 60% ;

        }
        #right{
            width: 20%;
            background-color: #D1C4E9;
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
    height:470px;
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



.profile-of-region{
    display: flex;
    align-items: center;
    flex-direction: column;
    margin-top:-47px;
    height:42px;
    margin-right:27px;
}
.profile-of-location1 {
    display: flex;
    align-items: center;
    margin-left:-150px;
    width:300px;
    margin-top:-20px;
}


.profile-of-location2 {
    display: flex;
    width:420px;
    position:relative;
    align-items: center;
    margin-top:15px;
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
}


.main-id {
    margin-left: 14px;
}

.hl {
    width: 460px;
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
#hr2{
    position: relative;
    width: 468px;
    bottom:10px;
    margin-right: 60px;
    border-style: solid ;
    border-color: #E0E0E0 ;
    border-width: 1px ;
}
.button_react:hover,#id_button:hover,.button_react_more:hover,#region_button:hover
{
background-color: #EAEAEA;
}  


.memo_text{
    height:300px;
}
#memo_textarea{
position: relative;
margin-left:5px;
top:15px;  
width:430px;
height:270px;
border:none;
}

#location{
position: relative;
margin-left:27px;  
height:24px;  
}
.location_font{
    font-size:14px;
    margin-left:28px;
}
#region_bar{
    height: 40px;
    position: relative; 
    top: 0px;
    border-radius: 0px;
    width: 200px;
    margin-left: 18px;
    display: flex;
    justify-content: center;
}
#region_bar>input {
height: 25px;
width:300px;
}
#suggestions {
    position: absolute;
    z-index: 1;
    background-color: #fff;
    width: 100%;
    max-height: 200px;
    overflow-y: auto; 
    display: none;
    max-height: 85px;
  }
.but_area_edit{
    width:60px;

    height:30px;
    margin-left: 208px;
    transform: translate(-90%, -35%);
    background-color:#B3E5FC;


}
.but_area_del{
    width:60px; 
    margin-left: 208px;
    transform: translate(50%, -135%);
    height:30px;
    background-color:#000000;
}
#btn_edit, #btn_return{
    border:none;
    width:60px;
    height:30px;
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
                <img id="img_exphoto" src="<?php echo $row['image'] ?>" lt="피드 사진" class="mainPic">
            </div>
            <article >
            <form enctype="multipart/form-data" method="post">    
                <!-- article -->
              
                <header  > 
                   <div class="profile_whole"> 
                    <div class="profile-of-region">
                    <div class="profile-of-location1" >
                         <img class="img_region" src="img/sarp.png" hegiht="25" width="25"alt="region">
                         <div id="region_bar">   
                         <input autocomplete="off" type="text" id="input" name="region" value="<?php echo $row['state'].' '. $row['city']?>">
                         </div>
                    </div>
                        <div class="profile-of-location2" >
                        <img class="img_local" src="img/we1.png" hegiht="13" width="13"alt="location">
                        <input type="text" name="location" id="location" value="<?php echo $row['location']?>">
                        </div>
                    </div>
                   <hr id="hr1">
                  
                    </div>
                </header>
                <div class="memo_text">
                <textarea name="memo" rows="20" id="memo_textarea"title="내용"><?php echo $row['memo']?></textarea>
                </div>


                <input type="hidden" id="idx" name="idx" value="<?php echo $row['idx']?>">
                <hr id="hr2">
                    <div class="but_area_edit">
                        <button formaction="post_modi_result.php" type="submit" id="btn_edit" > 수정</button> 
                    </div>
                   
                </form>
                <div class="but_area_del">
                    <button  class="btn_return" id="btn_return" onclick="history.back()">취소</button>
                </div>
                </article>

                </div>
                </main>
            
    
        </div>

    </div>


<script>
   
const region = ["서울특별시 종로구", "서울특별시 중구", "서울특별시 용산구", "서울특별시 성동구", "서울특별시 광진구", "서울특별시 동대문구", "서울특별시 중랑구", "서울특별시 성북구", "서울특별시 강북구", "서울특별시 도봉구", "서울특별시 노원구", "서울특별시 은평구", "서울특별시 서대문구", "서울특별시 마포구", "서울특별시 양천구", "서울특별시 강서구", "서울특별시 구로구", "서울특별시 금천구", "서울특별시 영등포구", "서울특별시 동작구", "서울특별시 관악구", "서울특별시 서초구", "서울특별시 강남구", "서울특별시 송파구", "서울특별시 강동구", "부산광역시 중구", "부산광역시 서구", "부산광역시 동구", "부산광역시 영도구", "부산광역시 부산진구", "부산광역시 동래구", "부산광역시 남구", "부산광역시 북구", "부산광역시 해운대구", "부산광역시 사하구", "부산광역시 금정구", "부산광역시 강서구", "부산광역시 연제구", "부산광역시 수영구", "부산광역시 사상구", "부산광역시 기장군", "대구광역시 중구", "대구광역시 동구", "대구광역시 서구", "대구광역시 남구", "대구광역시 북구", "대구광역시 수성구", "대구광역시 달서구", "대구광역시 달성군", "인천광역시 중구", "인천광역시 동구", "인천광역시 남구", "인천광역시 미추홀구", "인천광역시 연수구", "인천광역시 남동구", "인천광역시 부평구", "인천광역시 계양구", "인천광역시 서구", "인천광역시 강화군", "인천광역시 옹진군", "광주광역시 동구", "광주광역시 서구", "광주광역시 남구", "광주광역시 북구", "광주광역시 광산구", "대전광역시 동구", "대전광역시 중구", "대전광역시 서구", "대전광역시 유성구", "대전광역시 대덕구", "울산광역시 중구", "울산광역시 남구", "울산광역시 동구", "울산광역시 북구", "울산광역시 울주군", "세종특별자치시", "경기도 수원시", "경기도 성남시", "경기도 고양시", "경기도 용인시", "경기도 부천시", "경기도 안산시", "경기도 안양시", "경기도 남양주시", "경기도 화성시", "경기도 평택시", "경기도 의정부시", "경기도 시흥시", "경기도 파주시", "경기도 광명시", "경기도 김포시", "경기도 군포시", "경기도 광주시", "경기도 이천시", "경기도 양주시", "경기도 오산시", "경기도 구리시", "경기도 안성시", "경기도 포천시", "경기도 의왕시", "경기도 하남시", "경기도 여주시", "경기도 여주군", "경기도 양평군", "경기도 동두천시", "경기도 과천시", "경기도 가평군", "경기도 연천군", "강원도 춘천시", "강원도 원주시", "강원도 강릉시", "강원도 동해시", "강원도 태백시", "강원도 속초시", "강원도 삼척시", "강원도 홍천군", "강원도 횡성군", "강원도 영월군", "강원도 평창군", "강원도 정선군", "강원도 철원군", "강원도 화천군", "강원도 양구군", "강원도 인제군", "강원도 고성군", "강원도 양양군", "충청북도 청주시", "충청북도 충주시", "충청북도 제천시", "충청북도 청원군", "충청북도 보은군", "충청북도 옥천군", "충청북도 영동군", "충청북도 진천군", "충청북도 괴산군", "충청북도 음성군", "충청북도 단양군", "충청북도 증평군", "충청남도 천안시", "충청남도 공주시", "충청남도 보령시", "충청남도 아산시", "충청남도 서산시", "충청남도 논산시", "충청남도 계룡시", "충청남도 당진시", "충청남도 당진군", "충청남도 금산군", "충청남도 연기군", "충청남도 부여군", "충청남도 서천군", "충청남도 청양군", "충청남도 홍성군", "충청남도 예산군", "충청남도 태안군", "전라북도 전주시", "전라북도 군산시", "전라북도 익산시", "전라북도 정읍시", "전라북도 남원시", "전라북도 김제시", "전라북도 완주군", "전라북도 진안군", "전라북도 무주군", "전라북도 장수군", "전라북도 임실군", "전라북도 순창군", "전라북도 고창군", "전라북도 부안군", "전라남도 목포시", "전라남도 여수시", "전라남도 순천시", "전라남도 나주시", "전라남도 광양시", "전라남도 담양군", "전라남도 곡성군", "전라남도 구례군", "전라남도 고흥군", "전라남도 보성군", "전라남도 화순군", "전라남도 장흥군", "전라남도 강진군", "전라남도 해남군", "전라남도 영암군", "전라남도 무안군", "전라남도 함평군", "전라남도 영광군", "전라남도 장성군", "전라남도 완도군", "전라남도 진도군", "전라남도 신안군", "경상북도 포항시", "경상북도 경주시", "경상북도 김천시", "경상북도 안동시", "경상북도 구미시", "경상북도 영주시", "경상북도 영천시", "경상북도 상주시", "경상북도 문경시", "경상북도 경산시", "경상북도 군위군", "경상북도 의성군", "경상북도 청송군", "경상북도 영양군", "경상북도 영덕군", "경상북도 청도군", "경상북도 고령군", "경상북도 성주군", "경상북도 칠곡군", "경상북도 예천군", "경상북도 봉화군", "경상북도 울진군", "경상북도 울릉군", "경상남도 창원시", "경상남도 마산시", "경상남도 진주시", "경상남도 진해시", "경상남도 통영시", "경상남도 사천시", "경상남도 김해시", "경상남도 밀양시", "경상남도 거제시", "경상남도 양산시", "경상남도 의령군", "경상남도 함안군", "경상남도 창녕군", "경상남도 고성군", "경상남도 남해군", "경상남도 하동군", "경상남도 산청군", "경상남도 함양군", "경상남도 거창군", "경상남도 합천군", "제주특별자치도 제주시", "제주특별자치도 서귀포시", "제주특별자치도 북제주군", "제주특별자치도 남제주군"];
var selectedRegion;
function autocomplete(input, list) {
   //이벤트 수신기를 추가하여 입력 값을 모든 국가와 비교합니다
    input.addEventListener('input', function () {
        //Close the existing list if it is open
        closeList();

        //If the input is empty, exit the function
        if (!this.value)
            return;

       //제안 <div>를 만들어 입력 필드가 포함된 요소에 추가합니다
        suggestions = document.createElement('div');
        suggestions.setAttribute('id', 'suggestions');
        this.parentNode.appendChild(suggestions);

        for (let i=0; i<list.length; i++) {
            if (list[i].toUpperCase().includes(this.value.toUpperCase())) {
                //If a match is foundm create a suggestion <div> and add it to the suggestions <div>
                suggestion = document.createElement('div');
                suggestion.innerHTML = list[i];
                
                suggestion.addEventListener('click', function () {
                    input.value = this.innerHTML;
                    closeList();
                    selectedRegion = input.value;
                    console.log(selectedRegion);
              // AJAX 요청 보내기
              var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'post_modi_result.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // AJAX 요청 완료 시 처리할 코드
                            console.log(xhr.responseText);
                        }
                    };
                    xhr.send('selectedRegion=' + encodeURIComponent(selectedRegion));
                                
                });

                suggestion.style.cursor = 'pointer';
                suggestions.appendChild(suggestion);
                suggestions.style.display = 'block';
            }
        }

    });

    function closeList() {
        let suggestions = document.getElementById('suggestions');
        if (suggestions)
            suggestions.parentNode.removeChild(suggestions);
    }
  }

var inputElement = document.getElementById('input');
if (inputElement) {
    autocomplete(inputElement, region);
}


</script>
<script type="text/javascript" src="common.js"></script>
</body>
</html>