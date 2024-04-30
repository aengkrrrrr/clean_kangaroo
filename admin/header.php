<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="/clean_kangaroo/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/clean_kangaroo/css/common.css">

      <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <?= $css1 ?? ''?>
    <?= $css2 ?? ''?>

    <title><?= $title ?? ''; ?> | Deep Learning Kangaroo</title>
  </head>

  <header id="header">
    <div class="hd_container">
      <h1 class="logo"><img src="/clean_kangaroo/images/admin_header_logo.png" alt=""></h1>
        <ul class="gnb_wrap df">
          <li><a href="" class="body1b">강좌 관리</a></li>
          <li><a href="" class="body1b">게시판 관리</a></li>
          <li class="active"><a href="" class="body1b">회원 관리</a></li>
          <li><a href="" class="body1b">쿠폰 관리</a></li>
          <li><a href="" class="body1b">매출 관리</a></li>
        </ul>
      </nav>
      <button class="logout_btn primary_btn">로그아웃</button>
    </div>
    <!-- 메인 타이틀 -->
    <div class="common_main_tit">
      <div class="admin_wrap df aic">
        <a href="#" class="bell">
          <img src="/clean_kangaroo/images/bell_Vector.png" alt="">
          <span class="qna_quantity">5</span>
        </a>
        <span class="kang"><img src="/clean_kangaroo/images/popup_kang_btn.png" alt=""></span>
        <span>깨끗한 아기 캥거루</span>
      </div>
      <h4 class="body1b"><?= $title ?? ''; ?></h4>
    </div>
    <!------------ 메인 타이틀 -->
  </header>