<?php
session_start();
$title = "공지사항";
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

//테이블조회
$idx = $_GET['idx'];
$sql = "SELECT * FROM notice_board WHERE idx={$idx}";
$result = $mysqli->query($sql);
$row = $result->fetch_object();


// 조회수 업데이트
$hit = $row->hit + 1;
$sqlUpdate = "UPDATE notice_board SET hit={$hit} WHERE idx = {$idx}";
$mysqli->query($sqlUpdate);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="../images/favicon.png" type="image/x-icon">

  <!-- bxslider -->
  <link rel="stylesheet" href="./css/jquery.bxslider.min.css">

  <!-- datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/u_common.css">
  <link rel="stylesheet" href="./css/u_notice_qna.css">
  <title>Deep Learning kangaroo</title>
    </head>

<body class="u_body">
<!-- 사용자 헤더 -->
<header id="u_header">
  <div class="header_container df aic">
    <h1 class="u_logo">
      <a href="index.html">
        <img src="/images/admin_header_logo.png" alt="">
      </a>
    </h1>
    <nav class="u_gnb_wrap">
      <ul class="u_gnb df">
        <li><a href="u_leacture_list.html" class="body3b">웹디자인/편집</a></li>
        <li><a href="" class="body3b">웹개발</a></li>
        <li><a href="" class="body3b">CG/모션그래픽</a></li>
        <li><a href="" class="body3b">게임/웹툰</a></li>
        <li><a href="u_review_list.html" class="body3b">수강평</a></li>
        <li><a href="u_qna_list.html" class="body3b">Q&A</a></li>
        <li><a href="u_notice_list.html" class="body3b">공지사항</a></li>
        <li><a href="" class="body3b">이벤트</a></li>
      </ul>
    </nav>
    <div class="util_wrap df aic">
      <button class="u_search"><span class="material-symbols-outlined">search</span></button>
      <a href="cart.html" class="cart">
        <span class="material-symbols-outlined">shopping_cart</span>
        <span class="cart_quantity">1</span>
      </a>
      <a href="u_login.html">로그인</a>
    </div>
  </div>
  <div class="search_area">
    <form action="" class="search_wrap df aic" method="POST">
      <input class="form-control search" type="text" id="search_keyword" name="keyword" placeholder="관심주제, 강의, 포트폴리오 찾기">
      <button class="u_search"><span class="material-symbols-outlined">search</span></button>
    </form>
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
  <div class="min_cart_wrap">
    <div class="min_cart df">
      <img src="/images/cart_img01.png" alt="" class="min_cart_img">
      <p class="min_cart_ct">
          <a href="cart.html" class="min_cart_tit body4">Figma 기초 강의</a>
          <span class="min_cart_price body4">200,000원</span>
      </p>
    </div>
    <div class="min_cart df">
      <img src="/images/cart_img01.png" alt="" class="min_cart_img">
      <p class="min_cart_ct">
          <a href="cart.html" class="min_cart_tit body4">Figma 기초 강의</a>
          <span class="min_cart_price body4">200,000원</span>
      </p>
    </div>
    <div class="min_cart df">
      <img src="/images/cart_img01.png" alt="" class="min_cart_img">
      <p class="min_cart_ct">
          <a href="cart.html" class="min_cart_tit body4">Figma 기초 강의</a>
          <span class="min_cart_price body4">200,000원</span>
      </p>
    </div>
  </div>
</header>
<!------- 사용자 헤더 -->
    <div class="wrapper usergrid">
      <h3>공지사항</h3>
        <table class="u_notice table">
          <thead class="notice_viewhead">
            <tr>
              <th colspan="3" scope="col"><?= $row->title; ?></th>
              <th scope="col">작성일 : <?=$row ->date;?></th>
              <th scope="col">조회수 : <?=$row ->hit;?></th>
            </tr>
          </thead>
          <tbody class="notice_viewd">
            <tr>
              <td colspan="5" scope="col">
              <?=$row ->contents;?>
              <!-- <p>안녕하세요, 딥러닝캥거루 LMS 관리자입니다.</p>
                <p>9월 30일(수)부터 10월 2일(금)까지 추석 연휴 기간 고객센터 휴무 기간을 안내 드립니다.</p>
                <p>■ 휴무 기간 : 9.30 ~ 10.2</p>
                <p></p>
                <p>해당 기간에는 고객센터 휴무로 상담원과 직접 통화 할 수 없으며, ARS에 전화번호를 남겨주시면
                10월 5일(월)부터 접수 순서대로 답변 드리겠습니다.</p>
                <p></p>
                <p>홈페이지의 문의하기로 접수하시는 내용도 10월 5일(월)부터 접수 순서대로 답변 드리겠습니다.
                즐겁고 풍성한 한가위 보내시기 바랍니다.</p>
                <p></p>
                <p>감사합니다.</p></td> -->
            </tr> 
          </tbody>
        </table>
        <table>
          <tbody>  
            <tr>
              <td class="listbtn df" colspan="5" scope="col"><a href ="javascript:history.back();" class="primary_btn list">목록</a></td>
            </tr>     
        </tbody>
        </table>
    </div>
      <footer class="usergrid">
        <div class="df u_footer_wrap">
          <h2><a href="index.php">딥러닝캥거루</a></h2>
          <ul class="df">
            <li class="body3">딥러닝캥거루</li>
            <li class="body3">사업자번호 : 640-81-01354</li>
            <li class="body3">대표 : 깨끗한 아기 캥거루</li>
            <li class="body3">개인정보책임자 : 김동주</li>
            <li class="body3">제휴&마케팅 문의 : dlkang@create.co.kr</li>
            <li class="body3">Copyright © DEEP LEARNING KANGAROO. All Rights Reserved.</li>
          </ul>
          <p class="h4">대표전화<br><strong>1988-8782</strong></p>
        </div>
      </footer>
  </body>

  <script src="/js/common.js"></script>
  <!-- 스크립트 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


</html>