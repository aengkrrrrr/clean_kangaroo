<?php
$title='홈';
$css1 =' <link rel="stylesheet" href="./css/u_login.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
<main class="usergrid">
  <form class="user_login_wrap df fdc" action="u_login.ok" method="POST">
    <div  class="login_top">
    <img src="../images/admin_header_logo.png" alt="">
      <strong class="body3b">쉽고 빠르게 달리자,<br>
        딥러닝 캥거루</strong>
        <a href="" class="login_kakao primary_btn body3b">카카오로 시작하기</a>
    </div>
    <span>또는 일반로그인</span>
    <div class="login_mid">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">아이디</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">비밀번호</label>
      </div>
    </div>
    <div class="login_bt">
      <div class="login_check form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">자동로그인</label>
        <a href="" class="find">비밀번호 찾기</a>
      </div>
    <div class="login_btn_wrap df fdc">
      <button class="primary_btn">로그인</button>
      <a class="secondary_btn join_btn" href="u_join.html">회원가입</a>
    </div>
    </div>
  </form>
</main>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>