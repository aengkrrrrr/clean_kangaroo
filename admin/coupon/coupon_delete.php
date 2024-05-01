<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

<<<<<<< HEAD
  $pid = $_POST['cid'];
  $sql = "DELETE FROM coupons WHERE cid = {$pid}";
=======
  $cid = $_GET['cid'];
  $sql = "DELETE FROM coupons WHERE cid = {$cid}";
>>>>>>> 35f09f3ca272558a689d3ab79acbeb34f5ee1638
  $result = $mysqli -> query($sql);

  if($mysqli->query($sql) === true){
    echo "<script>
    alert('삭제성공');
    location.href='/clean_kangaroo/admin/coupon/coupon_list.php';
    </script>";
  };
  
  $script1 = '<script src="../../js/coupon.js"></script>';
?>