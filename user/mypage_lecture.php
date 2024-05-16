<?php
$title='마이페이지_내 강의실';
$css1 ='<link rel="stylesheet" href="css/cart.css">';
$css2 ='<link rel="stylesheet" href="css/mypage.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

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
      <div class="cart_ct df">
        <img src="/images/cart_img01.png" alt="">
        <div class="cart_lec_ct">
          <h3 class="body3b">Figma 기초 강의</h3>
          <p class="body4">Figma의 기본툴부터 활용법까지<br> 
            A부터 Z까지 차근차근 배워나가는 기초 강의입니다.</p>
          <div class="lec_time df aic">
            <span class="material-symbols-outlined">description</span>
            <span class="body4">수강기간</span>
            <span class="body4 month">2개월</span>
            <strong class="cart_lec_price body1b">200,000원</strong>
          </div>
        </div>
      </div>
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