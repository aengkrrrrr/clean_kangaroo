<?php

//유저 로그인 검사
if (!isset($_SESSION['UID'])) {
  echo "<script>
    alert('로그인을 해주세요.');
    location.href='/clean_kangaroo/user/u_login.php';
  </script>";
}