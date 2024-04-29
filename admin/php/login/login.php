<?php
session_start();

//관리자 검사
if (isset($_SESSION['AUID'])) {
  echo "<script>
    alert('이미 로그인되어 있습니다.');
    location.href='/clean_kangaroo/admin/dashboard.html';
  </script>";
}
?>
