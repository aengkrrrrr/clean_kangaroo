<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$cid = $_POST['cid'];

$coupon_name = $_POST['coupon_name'] ?? '';
$coupon_type = $_POST['coupon_type'] ?? '';
$coupon_price = $_POST['coupon_price'] ?? '';
$coupon_ratio = $_POST['coupon_ratio'] ?? '';
$status = $_POST['status'] ?? 1;

$max_date = $_POST['max_date'];
$dateTime = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $max_date)));

$userid = $_SESSION['AUID'];

//파일 사이즈 검사
if ($_FILES['coupon_image']['size'] > 10240000) {
    echo "<script>
      alert('10MB 이하만 업로드해주세요');
      history.back();
    </script>";
    exit;
  }
  //이미지 여부 검사
if (strpos($_FILES['coupon_image']['type'], 'image') === false) {
  echo "<script>
    alert('이미지만 업로드해주세요');
    history.back();
  </script>";
  exit;
}
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/upload/';
  $fiename = $_FILES["coupon_image"]["name"]; //insta.jpg
  $ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
  $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg
  
  if (move_uploaded_file($_FILES["coupon_image"]["tmp_name"], $save_dir . $savefile)) {
    $coupon_image = "/clean_kangaroo/admin/upload/" . $savefile;
  } else {
    echo "<script>
    alert('이미지 등록에 실패했습니다. 관리자에게 문의해주세요');
    history.back();
    </script>";
    exit;
  }

  $sql = "UPDATE coupons SET
    coupon_name='{$coupon_name}',
    coupon_image='{$coupon_image}',
    coupon_type='{$coupon_type}',
    coupon_price='{$coupon_price}',
    coupon_ratio='{$coupon_ratio}',
    status='{$status}',
    regdate=now(),
    userid='{$_SESSION['AUID']}',
    max_date='{$dateTime}'
    WHERE cid = {$cid}";

  $mysqli->query($sql);

  if($mysqli->query($sql) === TRUE){
    echo "<script>
    alert('쿠폰수정 완료');
    location.href = '/clean_kangaroo/admin/coupon/coupon_list.php';
    </script>";
} else{
    echo "<script>
    alert('쿠폰수정 실패');
    // history.back();
    </script>";
}