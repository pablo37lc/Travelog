function search() {
    var region = document.getElementById("location").value;
    location.href="main.html?region=" + region;
}

function korea() {
    location.href="main.html";
}

var display = false;
const header_modal = document.getElementById("header-modal");
const not_logined_header = document.getElementById("not_logined");
const logined_header = document.getElementById("logined");

function user(login_id) {   
    if(!display) {
        header_modal.style.display = "block";
        display = true;
    }
    else {
        header_modal.style.display = "none";
        display = false;
    }
    
    if(login_id == "") {
        not_logined_header.style.display = "block";
        logined_header.style.display = "none";
    }
    else {
        not_logined_header.style.display = "none";
        logined_header.style.display = "block";

        document.getElementById("user_display").href = "user.html?id="+login_id;
        document.getElementById("user_edit").href = "useredit.html";
        document.getElementById("sign_out").href = "logout.php";
    }
}

function chat(login_id) {
    if(login_id == "") {
        alert("로그인 해주세요");
    }
    else {
        location.href = "layout.php";
    }
}

function add(login_id) {
    if(login_id == "") {
        alert("로그인 해주세요");
    }
    else {
        location.href = "post_reg.php";
    }
}