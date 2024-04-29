<?php

//관리자 검사
if (!isset($_SESSION['AUID'])) {
  echo "<script>
    alert('권한이 없습니다.');
    location.href='/clean_kangaroo/admin/login.html';
  </script>";
}
