<?php
$title='홈';
$css1 =' <link rel="stylesheet" href="./css/u_login.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
<main class="usergrid">
  <form class="user_login_wrap df fdc signup_form" action="u_join_ok.php" method="POST">
    <div  class="login_top">
    <img src="../images/admin_header_logo.png" alt="">
      <strong class="body3b">쉽고 빠르게 달리자,<br>
        딥러닝 캥거루</strong>
    </div>
    <div class="login_mid">
      <div class="form-floating mb-3 df aic">
        <input type="text" name="userid" class="form-control userid" id="userid" required>
        <label for="userid">아이디</label>
        <div class="invalid-feedback">사용불가한 아이디입니다. </div>
        <div class="valid-feedback">사용가능한 아이디입니다.</div>
        <button type="button" class="primary_btn check_btn">중복</button>
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="username" class="form-control" id="username" required>
        <label for="username">이름</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email"  name="email" class="form-control" id="email" required>
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
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">서비스 이용 약관 동의(필수)</label>
      
      
      </div>
    <div class="login_btn_wrap df fdc">
      <button class="primary_btn">회원가입하기</button>
    </div>
    </div>
  </form>
</main>


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>

  //아이디 중복확인
  $userid = $('.userid');
  $('.login_mid .check_btn').click(function (e) {
    e.preventDefault();
    let userid = $userid.val();
    let data = {
      userid: userid,
    }

    $.ajax({
      async: false,
      type: 'POST',
      url: 'u_join_validate.php',
      data: data,
      dataType: 'json',
      error: function (error) {
        console.log(error);
      },
      success: function (return_data) {
        if (return_data.cnt > 0) {
          $userid.removeClass('is-valid');
          $userid.addClass('is-invalid');
          return false;
        }
        else {
          $userid.removeClass('is-invalid');
          $userid.addClass('is-valid');
        }
      }
    })
  });

  //모든 체크박스 체크여부 확인 및 인풋 빈값 확인 
  $(".signup_form").submit(function (e) {
    let checkboxes = $("input[type='checkbox']");
    let checkedCheckboxes = checkboxes.filter(":checked");


    if (checkboxes.length !== checkedCheckboxes.length) {
      alert("모든 약관에 동의해주세요!");
      e.preventDefault(); // 회원가입 전송 불가
    }


  });

</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>