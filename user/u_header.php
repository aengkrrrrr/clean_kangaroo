<?php
$title = '';
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

// 대분류 조회
$step1sql = "SELECT * from product_category where step=1 " ;
$step1result = $mysqli->query($step1sql);
while ($step1rs = $step1result->fetch_object()) {
  $cate1Arr[] = $step1rs;
}

if (isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];
  // 장바구니 개수 조회
  $csql = "SELECT COUNT(*) AS cnt FROM cart WHERE userid='{$userid}';";
  $cresult = $mysqli->query($csql);
  $crow = $cresult->fetch_object();
}

//장바구니 항목 조회
if (isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];

  //cart item 조회
  $sqlct = "SELECT p.*,ct.* FROM cart ct
          JOIN products p ON p.pid = ct.pid
          WHERE ct.userid = '{$userid}'
          ORDER BY ct.cartid DESC";
  
  $resultct = $mysqli-> query($sqlct);
  while($rsct = $resultct->fetch_object()){
    $rscct[]=$rsct;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="../images/favicon.png" type="image/x-icon">

  <!-- datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="/clean_kangaroo/css/common.css">
  <link rel="stylesheet" href="/clean_kangaroo/user/css/u_common.css">
  <?= $css1 ?? '' ?>
  <?= $css2 ?? '' ?>
  <title> <?= $title ?? '' ?> | Deep Learning kangaroo</title>
</head>

<body class="u_body">
  <!-- 사용자 헤더 -->
  <header id="u_header">
    <div class="header_container df aic">
      <h1 class="u_logo">
        <a href="index.php">
          <img src="/clean_kangaroo/images/admin_header_logo.png" alt="">
        </a>
      </h1>
      <nav class="u_gnb_wrap">
        <ul class="u_gnb df">
          <?php
            if(isset($cate1Arr)){
              foreach($cate1Arr as $cate1){

          ?>
            <li><a href="/clean_kangaroo/user/u_lecture_list.php?pcode=<?= $cate1->code ?>&name=<?= $cate1->name ?>" class="body3b"><?= $cate1->name ?></a></li>
          <?php
              }
            }
          ?>
          <li><a href="u_review_list.php" class="body3b">수강평</a></li>
          <li><a href="u_qna_list.php" class="body3b">Q&A</a></li>
          <li><a href="u_notice_list.php" class="body3b">공지사항</a></li>
          <li><a href="u_event_list.php" class="body3b">이벤트</a></li>
        </ul>
      </nav>
      <div class="util_wrap df aic">
        <button class="u_search"><span class="material-symbols-outlined">search</span></button>
        <a href="cart.php" class="cart">
          <span class="material-symbols-outlined">shopping_cart</span>
          <?php
          if(isset($crow)){
          ?>
          <span class="cart_quantity"><?=$crow->cnt?></span>
          <?php
            }
          ?>
        </a>
        <?php
          if (!isset($_SESSION['UID'])) {
        ?>
            <a href="/clean_kangaroo/user/u_login.php">로그인</a>
        <?php
          } else {
        ?>
            <a href="/clean_kangaroo/user/mypage_lecture.php"><?=$_SESSION['UNAME']?>님</a>
        <?php
              }
          ?>
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
      <?php
        if (isset($rscct)) {
          foreach ($rscct as $ctItem) {
      ?>
      <div class="min_cart df">
        <img src="<?=$ctItem->thumbnail?>" alt="" class="min_cart_img">
        <p class="min_cart_ct">
          <a href="cart.php" class="min_cart_tit body4"><?=$ctItem->title?></a>
          <span class="min_cart_price body4"><?=$ctItem->price?> 원</span>
        </p>
      </div>
      <?php
        }
      }
      ?>
    </div>
  </header>
  <!------- 사용자 헤더 -->