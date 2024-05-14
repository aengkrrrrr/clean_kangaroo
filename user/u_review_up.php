<?php
session_start();
$title='수강평';
$css1 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
  <main class="usergrid">
    <div class="user_review_writett">
      <h2 class="h2">수강평 쓰기</h2>
    </div>
    <section class="user_review_writecn">
      <div class="select_wrap">
        <select class="form-select" aria-label="" id="" name="">
          <option selected>과목 선택</option>
          <option>중분류 과목1</option>
          <option>중분류 과목2</option>
        </select>
      </div>
      <div class="user_review_titlewrap df">
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          <label for="floatingTextarea">제목</label>
        </div>
        <div class="make_star df">
          <select name="" id="makeStar" class="form-select">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <div class="rating" data-rate="3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>	
          </div>
        </div>
      </div>
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 500px"></textarea>
        <label for="floatingTextarea2">내용</label>
      </div>
    </section>
    <p class="df">
      <a href="u_review_list.html" class="basic_btn rvbackbtn">취소</a>
      <a href="u_review_list.html" class="primary_btn">저장</a>
    </p>
  </main>
  <?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>