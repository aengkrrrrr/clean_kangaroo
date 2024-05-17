<?php
$title = '홈';
$css1 = ' <link rel="stylesheet" href="/clean_kangaroo/user/css/u_main.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

// 공지사항 
$sql = "select * from notice_board order by idx desc limit 0, 3"; //3개만보이게
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}
/////////// 공지사항 


//강좌소개 category쿼리
$catesql = "SELECT * FROM product_category where step = 1";
$category = $_GET['category'] ?? '';
$result = $mysqli->query($catesql);
while ($row = $result->fetch_object()) {
  $cate1[] = $row;
}

//강좌소개 sql 쿼리
$lec_sql1 = "SELECT * FROM products where cate = 'A0001'";
$result1 = $mysqli->query($lec_sql1);
while ($rsl1 = $result1->fetch_object()) {
  $rslArr1[] = $rsl1;
}

$lec_sql2 = "SELECT * FROM products where cate = 'B0001'";
$result2 = $mysqli->query($lec_sql2);
while ($rsl2 = $result2->fetch_object()) {
  $rslArr2[] = $rsl2;
}

$lec_sql3 = "SELECT * FROM products where cate = 'C0001'";
$result3 = $mysqli->query($lec_sql3);
while ($rsl3 = $result3->fetch_object()) {
  $rslArr3[] = $rsl3;
}

$lec_sql4 = "SELECT * FROM products where cate = 'D0001'";
$result4 = $mysqli->query($lec_sql4);
while ($rsl4 = $result4->fetch_object()) {
  $rslArr4[] = $rsl4;
}

// 리뷰

$rsql = "SELECT * FROM review_board where 1=1";
$order = " order by name desc";

$result = $mysqli->query($rsql);
while ($rrs = $result->fetch_object()) {
  $rrsArr[] = $rrs;
}

///// 회원 이름 불러오기
$membersql = "SELECT * FROM members";
$memberresult = $mysqli->query($membersql);
$memberrs = $memberresult->fetch_object();

// 이벤트


?>
<main>
  <!-- 메인배너 - 다영 -->
  <section class="main_banner">
    <ul class="user_banner">
      <li><img src="../images/user_main_banner1.png" alt=""></li>
      <li><img src="../images/user_main_banner2.png" alt=""></li>
      <li><img src="../images/user_main_banner3.png" alt=""></li>
    </ul>
    <div class="main_count ">
      <ul class="user_count df usergrid">
        <li class="user_count_title df">
          <img src="../images/user_main_count.png" alt="">
          <div>
            <p class="body2b">[캥거루 패밀리 세일]</p>
            <p class="body2b">구독 할인 중!</p>
          </div>
        </li>
        <li>
          <div class="countdown">
            <span class="card_title mb-4">
              <span data-date="6/28/2024"></span>
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
      <div class="lec_cate active"><a href="<?= $rsl1; ?>">웹/편집/인테리어</a></div>
      <div class="lec_cate"><a href="<?= $rsl2; ?>">CG/VFX</a></div>
      <div class="lec_cate"><a href="<?= $rsl3; ?>">모션그래픽</a></div>
      <div class="lec_cate"><a href="<?= $rsl4; ?>">게임/웹툰</a></div>
    </div>
    <div class="lec_wrapper df">
      <div class="con active" id="tab1">
        <div class="lec_container">
          <?php
          if (isset($rslArr1)) {
            foreach ($rslArr1 as $rsl1) {
          ?>
              <ul>
                <li><a href="u_lecture_list.php?pid=<?= $rsl1->pid; ?>">
                    <img src="<?= $rsl1->thumbnail; ?>" alt=""></a></li>
                <li><a href="u_lecture_list.php?pid=<?= $rsl1->pid; ?>"><?= $rsl1->title; ?></a></li>
              </ul>
          <?php
            }
          }
          ?>
          <ul>
            <li><a href=""><img src="../images/Rectangle 160.png" /></a></li>
            <li><a href="">[2주 완성] 실무에 강한 웹 퍼블리셔 포트폴리오 만들기</a></li>
          </ul>
          <ul>
            <li><a href=""><img src="../images/Rectangle 159.png" /></a></li>
            <li><a href="">기능부터 트렌드까지, 입문자를 위한 포토샵&일러스트</a></li>
          </ul>
          <ul>
            <li><a href=""><img src="../images/Rectangle 162.png" /></a></li>
            <li><a href="">확실한 인포그래픽으로 클라이언트가 만족하는 작업물 만드는 브랜딩 디자인</a></li>
          </ul>
          <ul>
            <li><a href=""><img src="../images/Rectangle 158.png" /></a></li>
            <li><a href="">확실한 인포그래픽으로 클라이언트가 만족하는 작업물 만드는 브랜딩 디자인</a></li>
          </ul>
        </div>
      </div>
      <div class="con" id="tab2">
        <div class="lec_container">
          <?php
          if (isset($rslArr2)) {
            foreach ($rslArr2 as $rsl2) {
          ?>
              <ul>
                <li><a href="u_lecture_list.php?pid=<?= $rsl->pid; ?>">
                    <img src="<?= $rsl->thumbnail; ?>" alt=""></a></li>
                <li><a href="u_lecture_list.php?pid=<?= $rsl->pid; ?>"><?= $rsl->title; ?></a></li>
              </ul>
          <?php
            }
          }
          ?>
          <ul>
            <li><img src="../images/Rectangle 001.png" /></li>
            <li>[입문] 피그마 A to Z</li>
          </ul>
          <ul>
            <li><img src="../images/Rectangle 002.jpg" /></li>
            <li>[2주 완성] 실포트폴리오 만들기</li>
          </ul>
          <ul>
            <li><img src="../images/Rectangle 003.jpg" /></li>
            <li>기능부터 트렌드까지</li>
          </ul>
          <ul>
            <li><img src="../images/Rectangle 004.jpg" /></li>
            <li>확실한 인포그래픽으로 브랜딩 디자인</li>
          </ul>
        </div>
      </div>
      <div class="con" id="tab3">
        <div class="lec_container">
          <?php
          if (isset($rslArr3)) {
            foreach ($rslArr3 as $rsl3) {
          ?>
              <ul>
                <li><img src="../images/Rectangle 007.jpg" /></li>
                <li>[입문] 피그마 A to Z</li>
              </ul>
              <ul>
                <li><img src="../images/Rectangle 008.png" /></li>
                <li>[2주 완성] 실포트폴리오 만들기</li>
              </ul>
              <ul>
                <li><img src="../images/Rectangle 009.jpg" /></li>
                <li>기능부터 트렌드까지</li>
              </ul>
              <ul>
                <li><img src="../images/Rectangle 010.jpg" /></li>
                <li>확실한 인포그래픽으로 브랜딩 디자인</li>
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
          if (isset($rslArr4)) {
            foreach ($rslArr4 as $rsl4) {
          ?>
              <ul>
                <li><img src="../images/Rectangle 013.jpg" /></li>
                <li>[입문] 피그마 A to Z</li>
              </ul>
              <ul>
                <li><img src="../images/Rectangle 014.jpg" /></li>
                <li>[2주 완성] 실포트폴리오 만들기</li>
              </ul>
              <ul>
                <li><img src="../images/Rectangle 015.png" /></li>
                <li>기능부터 트렌드까지</li>
              </ul>
              <ul>
                <li><img src="../images/Rectangle 016.png" /></li>
                <li>확실한 인포그래픽으로 브랜딩 디자인</li>
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
      <ul class="notice df fdc">
        <?php
        if (isset($rsArr)) {
          foreach ($rsArr as $ra) {
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
      <ul class="notice df fdc">
        <li class="notice_table df aic">
          <a href="" class="notice_tit">프론트엔드 수업 관련 안내 공지드립니다.</a>
          <a href="" class="notice_ct">프론트엔드 수업 개강날짜가 변경되었습니다. 기존의 5월6일에서 5월 23일로 변경되었으니 이점 유의해주시기 바랍니다.</a>
          <a href=""><span class="material-symbols-outlined"> east</span></a>
        </li>
        <li class="notice_table df aic">
          <a href="" class="notice_tit">국비지원교육 지원금 관련 공지사항입니다.</a>
          <a href="" class="notice_ct">국비지원교육 지원금 대상 변경되었습니다. 기존의 지원금 대상이셨던 분들도 해당되오니 담당 부서에 확인부탁드립니다.</a>
          <a href=""><span class="material-symbols-outlined"> east</span></a>
        </li>
        <li class="notice_table df aic">
          <a href="" class="notice_tit">대체공휴일 보강수업 일정 안내사항 입니다.</a>
          <a href="" class="notice_ct">대체공휴일 보강 수업에 희망하시는 분들에 한해서 학원에서 별도로 보강 수업을 진행합니다.</a>
          <a href=""><span class="material-symbols-outlined"> east</span></a>
        </li>
      </ul>
      <ul class="notice df fdc">
        <li class="notice_table df aic">
          <a href="" class="notice_tit">프론트엔드 수업 관련 안내 공지드립니다.</a>
          <a href="" class="notice_ct">프론트엔드 수업 개강날짜가 변경되었습니다. 기존의 5월6일에서 5월 23일로 변경되었으니 이점 유의해주시기 바랍니다.</a>
          <a href=""><span class="material-symbols-outlined"> east</span></a>
        </li>
        <li class="notice_table df aic">
          <a href="" class="notice_tit">국비지원교육 지원금 관련 공지사항입니다.</a>
          <a href="" class="notice_ct">국비지원교육 지원금 대상 변경되었습니다. 기존의 지원금 대상이셨던 분들도 해당되오니 담당 부서에 확인부탁드립니다.</a>
          <a href=""><span class="material-symbols-outlined"> east</span></a>
        </li>
        <li class="notice_table df aic">
          <a href="" class="notice_tit">대체공휴일 보강수업 일정 안내사항 입니다.</a>
          <a href="" class="notice_ct">대체공휴일 보강 수업에 희망하시는 분들에 한해서 학원에서 별도로 보강 수업을 진행합니다.</a>
          <a href=""><span class="material-symbols-outlined"> east</span></a>
        </li>
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
        if (isset($rrsArr)) {
          foreach ($rrsArr as $item) {
        ?>
            <li class="user_profile">
              <div class="df user_review_img">
                <img src="../images/user_profile1.png" alt="">
                <p>
                  <span class="body2b"><?= $memberrs->username ?></span><br>
                  <span class="body1">3d애니메이터</span>
                </p>
              </div>
              <p class="body3"><?= $item->content; ?></p>
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
      <a href="event_list.php" class="user_e_link">더 보기</a>
      <span class="slider_next"></span>
    </div>
    <ul class="user_e_slide">
      <li>
        <a href="">
          <img src="../images/user_main_eventbanner1.png" alt="">
          <p class="body2b">인디자인 강의 신청 이벤트</p>
        </a>
      </li>
      <li>
        <a href="">
          <img src="../images/user_main_eventbanner1.png" alt="">
          <p class="body2b">인디자인 강의 신청 이벤트</p>
        </a>
      </li>
      <li>
        <a href="">
          <img src="../images/user_main_eventbanner1.png" alt="">
          <p class="body2b">인디자인 강의 신청 이벤트</p>
        </a>
      </li>
    </ul>
  </section>
  <!----------- 이벤트 - 다영 -->

  <!-- back_to_top - 선진 -->
  <div class="back-to-top qna"><span class="qnaquick">
      <a href="u_qna_list.php">Q&A</a>
    </span></div>
  <div class="back-to-top top"><span class="material-symbols-outlined">
      arrow_upward
    </span></div>
  <!-- back_to_top - 선진 -->
</main>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';

?>