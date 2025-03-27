<?php
$title = '홈';
$css1 = ' <link rel="stylesheet" href="/clean_kangaroo/user/css/u_main.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

// 공지사항 
$sql = "SELECT * from notice_board order by idx desc limit 0,9"; //3개만보이게
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}
/////////// 공지사항 


//강좌소개 sql 쿼리

$lec_sql1 = "SELECT * FROM products WHERE cate LIKE 'A0001%'";
$result1 = $mysqli->query($lec_sql1);
while ($rsl1 = $result1->fetch_object()) {
  $rsArr1[] = $rsl1;
}

$lec_sql2 = "SELECT * FROM products where cate LIKE 'B0001%'";
$result2 = $mysqli->query($lec_sql2);
while ($rsl2 = $result2->fetch_object()) {
  $rsArr2[] = $rsl2;
}

$lec_sql3 = "SELECT * FROM products where cate LIKE 'C0001%'";
$result3 = $mysqli->query($lec_sql3);
while ($rsl3 = $result3->fetch_object()) {
  $rsArr3[] = $rsl3;
}

$lec_sql4 = "SELECT * FROM products where cate LIKE 'D0001%'";
$result4 = $mysqli->query($lec_sql4);
while ($rsl4 = $result4->fetch_object()) {
  $rsArr4[] = $rsl4;
}


// 리뷰


$sqlrb = "SELECT p.*,rb.* FROM review_board rb
JOIN products p ON p.pid = rb.pid
ORDER BY rb.idx DESC";

$resultrb = $mysqli->query($sqlrb);
while ($rs = $resultrb->fetch_object()) {
  $rbArr[] = $rs;
}


?>
<main>
  <!-- 메인배너 - 다영 -->
  <section class="main_banner">
    <ul class="user_banner">
      <li><img src="/clean_kangaroo//images/user_main_banner1.png" alt=""></li>
      <li><img src="/clean_kangaroo//images/user_main_banner2.png" alt=""></li>
      <li><img src="/clean_kangaroo//images/user_main_banner3.png" alt=""></li>
    </ul>
    <div class="main_count ">
      <ul class="user_count df usergrid">
        <li class="user_count_title df">
          <img src="/clean_kangaroo//images/user_main_count.png" alt="">
          <div>
            <p class="body2b">[캥거루 패밀리 세일]</p>
            <p class="body2b">구독 할인 중!</p>
          </div>
        </li>
        <li>
          <div class="countdown">
            <span class="card_title mb-4">
              <span data-date="6/28/2025"></span>
            </span>
            <div class="timer">
              <span id="days" class="value text-warning h4">00</span>
              <span class="text-warning h4">일</span>
              <span id="hours" class="value text-warning h4">00</span>
              <span class="text-warning h4">:</span>
              <span id="minutes" class="value text-warning h4">00</span>
              <span class="text-warning h4">:</span>
              <span id="seconds" class="value text-warning h4">00</span>
              <span class="text-warning h4">남음</span>
            </div>
          </div>
        </li>
        <li class="user_count_btn">
          <a href="" class="body2b">지금 혜택 받기</a>
        </li>
      </ul>
    </div>
  </section>
  <!----------- 메인배너 - 다영 -->

  <!-- 강좌소개 - 선진 -->
  <section class="main_lecture">
    <h2>강좌소개</h2>
    <div class="lec df">
      <div class="lec_cate active"><a href="#tab1">웹/편집/인테리어</a></div>
      <div class="lec_cate"><a href="#tab2">웹 개발</a></div>
      <div class="lec_cate"><a href="#tab3">CG/모션그래픽</a></div>
      <div class="lec_cate"><a href="#tab4">게임/웹툰</a></div>
    </div>
    <div class="lec_wrapper df">
      <div class="con active" id="tab1">
        <div class="lec_container">
          <?php
          if (isset($rsArr1) && !empty($rsArr1)) {
            foreach ($rsArr1 as $rsl1) {
          ?>
              <ul>
                <li><a href="u_lecture_view.php?pid=<?= $rsl1->pid; ?>">
                    <img src="<?= $rsl1->thumbnail; ?>" alt=""></a></li>
                <li><a href="u_lecture_view.php?pid=<?= $rsl1->pid; ?>"><?= $rsl1->title; ?></a></li>
              </ul>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="con" id="tab2">
        <div class="lec_container">
          <?php
          if (isset($rsArr2) && !empty($rsArr2)) {
            foreach ($rsArr2 as $rsl2) {
          ?>
              <ul>
                <li><a href="u_lecture_view.php?pid=<?= $rsl2->pid; ?>">
                    <img src="<?= $rsl2->thumbnail; ?>" alt=""></a></li>
                <li><a href="u_lecture_view.php?pid=<?= $rsl2->pid; ?>"><?= $rsl2->title; ?></a></li>
              </ul>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="con" id="tab3">
        <div class="lec_container">
          <?php
          if (isset($rsArr3) && !empty($rsArr3)) {
            foreach ($rsArr3 as $rsl3) {
          ?>
              <ul>
                <li><a href="u_lecture_view.php?pid=<?= $rsl3->pid; ?>">
                    <img src="<?= $rsl3->thumbnail; ?>" alt=""></a></li>
                <li><a href="u_lecture_view.php?pid=<?= $rsl3->pid; ?>"><?= $rsl3->title; ?></a></li>
              </ul>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="con" id="tab4">
        <div class="lec_container">
          <?php
          if (isset($rsArr4) && !empty($rsArr4)) {
            foreach ($rsArr4 as $rsl4) {
          ?>
              <ul>
                <li><a href="u_lecture_view.php?pid=<?= $rsl4->pid; ?>">
                    <img src="<?= $rsl4->thumbnail; ?>" alt=""></a></li>
                <li><a href="u_lecture_view.php?pid=<?= $rsl4->pid; ?>"><?= $rsl4->title; ?></a></li>
              </ul>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!----------- 강좌소개 - 선진 -->

  <!-- 공지사항 - 송림 -->
  <section class="main_notice">
    <h2>공지사항</h2>
    <div class="notice_wrap">
      <?php
      for ($i = 0; $i <= 6; $i += 3) {
      ?>
        <ul class="notice df fdc">
          <?php
          if (isset($rsArr)) {
            $newArr = array_slice($rsArr, $i, 3);
            foreach ($newArr as $ra) {
          ?>
              <li class="notice_table df aic">
                <a href="" class="notice_tit"><?= $ra->title; ?></a>
                <a href="" class="notice_ct"><?= $ra->contents; ?></a>
                <a href=""><span class="material-symbols-outlined"> east</span></a>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      <?php
      }
      ?>
      </ul>

    </div>
    <div class="controls">
      <span class="prev"></span>
      <span class="next"></span>
    </div>
  </section>
  <!----------- 공지사항 - 송림 -->

  <!-- 수강평 - 다영 -->
  <section class="main_review">
    <div class="usergrid">
      <h2>student review</h2>
      <ul class="df main_review_list">
      <?php
      if (isset($rbArr)) {
      foreach ($rbArr as $rview) {
    ?>
      <li class="user_profile">
        <div class="df user_review_img">
          <img src="/clean_kangaroo/images/user_profile1.png" alt="">
          <p>
            <span class="body2b"><?= $rview->userid?></span><br>
            <span class="body4"><?=$rview->title?></span>
          </p>
        </div>
        <p class="body3"><?= $rview->content; ?></p>
      </li>
      <?php
          }
        }
      ?>
      </ul>
      <a href="u_review_list.php" class="primary_btn">후기 더 보러가기</a>
    </div>
  </section>
  <!----------- 수강평 - 다영 -->

  <!-- 이벤트 - 다영 -->
  <section class="main_event usergrid df">
    <div class="user_e_title">
      <h2>EVENT</h2>
      <p class="body2b">딥러닝캥거루에서 진행하는 다양한 이벤트를 확인하고 참여해보세요!</p>
      <a href="u_event_list.php" class="user_e_link">더 보기</a>
      <span class="slider_next"></span>
    </div>
    <ul class="user_e_slide">
      <li>
        <a href="">
          <img src="/clean_kangaroo/images/user_main_eventbanner1.png" alt="">
          <p class="body2b">특가 이벤트</p>
        </a>
      </li>
      <li>
        <a href="">
          <img src="/clean_kangaroo/images/user_main_eventbanner2.png" alt="">
          <p class="body2b">이 달의 쿠폰들 받아가세요!</p>
        </a>
      </li>
      <li>
        <a href="">
          <img src="/clean_kangaroo/images/user_main_eventbanner3.png" alt="">
          <p class="body2b">생일 축하 이벤트</p>
        </a>
      </li>
      <li>
        <a href="">
          <img src="/clean_kangaroo/images/user_main_eventbanner4.png" alt="">
          <p class="body2b">적립금 이벤트</p>
        </a>
      </li>
    </ul>
  </section>
  <!----------- 이벤트 - 다영 -->

</main>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';

?>