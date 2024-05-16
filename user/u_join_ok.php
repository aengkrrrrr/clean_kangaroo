<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/coupon_func.php';

$userid= $_POST['userid'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['passwd'];
$password = hash('sha512', $pass);

$sql = "INSERT INTO members (userid,username,email,passwd) VALUES('{$userid}','{$username}','{$email}','{$password}')";
$result = $mysqli -> query($sql);
if($mysqli->query($sql) === true){
    //회원가입 축하 쿠폰 발행
    issue_coupon($mysqli, $userid, 38, '회원가입');
}
?>