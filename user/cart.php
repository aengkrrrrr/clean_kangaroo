<?php
$title='장바구니';
$css1 =' <link rel="stylesheet" href="./css/cart.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
<main class="usergrid">
  <div class="my_cart">
    <h2 class="h2">장바구니</h2>
    <div class="select df aic">
      <div class="form-floating">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">전체선택</label>
      </div>
      <div class="num df">
        <span>0개</span>
        <span class="total_num">총 0개</span>
      </div>
      <button class="delete_btn">선택 삭제</button>
    </div>
    <div class="cart_ct_none df fdc jcc aic hidden">
      <img src="/images/cart_kang.png" alt="">
      <strong class="body1b">장바구니에 담긴 강의가 없습니다.</strong>
      <a href="" class="primary_btn">홈으로 이동</a>
    </div>
    <div class="cart_ct df">
      <input class="form-check-input" type="checkbox" value="" name="cart" id="cart">
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
    <div class="cart_ct df">
      <input class="form-check-input" type="checkbox" value="" name="cart" id="cart">
      <img src="/images/cart_img02.png" alt="">
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
    <div class="cart_ct df">
      <input class="form-check-input" type="checkbox" value="" name="cart" id="cart">
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
    <div class="cart_ct df">
      <input class="form-check-input" type="checkbox" value="" name="cart" id="cart">
      <img src="/images/cart_img02.png" alt="">
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
    <div class="pay_wrap">
      <h3 class="body1b">결제정보</h3>
      <div class="select_wrap">
        <label for="" class="body3">쿠폰선택</label>
        <select class="form-select" aria-label="" id="" name="">
          <option selected>사용가능한 쿠폰</option>
          <option>이벤트 쿠폰</option>
          <option>회원가입 쿠폰</option>
        </select>
      </div>
      <div class="cart_price df">
        <span class="body3">상품 금액 :</span>
        <span class="body3">0 원</span>
      </div>
      <div class="cart_sale df">
        <span class="body3">할인 금액 :</span>
        <span class="body3">0 원</span>
      </div>
      <div class="cart_total df">
        <strong class="body2b">총 결제 금액 :</strong>
        <strong class="body2b">0 원</strong>
      </div>
      <button class="secondary_btn pay">구매하기</button>
    </div>
  </div>
</main>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>