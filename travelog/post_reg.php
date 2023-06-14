<?php 
// 데이터베이스 구성 
$dbHost      =  "localhost" ; 
$dbUsername  =  "root" ; 
$dbPassword  =  "qwer" ; 
$dbName      =  "travelog" ; 

// 데이터베이스 연결 생성 
$db  = new  mysqli ( $dbHost ,  $dbUsername ,  $dbPassword ,  $dbName ); 

// 연결 확인 
if ( $db -> connect_error ) { 
    die( "연결 실패: "  .  $db ->연결_오류 ); 
} 

session_start();
$login_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/post_reg.css" rel="stylesheet">    

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
                <input type="image" src="./img/photo.png" alt="" onclick="add('<?php echo $login_id; ?>')">
                <input type="image" src="./img/message.png" alt="" onclick="chat('<?php echo $login_id; ?>')">
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
    <form id="myForm" action="upload.php" enctype="multipart/form-data" method="post">
        <div class="container">
         <!-- <form action="/board/new" method="post" enctype="multipart/form-data"> -->
            <div class="form_top"> 
              <button type="submit" class="btn_reg" name="submit" value="Upload">공유하기</button>

            </div>
                  <div id="root" style=""> 
                    <div class="contents">
                        <div class="upload-box">
                          <div id="drop-file" class="drag-file"  onclick="imageup()">
                              <img src="img/cam.png" alt="파일 아이콘" class="image" >
                              <p class="message">Click This or Upload Button</p>
                              <img src="" alt="미리보기 이미지" class="preview">
                          </div>
                      
                          <input class="file" id="chooseFile" type="file" name="file" onchange="dropFile.handleFiles(this.files)" accept="image/png, image/jpeg, image/gif">                           
                          <label type="submit" name="submit" class="file-label" for="chooseFile">Upload File</label>
                        </div>
                        
                        
                    </div>               
                  </div>
                <div class="form_tag">
                    <div id="p">        
                        <p id="region_tag">태그로 지역을 소개해보세요!</p>
                    </div>
                </div>
                <div class="form_region">
                    <div class="image1">
                        <img id="img1" src="img/sarp.png" lt="이미지" width="25" height="25"></img>
                    </div>   

                        <div id="region_bar">     
                            <input autocomplete="off" type="text" id="input" name="region" placeholder="지역 태그">
                        </div>
                </div>

                <div class="form_location">
                    <div class="image2"> 
                        <img id="img2" src="img/we1.png" lt="이미지" width="14" height="25"></img>
                    </div>
                    <div id="location_bar">
                    <input type="text" id="input"name="location" placeholder="장소 추가" >
                    </div>
                </div>
                <hr id="hr2">
            
                <div class="textarea">
                <textarea name="memo"  onkeydown="return limitLines(this, event)" style="height: 240px; width: 350px;" placeholder="문구 입력..." ></textarea>
          
              </div>
              <hr id="hr3">
            
        </div>

        <button id="lock_btn" type="button"><img id="lock_btn_img" src="img/unlock.png" width="26" height="26"></button>
        <input type="hidden" name="hide_tf" id="hide_tf">
        <p id=lock_ment>나만보기</p>
        </form>  
    </div>


    </div>

<script>
const region = ["서울특별시 종로구", "서울특별시 중구", "서울특별시 용산구", "서울특별시 성동구", "서울특별시 광진구", "서울특별시 동대문구", "서울특별시 중랑구", "서울특별시 성북구", "서울특별시 강북구", "서울특별시 도봉구", "서울특별시 노원구", "서울특별시 은평구", "서울특별시 서대문구", "서울특별시 마포구", "서울특별시 양천구", "서울특별시 강서구", "서울특별시 구로구", "서울특별시 금천구", "서울특별시 영등포구", "서울특별시 동작구", "서울특별시 관악구", "서울특별시 서초구", "서울특별시 강남구", "서울특별시 송파구", "서울특별시 강동구", "부산광역시 중구", "부산광역시 서구", "부산광역시 동구", "부산광역시 영도구", "부산광역시 부산진구", "부산광역시 동래구", "부산광역시 남구", "부산광역시 북구", "부산광역시 해운대구", "부산광역시 사하구", "부산광역시 금정구", "부산광역시 강서구", "부산광역시 연제구", "부산광역시 수영구", "부산광역시 사상구", "부산광역시 기장군", "대구광역시 중구", "대구광역시 동구", "대구광역시 서구", "대구광역시 남구", "대구광역시 북구", "대구광역시 수성구", "대구광역시 달서구", "대구광역시 달성군", "인천광역시 중구", "인천광역시 동구", "인천광역시 미추홀구", "인천광역시 연수구", "인천광역시 남동구", "인천광역시 부평구", "인천광역시 계양구", "인천광역시 서구", "인천광역시 강화군", "인천광역시 옹진군", "광주광역시 동구", "광주광역시 서구", "광주광역시 남구", "광주광역시 북구", "광주광역시 광산구", "대전광역시 동구", "대전광역시 중구", "대전광역시 서구", "대전광역시 유성구", "대전광역시 대덕구", "울산광역시 중구", "울산광역시 남구", "울산광역시 동구", "울산광역시 북구", "울산광역시 울주군", "세종특별자치시", "경기도 수원시영통구", "경기도 수원시팔달구", "경기도 수원시권선구", "경기도 수원시장안구", "경기도 성남시분당구", "경기도 성남시중원구", "경기도 성남시수정구", "경기도 고양시일산서구", "경기도 고양시일산동구", "경기도 고양시덕양구", "경기도 용인시수지구", "경기도 용인시기흥구", "경기도 용인시처인구", "경기도 부천시", "경기도 안산시단원구", "경기도 안산시상록구", "경기도 안양시동안구", "경기도 안양시만인구", "경기도 남양주시", "경기도 화성시", "경기도 평택시", "경기도 의정부시", "경기도 시흥시", "경기도 파주시", "경기도 광명시", "경기도 김포시", "경기도 군포시", "경기도 광주시", "경기도 이천시", "경기도 양주시", "경기도 오산시", "경기도 구리시", "경기도 안성시", "경기도 포천시", "경기도 의왕시", "경기도 하남시", "경기도 여주시", "경기도 양평군", "경기도 동두천시", "경기도 과천시", "경기도 가평군", "경기도 연천군", "강원도 춘천시", "강원도 원주시", "강원도 강릉시", "강원도 동해시", "강원도 태백시", "강원도 속초시", "강원도 삼척시", "강원도 홍천군", "강원도 횡성군", "강원도 영월군", "강원도 평창군", "강원도 정선군", "강원도 철원군", "강원도 화천군", "강원도 양구군", "강원도 인제군", "강원도 고성군", "강원도 양양군", "충청북도 청주시청원구", "충청북도 청주시서원구", "충청북도 청주시상당구", "충청북도 충주시", "충청북도 제천시", "충청북도 보은군", "충청북도 옥천군", "충청북도 영동군", "충청북도 진천군", "충청북도 괴산군", "충청북도 음성군", "충청북도 단양군", "충청북도 증평군", "충청남도 천안시서북구", "충청남도 천안시동남구", "충청남도 공주시", "충청남도 보령시", "충청남도 아산시", "충청남도 서산시", "충청남도 논산시", "충청남도 계룡시", "충청남도 당진시", "충청남도 금산군", "충청남도 부여군", "충청남도 서천군", "충청남도 청양군", "충청남도 홍성군", "충청남도 예산군", "충청남도 태안군", "전라북도 전주시덕진구", "전라북도 전주시완산구", "전라북도 군산시", "전라북도 익산시", "전라북도 정읍시", "전라북도 남원시", "전라북도 김제시", "전라북도 완주군", "전라북도 진안군", "전라북도 무주군", "전라북도 장수군", "전라북도 임실군", "전라북도 순창군", "전라북도 고창군", "전라북도 부안시", "전라남도 목포시", "전라남도 여수시", "전라남도 순천시", "전라남도 나주시", "전라남도 광양시", "전라남도 담양군", "전라남도 곡성군", "전라남도 구례군", "전라남도 고흥군", "전라남도 보성군", "전라남도 화순군", "전라남도 장흥군", "전라남도 강진군", "전라남도 해남군", "전라남도 영암군", "전라남도 무안군", "전라남도 함평군", "전라남도 영광군", "전라남도 장성군", "전라남도 완도군", "전라남도 진도군", "전라남도 신안군", "경상북도 경주시", "경상북도 김천시", "경상북도 안동시", "경상북도 구미시", "경상북도 영주시", "경상북도 영천시", "경상북도 상주시", "경상북도 문경시", "경상북도 경산시", "경상북도 군위군", "경상북도 의성군", "경상북도 청송군", "경상북도 영양군", "경상북도 영덕군", "경상북도 청도군", "경상북도 고령군", "경상북도 성주군", "경상북도 칠곡군", "경상북도 예천군", "경상북도 봉화군", "경상북도 울진군", "경상북도 울릉군", "경상북도 포항시북구", "경상북도 포항시남구", "경상남도 창원시진해구", "경상남도 창원시마산희원구", "경상남도 창원시마산합포구", "경상남도 창원시성산구", "경상남도 창원시의창구", "경상남도 진주시", "경상남도 통영시", "경상남도 사천시", "경상남도 김해시", "경상남도 밀양시", "경상남도 거제시", "경상남도 양산시", "경상남도 의령군", "경상남도 함안군", "경상남도 창녕군", "경상남도 고성군", "경상남도 남해군", "경상남도 하동군", "경상남도 산청군", "경상남도 함양군", "경상남도 거창군", "경상남도 합천군", "제주특별자치도 제주시", "제주특별자치도 서귀포시"];
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
/*---이미지업로드3----*/

function DropFile(dropAreaId, fileListId) {
  let dropArea = document.getElementById(dropAreaId);
  let fileList = document.getElementById(fileListId);

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  function highlight(e) {
    preventDefaults(e);
    dropArea.classList.add("highlight");
  }

  function unhighlight(e) {
    preventDefaults(e);
    dropArea.classList.remove("highlight");
  }

  function handleDrop(e) {
    unhighlight(e);
    let dt = e.dataTransfer;
    let files = dt.files;

    handleFiles(files);

    const fileList = document.getElementById(fileListId);
    if (fileList) {
      fileList.scrollTo({ top: fileList.scrollHeight });
    }
  }

  function handleFiles(files) {
    files = [...files];
    // files.forEach(uploadFile);
    files.forEach(previewFile);
  }

  function previewFile(file) {
    console.log(file);
    renderFile(file);
  }

  function renderFile(file) {
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function () {
      let img = dropArea.getElementsByClassName("preview")[0];
      img.src = reader.result;
      img.style.display = "block";
      let Fileurl = reader.result;

    };
  }

  dropArea.addEventListener("dragenter", highlight, false);
  dropArea.addEventListener("dragover", highlight, false);
  dropArea.addEventListener("dragleave", unhighlight, false);
  dropArea.addEventListener("drop", handleDrop, false);

  return {
    handleFiles
  };
}

const dropFile = new DropFile("drop-file", "files");


var lock_btn = document.getElementById('lock_btn');
var lock_ment = document.getElementById('lock_ment');
var isHidden = true;
lock_ment.style.display = 'none';

const hide_tf = document.getElementById('hide_tf');

lock_btn.addEventListener('click', function() {
  if (isHidden) {
    
    document.getElementById('lock_btn_img').src = "./img/unlock.png" 
    lock_ment.style.display = 'none';
    hide_tf.value=0;
  } else {
    document.getElementById('lock_btn_img').src = "./img/lock.png"
    lock_ment.style.display = 'block';
    hide_tf.value=1;
  }
  isHidden = !isHidden;
  document.getElementById('myForm').submit();
  

});

function imageup() {
  document.getElementById('chooseFile').click();
}
</script>

<script type="text/javascript" src="common.js"></script>

</body>
</html>