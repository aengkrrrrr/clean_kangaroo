<?php
$title='마이페이지_내 강의실';
$css1 ='<link rel="stylesheet" href="css/cart.css">';
$css2 ='<link rel="stylesheet" href="css/mypage.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

  $userid = $_SESSION['UID'];//유저아이디
  //coupon 조회
  $sqlcp = "SELECT c.* FROM user_coupons uc
          JOIN coupons c ON c.cid = uc.couponid
          WHERE uc.userid = '{$userid}'
          ORDER BY uc.couponid DESC";
  
  // echo $sqlcp;
  $result = $mysqli-> query($sqlcp);
  while($rs = $result->fetch_object()){
    $rsccp[]=$rs;
  }


?>

<main class="usergrid">
  <div class="mypage_wrap df">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/mypage_common.php';?>
    <div class="my_coupon">
      <h2 class="body1b">내 쿠폰함</h3>
        <div class="coupon_search_wrap">
          <input class="form-control search" type="text" id="search_keyword" name="keyword">
          <button>
            <span class="material-symbols-outlined">
              search
            </span>
          </button>
        </div>
          <?php
            if (isset($rsccp)) {
            foreach ($rsccp as $cp) {
          ?>
      <div class="cart_ct df">
        <img src="<?=$cp->coupon_image?>" alt="">
        <div class="cart_coupon">
          <h3 class="body3b"><?=$cp->coupon_name?></h3>
          <div class="coupon_ct df aic">
            <span class="body3">사용기간 : </span>
            <span class="body3"><?=$cp->max_date?></span>
          </div>
          <div class="coupon_ct df aic">
            <span class="body3">최소사용금액 : </span>
            <span class="body3"><?=$cp->coupon_price?>원</span>
          </div>
          <span class="body3">할인액 : <?=$cp->coupon_ratio?>%</span>
        </div>
      </div>
        <?php
            }
          }
        ?>
    </div>
  </div>
  <div class="nav_wrap mypage_pager">
    <nav aria-label="">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link">&laquo;</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">&raquo;</a>
        </li>
      </ul>
    </nav>
  </div>
</main>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>