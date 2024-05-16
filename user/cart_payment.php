<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';


  $pid = $_POST['pid'];
  $cartid = $_POST['cartid'];
  $userid = $_POST['userid'];
  $total = $_POST['total'];

  // if($total_price == $discount_price){
  //   $discount_status = 0;
  // } else{
  //   $discount_status = 1;
  // }

  // $i=0;
  
  foreach($cartid as $ctid){
    $sql = "SELECT c.cid,c.name,c.cate FROM cart ct
            JOIN courses c ON c.cid = ct.cid
            WHERE ct.cartid = $ctid";
    $result = $mysqli->query($sql);
    $course = $result->fetch_object();

    $sql2 = "INSERT into payment
        (cid,catename,userid,name,total_price,discount_price,discount_status) values
        ({$course->cid},'{$catename}','{$userid}','{$course->name}',{$total_price},{$discount_price},{$discount_status})
    ";
    $result2 = $mysqli -> query($sql2);

    if($result2 === true){ // INSERT가 성공한 경우
    $return_data = array("result" => "success");
  } else { // INSERT가 실패한 경우
    $return_data = array("result" => "error", "message" => $mysqli->error);
  }
  $i++;

    //구매한 상품 삭제
    $sql3 = "DELETE from cart where cartid=$ctid";
    $result3 = $mysqli->query($sql3);

    // if($cpid !== ''){
    //   //사용 쿠폰 삭제
    //   $sql4 = "UPDATE user_coupon SET uc_status = 0 where cpid=$cpid and userid='{$userid}'";
    //   $result4 = $mysqli -> query($sql4);
    // }
}
  echo json_encode($result);
  exit;

?>