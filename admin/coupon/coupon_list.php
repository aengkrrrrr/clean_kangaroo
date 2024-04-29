<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/php/header.php';
?>

  <!-- 헤더 -->
<header id="header">
  <div class="hd_container">
    <h1 class="logo"><a href="#" class="hidden">메인로고</a></h1>
    <nav>
      <ul class="gnb_wrap df">
        <li><a href="" class="body1b">강좌 관리</a></li>
        <li><a href="" class="body1b">게시판 관리</a></li>
        <li><a href="" class="body1b">회원 관리</a></li>
        <li class="active"><a href="" class="body1b">쿠폰 관리</a></li>
        <li><a href="" class="body1b">매출 관리</a></li>
      </ul>
    </nav>
    <button class="logout_btn primary_btn">로그아웃</button>
  </div>
  <!-- 메인 타이틀 -->
  <div class="common_main_tit">
    <div class="admin_wrap df aic">
      <a href="#" class="bell">
        <img src="/admin/images/bell_Vector.png" alt="">
        <span class="qna_quantity">5</span>
      </a>
      <span class="kang"><img src="/admin/images/popup_kang_btn.png" alt=""></span>
      <span>깨끗한 아기 캥거루</span>
    </div>
    <h4 class="body1b">쿠폰 관리</h4>
  </div>
  <!------------ 메인 타이틀 -->
</header>
  <!----------- 헤더 -->


  <div class="grid">
    <div class="totalcp">
      <p>전체 등록 쿠폰리스트  총 n개의 쿠폰이 등록되어 있습니다.</p>
    </div>
    <div class="board_container">
        <div class="board_category df">
          <div class="select_wrap">
            <select class="form-select" aria-label="" id="" name="">
              <option selected>사용중</option>
              <option>보류중</option>
            </select>
          </div>
          <div class="search_wrap df">
            <input class="form-control search" type="text" id="search_keyword" name="keyword">
            <button class="primary_btn">검색</button>
          </div>
        </div>
      <hr>  
      <form action="">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">쿠폰이미지</th>
              <th scope="col">쿠폰명</th>
              <th scope="col">행사기간</th>
              <th scope="col">종류</th>
              <th scope="col">할인금액(률)</th>
              <th scope="col">조건</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td><img src="/admin/images/test_coupon.png" alt=""></td>
            <td>회원가입 쿠폰</td>
            <td>2024.04.22 <br>- 2024.05.22</td>
            <td>사용중</td>
            <td>10%</td>
            <td>10,000원</td>
            <td class="couponSvg">
              <a href="coupon_edit.html"><img src="/admin/images/edit.svg" alt=""></a>
              <a href=""><img src="/admin/images/delete.svg" alt=""></a>
            </td>
          </tr>
          </tbody>
        </table>
      </form>
      
  </div>
  </div>
  <!--공통 pagination-->
  <div class="nav_wrap df aic">
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
  <!------------- 공통 pagination-->
    <a href="coupon_up.html" class="primary_btn">쿠폰 등록</a>
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/php/footer.php';
?>