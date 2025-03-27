<?php
session_start();
$title = "쿠폰 수정";
$css1 = '<link rel="stylesheet" href="../../css/coupon.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/header.php';


$cid = $_GET['cid'];
$sql = "SELECT * FROM coupons WHERE cid = {$cid}";
$result = $mysqli -> query($sql);
$rs = $result->fetch_object();


?>


<body>
  <div class="container grid">
    <form action="coupon_edit_ok.php" class="coupon_wrap" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="cid" value="<?= $cid ?>">
      <div class="coupon_1 d-flex">
        <div class="couponimg">
          <div class="field">
            <input type="file" id="coupon_image" name="coupon_image" accept="image/*" required>
            <div class="preview"><img src="<?= $rs -> coupon_image?>" alt=""><?= $rs -> coupon_image?></div>
          </div>
        </div>
        <div class="coupon_area">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="coupon_name"><?= $rs -> coupon_name?></textarea>
            <label for="floatingTextarea">쿠폰명</label>
          </div>
          <div class="form-floating">
            <p>쿠폰 적용 기간</p>
            <div class="d-flex cDates">
              <input type="text" name="max_date" id="max_date" class="couponC" value="<?= $rs -> max_date?>">
              <select class="form-select" name="coupon_type" id="coupon_type" aria-label="쿠폰타입">
                <option value="0" selected name="cate1">사용중</option>
                <option value="1" name="cate2">보류중</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="coupon_2 d-flex">
        <div class="input-group c2form">
          <div class="form-floating">
            <input type="text" name="coupon_ratio" class="form-control" aria-label="coupon service" placeholder="쿠폰 혜택" id="coupon_ratio" value="<?= $rs -> coupon_ratio?>" required>
            <label for="floatingInputGroup1">쿠폰 혜택</label>
          </div>
          <span class="input-group-text">%</span>
        </div>
        <div class="input-group c2form">
          <div class="form-floating">
            <input type="text" class="form-control" aria-label="coupon sale" placeholder="쿠폰 사용조건" name="coupon_price" id="coupon_price" value="<?= $rs -> coupon_price?>">
            <label for="floatingInputGroup1">쿠폰 사용조건</label>
          </div>
          <span class="input-group-text">원</span>
        </div>
      </div>
      <button class="primary_btn couponbtn">수정</button>
      <a href="../coupon/coupon_list.php" class="basic_btn couponbtn">취소</a>
    </form>          
  </div>
  
  <script>
  //header 메뉴 액티브
  document.addEventListener('DOMContentLoaded',function(){
  const title = "<?php if(isset($menutitle)){ echo $menutitle;} else{echo $title;}  ?>";


  console.log(title);
  const headerMenu = document.querySelectorAll('#header .gnb_wrap li');
  for(let menu of headerMenu){
    menu.classList.remove('active');
    if(menu.innerText === title){
      menu.classList.add('active');
    }
  }
});

<?php
$script1 = '<script src="../../js/coupon.js"></script>';
$script2 = '<script src="https://code.jquery.com/jquery-3.6.0.js"></script>';
$script3 = '<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/footer.php';
?>