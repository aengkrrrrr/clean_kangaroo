<?php
$title = "이벤트";
$css1 =' <link rel="stylesheet" href="./css/u_event.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
  <main class="usergrid">
    <div class="user_subevent_title">
      <h2 class="h2">event</h2>
    </div>
    <section class="user_subevent_wrap">
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg1.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg2.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg3.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg4.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg1.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg2.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg3.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg4.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg1.png" alt="">
        <a href="event_view.php" class="event_btn body1b">이벤트 신청하기</a>
      </div>
      <div class="user_event_item">
        <img src="../images/user_sub_eventimg2.png" alt="">
        <a href="event_view.php" class="event_none_btn body1b" >이벤트 신청하기</a>
      </div>
    </section>
    <nav aria-label="" class="event_pager">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link">&laquo;</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">&raquo;</a>
        </li>
      </ul>
    </nav>
  </main>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>