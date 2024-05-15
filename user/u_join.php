<?php
$title='홈';
$css1 =' <link rel="stylesheet" href="./css/u_login.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
<main class="usergrid">
  <form class="user_login_wrap df fdc" action="u_join_ok.php" method="POST">
    <div  class="login_top">
    <img src="../images/admin_header_logo.png" alt="">
      <strong class="body3b">쉽고 빠르게 달리자,<br>
        딥러닝 캥거루</strong>
    </div>
    <div class="login_mid">
      <div class="form-floating mb-3 df aic">
        <input type="text" name="userid" class="form-control name" id="userid" required>
        <label for="userid">아이디</label>
        <button type="button" class="primary_btn check">중복</button>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="username" class="form-control" id="username" required>
        <label for="username">이름</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email"  name="email" class="form-control" id="email" placeholder="name@example.com" required>
        <label for="email">이메일</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password"  name="passwd" class="form-control" id="passwd" required>
        <label for="passwd">비밀번호</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="passwd_check" class="form-control" id="passwd_check" required>
        <label for="passwd_check">비밀번호 확인</label>
      </div>
    </div>
    <div class="login_bt">
      <div class="login_check form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">서비스 이용 약관 동의(필수)</label>
      
      
      </div>
    <div class="login_btn_wrap df fdc">
      <button class="primary_btn">회원가입하기</button>
    </div>
    </div>
  </form>
</main>



<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>