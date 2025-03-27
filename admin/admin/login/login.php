<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

//관리자 검사
if (isset($_SESSION['AUID'])) {
  echo "<script>
    alert('이미 로그인되어 있습니다.');
    location.href='../dashboard/dashboard.php';
  </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/clean_kangaroo/css/common.css">

    <!-- datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="../../css/login.css">

  <title>관리자 로그인 | Deep Learning Kangaroo</title>
</head>
<body>
  <div class="popup">
    <div class="pophd">
      <img src="../../images/pooup_logo.png" alt="팝업창 로고" class="pop_up_img">
      <strong class="body2b">LMS 포트폴리오 사이트(3차 - 관리자페이지)</strong>
      <strong class="body2b">본 사이트는 구직용 포트폴리오 웹사이트이며,<br>실제로 운영되는 사이트가 아닙니다.</strong>
    </div>
    <hr>
    <div class="popct01">
      <p>팀 깨끗한 아기 캥거루 :  추송림(팀장), 박선진, 이다영</p>
      <p><strong>제작기간:</strong> 2024. 04. 8 ~ 2024. 5. 25</p>
      <p><strong>개발환경:</strong> html5, css3, javascript, php, mySQL</p>
      <div class="link df aic">
        <p>
          <strong>기획서:</strong>
          <a href="https://www.figma.com/file/y3L7Q49u1w3kv0DhYzyMOd/%EA%B9%A8%EB%81%97%ED%95%9C-%EC%95%84%EA%B8%B0-%EC%BA%A5%EA%B1%B0%EB%A3%A8%F0%9F%A6%98?type=design&node-id=551%3A2952&mode=design&t=JiGypB1sCgJigjAu-1"
            target="_blank">피그마
          </a>
        </p>
        <p>
          <strong>코드:</strong>
          <a href="https://github.com/aengkrrrrr/clean_kangaroo.git" class="git" target="_blank">
            깃허브</a>
        </p>
      </div>
    </div>
    <hr>
    <div class="popct02">
      <strong>업무분장</strong>
      <p><strong>기획:</strong> 팀원 전체</p>
      <p><strong>디자인:</strong> 구현 담당자</p>
        <div class="workset_area02">
          <strong>- 구현 완료 페이지 -</strong>
          <p>추송림: 로그인, 대시보드, 회원관리,공지사항 관리,큐앤에이 관리</p>
          <p>박선진: 상품 관리</p>
          <p>이다영: 쿠폰 관리, 수강평 관리, 카테고리 관리</p>
        </div>
    </div>
    <hr>
    <div class="popft">
      <p>아이디 : admin / 비밀번호 : 1111</p>
      <a href="#">사용자 페이지가기</a>
    </div>
    <div class="popup_check">
      <label class="form-check-label" for="flexCheckChecked">
        오늘 하루 안 보기
      </label>
      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
    </div>
    <button class="popup_btn"><img src="../../images/popup_kang_btn.png" alt="">close</button>
  </div>

  <form action="login_ok.php" class="login_wrap" method="POST">
    <h1 class="login_logo"><a href="" class="hidden">로그인 로고</a></h1>
      <div class="form-floating mb-3 login">
        <input type="text" class="form-control" name="userid" id="userid"  placeholder="ID">
        <label for="userid">ID</label>
      </div>
      <div class="form-floating login">
        <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password">
        <label for="passwd">PASSWORD</label>
      </div>
      <button class="primary_btn login_btn">로그인</button>
  </form>
</body>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>
<script src="../../js/cookie.js"></script>

<!-------------------- 스크립트 -->
</html>