<?php
$title='마이페이지_내 강의실';
$css1 ='<link rel="stylesheet" href="css/cart.css">';
$css2 ='<link rel="stylesheet" href="css/mypage.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

//구매내역 조회
if (isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];

  $paysql = "SELECT p.*,pm.* FROM payment pm
          JOIN products p ON p.pid = pm.pid
          WHERE pm.userid = '{$userid}'
          ORDER BY pm.pmid DESC";
  
  $payresult = $mysqli-> query($paysql);
  while($pay = $payresult->fetch_object()){
    $payarr[]=$pay;
  }
}


?>

<main class="usergrid">
  <div class="mypage_wrap df">

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/mypage_common.php';?>

    <div class="my_lecture">
      <h2 class="body1b">내 강의실</h3>
      <div class="lecture_search_wrap">
        <input class="form-control search" type="text" id="search_keyword" name="keyword">
        <button>
          <span class="material-symbols-outlined">
            search
          </span>
      </div>
        </button>
      <?php
        if (isset($payarr)) {
          foreach ($payarr as $pay) {
       ?>
      <div class="cart_ct df">
        <img src="/images/cart_img01.png" alt="">
        <div class="cart_lec_ct">
          <h3 class="body3b"><?=$pay->title?></h3>
          <p class="body4"><?=$pay->content?></p>
          <div class="lec_time df aic">
            <span class="material-symbols-outlined">description</span>
            <span class="body4">수강기간</span>
            <span class="body4 month">2개월</span>
            <strong class="cart_lec_price body1b"><?=$pay->price?> 원</strong>
          </div>
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