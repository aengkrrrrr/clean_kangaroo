<?php
session_start();
$title = "쿠폰 등록";
$css1 = '<link rel="stylesheet" href="../../css/coupon.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';

?>

<body>
  <div class="container grid">
    <form action="coupon_up.php" class="coupon_wrap" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="cid">
      <div class="coupon_1 d-flex">
        <div class="couponimg">
          <div class="field">
            <input type="file" id="profile" name="profile" accept="image/*" required>
            <div class="preview"></div>
          </div>
        </div>
        <div class="coupon_area">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">쿠폰명</label>
          </div>
          <div class="form-floating">
            <p>쿠폰 적용 기간</p>
            <div class="d-flex cDates">
              <input type="text" name="cdatepicker1" id="cdatepicker1" class="couponC">
              <input type="text" name="cdatepicker2" id="cdatepicker2" class="couponC">
            </div>
          </div>
        </div>
      </div>
      <div class="coupon_2 d-flex">
        <div class="form-floating">
          <select class="form-select" name="coupon_type" id="coupon_type" aria-label="쿠폰타입">
            <option value="0" selected name="cate1">사용중</option>
            <option value="1" name="cate2">보류중</option>
          </select>
          <label for="coupon_type">종류</label>
        </div>
        <div class="input-group c2form">
          <div class="form-floating">
            <input type="text" name="max_value" class="form-control" aria-label="coupon service" placeholder="쿠폰 혜택" id="max_value" required>
            <label for="floatingInputGroup1">쿠폰 혜택</label>
          </div>
          <span class="input-group-text">%</span>
        </div>
        <div class="input-group c2form">
          <div class="form-floating">
            <input type="text" class="form-control" aria-label="coupon sale" placeholder="쿠폰 사용조건">
            <label for="floatingInputGroup1">쿠폰 사용조건</label>
          </div>
          <span class="input-group-text">원</span>
        </div>
      </div>
      <button class="primary_btn couponbtn">등록</button>
      <a href="coupon_list.php" class="basic_btn couponbtn">취소</a>
    </form>          
  </div>


<?php
$script1 = '<script src="../../js/coupon.js"></script>';
$script2 = '<script src="https://code.jquery.com/jquery-3.6.0.js"></script>';
$script3 = '<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>