<?php
session_start();
$title='수강평';
$css1 =' <link rel="stylesheet" href="./css/u_main.css">';
$css2 =' <link rel="stylesheet" href="./css/u_review.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';



?>
  <main class="usergrid">
    <div class="user_subreview_title">
      <h2 class="h2">REVIEW</h2>
      <p class="body1">수강하며 느낀 점을 자세히 공유해요!</p>
    </div>
      <ul class="df user_review_list">
        <li class="user_profile">
          <div class="df user_review_img">
            <img src="../images/user_profile1.png" alt="">
            <p>
              <span class="h4">김*윤</span><br>
              <span class="body1">3d애니메이터</span>
            </p>
          </div>
            <p class="body3">애니메이션 작업을 파이프라인을 따라<br>
              직접 작업해보고,<br>
              또한 선생님의 상세한 피드백을 통해서<br>
              개인적으로 부족한 점을 다시 한번 되돌아<br>
              볼 수 있었습니다.
            </p>
        </li>
        <li class="user_profile">
          <div class="df user_review_img">
            <img src="../images/user_profile1.png" alt="">
            <p>
              <span class="h4">김*윤</span><br>
              <span class="body1">3d애니메이터</span>
            </p>
          </div>
            <p class="body3">애니메이션 작업을 파이프라인을 따라<br>
              직접 작업해보고,<br>
              또한 선생님의 상세한 피드백을 통해서<br>
              개인적으로 부족한 점을 다시 한번 되돌아<br>
              볼 수 있었습니다.
            </p>
        </li>
        <li class="user_profile">
          <div class="df user_review_img">
            <img src="../images/user_profile1.png" alt="">
            <p>
              <span class="h4">김*윤</span><br>
              <span class="body1">3d애니메이터</span>
            </p>
          </div>
            <p class="body3">애니메이션 작업을 파이프라인을 따라<br>
              직접 작업해보고,<br>
              또한 선생님의 상세한 피드백을 통해서<br>
              개인적으로 부족한 점을 다시 한번 되돌아<br>
              볼 수 있었습니다.
            </p>
        </li>
        <li class="user_profile">
          <div class="df user_review_img">
            <img src="../images/user_profile1.png" alt="">
            <p>
              <span class="h4">김*윤</span><br>
              <span class="body1">3d애니메이터</span>
            </p>
          </div>
            <p class="body3">애니메이션 작업을 파이프라인을 따라 직접 작업해보고,<br>
              또한 선생님의 상세한 피드백을 통해서 개인적으로 부족한 점을 다시 한번 되돌아볼 수 있었습니다.
            </p>
        </li>
      </ul>
      <div class="review_form_wrap df">
        <div class="totalcp">
          <p class="body3b">전체 <span>0</span>건</p>
        </div>
        <div class="board_container">
          <form action="" class="search_wrap">
            <div class="board_category df aic">
              <div class="select_wrap">
                <select class="form-select" id="coupon_status" class="form-select" name="status">
                  <option value="" selected>전체보기</option>
                  <option value="0">제목</option>
                  <option value="1">내용</option>
                </select>
              </div>
              <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="검색할 내용을 입력하세요.">
              <button class="primary_btn">검색</button>
            </div>
          </form>
        </div>
      </div>
      <section class="user_intreview ">
        <ul class="intreview_box">
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
          <li>
            <div class="user_intreview_tbox df">
              <div class="df">
                <div class="user_intreview_title df">
                  <img src="../images/user_profile1.png" alt="">
                  <p class="body4b">비주얼 디자인 포트폴리오</p>
                  <p class="body4b">강O경</p>
                </div>
                <p class="body4b">24-05-07</p>
              </div>
            </div>
            <div class="user_intreview_cbox">
              <p>대학교에서 디자인을 전공했지만 졸업 후 다른 일을 하다 거의 5년 만에 다시 디자인을 하려니 막막했었는데 좋은 강사님을 만나서 포트폴리오 무사히 제작할 수 있었습니다. 다른 수강생분들 작업 공유하면서 보는 것도 좋았고 6개월간 많은 배움 얻었습니다. 정말 감사합니다!</p>
            </div>
          </li>
        </ul>
      </section>
    <nav aria-label="" class="user_review_pager">
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
    <p class="df"><a href="u_review_up.html" class="primary_btn">글쓰기</a></p>
  </main>
  <?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';


?>