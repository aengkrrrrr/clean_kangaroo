<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$userid= $_POST['userid'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['passwd'];
$password = hash('sha512', $pass);

$sql = "INSERT INTO members (userid,username,email,passwd) VALUES('{$userid}','{$username}','{$email}','{$password}')";
if($mysqli->query($sql) === true) {
  echo "
  <script>
    alert('회원가입을 축하드립니다.');
    location.href = 'index.php';
  </script>
  ";
} else {
  echo "
  <script>
    alert('회원가입 실패, 관리자에게 문의하세요.');
    history.back();
  </script>
  ";
}
?>