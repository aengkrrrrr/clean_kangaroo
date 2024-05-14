<?php
$title='마이페이지_내 강의실';
$css1 ='<link rel="stylesheet" href="css/cart.css">';
$css2 ='<link rel="stylesheet" href="css/mypage.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

?>

  <header id="u_header">
    <div class="header_container df aic">
       <h1 class="u_logo">
         <a href="index.html">
           <img src="/images/admin_header_logo.png" alt="">
         </a>
       </h1>
       <nav class="u_gnb_wrap">
         <ul class="u_gnb df">
           <li><a href="" class="body3b">웹디자인/편집</a></li>
           <li><a href="" class="body3b">웹개발</a></li>
           <li><a href="" class="body3b">CG/모션그래픽</a></li>
           <li><a href="" class="body3b">게임/웹툰</a></li>
           <li><a href="" class="body3b">수강평</a></li>
           <li><a href="" class="body3b">Q&A</a></li>
           <li><a href="" class="body3b">공지사항</a></li>
         </ul>
       </nav>
       <div class="util_wrap df aic">
         <a href="" class="u_search"><span class="material-symbols-outlined">search</span></a>
         <a href="cart.html" class="cart">
          <span class="material-symbols-outlined">shopping_cart</span>
          <span class="cart_quantity">1</span>
        </a>
         <a href="u_login.html">로그인</a>
       </div>
    </div>
    <div class="search_area">
      <div class="search_wrap df aic">
        <input class="form-control search" type="text" id="search_keyword" name="keyword" placeholder="관심주제, 강의, 포트폴리오 찾기">
        <a href="" class="u_search"><span class="material-symbols-outlined">search</span></a>
      </div>
      <div class="best_wrap">
        <span class="body3b">지금 인기있는 BEST</span>
        <ol class="best_lec df">
          <li class="body2"><strong class="body1b">1</strong>웹 퍼블리셔 기초</li>
          <li class="body2"><strong class="body1b">2</strong>JAVA</li>
          <li class="body2"><strong class="body1b">3</strong>웹툰 그리기 기초</li>
          <li class="body2"><strong class="body1b">4</strong>건축 디자인</li>
        </ol>
        <ol class="best_lec df">
          <li class="body2"><strong class="body1b">5</strong>포토샵/GTQ</li>
          <li class="body2"><strong class="body1b">6</strong>일러스트레이터</li>
          <li class="body2"><strong class="body1b">7</strong>웹 디자인 기초</li>
          <li class="body2"><strong class="body1b">8</strong>3D 랜더링</li>
        </ol>
      </div>
    </div>
  </header>
<!------- 사용자 헤더 -->
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
      <div class="cart_ct df">
        <img src="/images/my_coupon.png" alt="">
        <div class="cart_coupon">
          <h3 class="body3b">회원가입 축하 쿠폰</h3>
          <div class="coupon_ct df aic">
            <span class="body3">사용기간 : </span>
            <span class="body3">2024-05-10</span>
          </div>
          <div class="coupon_ct df aic">
            <span class="body3">최소사용금액 : </span>
            <span class="body3">20,000원</span>
          </div>
          <span class="body3">할인액 : 5,000원</span>
        </div>
      </div>
      <div class="cart_ct df">
        <img src="/images/my_coupon.png" alt="">
        <div class="cart_coupon">
          <h3 class="body3b">회원가입 축하 쿠폰</h3>
          <div class="coupon_ct df aic">
            <span class="body3">사용기간 : </span>
            <span class="body3">2024-05-10</span>
          </div>
          <div class="coupon_ct df aic">
            <span class="body3">최소사용금액 : </span>
            <span class="body3">20,000원</span>
          </div>
          <span class="body3">할인액 : 5,000원</span>
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