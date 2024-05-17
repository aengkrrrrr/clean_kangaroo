<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';


  // $pid = $_POST['pid'];
  $cartid = $_POST['cartid'];
  $userid = $_POST['userid'];
  $total = $_POST['total'];

    $sql = "INSERT into payment
        (cartid,userid,total) values
        ('{$cartid}','{$userid}',{$total})
    ";
    $result = $mysqli -> query($sql);

    if($result === true){ // INSERT가 성공한 경우
    $return_data = array("result" => "success");
  } else { // INSERT가 실패한 경우
    $return_data = array("result" => "error", "message" => $mysqli->error);
  }

    //구매한 상품 삭제
    $sql2 = "DELETE from cart where cartid=$cartid";
    $result2 = $mysqli->query($sql2);

    // if($cpid !== ''){
    //   //사용 쿠폰 삭제
    //   $sql4 = "UPDATE user_coupon SET uc_status = 0 where cpid=$cpid and userid='{$userid}'";
    //   $result4 = $mysqli -> query($sql4);
    // }
  echo json_encode($result);
  exit;

?>