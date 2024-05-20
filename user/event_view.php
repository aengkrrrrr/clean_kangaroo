<?php
$title='이벤트';
$css1 =' <link rel="stylesheet" href="./css/u_event.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
  <main class="usergrid">
    <div class="user_subevent_title">
      <h2 class="h2">event</h2>
    </div>
    <section>
      <div class="event_container">
        <div class="event_viewtt df">
          <h3 class="body1b">수강한 강의 후기 작성하고 선물받자!</h3>
          <dl class="df">
            <dt class="body3b">작성일</dt>
            <dd class="body3b">2024-05-07</dd>
          </dl>
        </div>
        <div class="event_viewinfo">
          <img src="../images/user_event_bannerimg.png" alt="">
        </div>
      </div>
      <p class="event_list_btn df"><a href="event_list.php" class="primary_btn">목록</a></p>
    </section>
  </main>
  <?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>