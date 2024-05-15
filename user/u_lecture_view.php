<?php
$title='수강 보기';
$css1 =' <link rel="stylesheet" href="./css/u_lecture_view.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';


//테이블조회
$pid = $_GET['pid']; 
$sql = "SELECT * FROM products WHERE pid = {$pid}";
$result = $mysqli->query($sql);
$row = mysqli_fetch_object($result);
?>
<main>
  <!-- 강좌보기 - 송림 -->
  <section class="lecture_detail usergrid">
    <h2 class="h1 main_tit"><?=$row->title?></h2>
    <strong class="h1 sub_tit">ALL Care+</strong>
    <img src="<?=$row->thumbnail;?>" alt="">
    <div class="lecture_content_wrap df jcc">
      <div class="lecture_content">
        <span class="lec_group df aic">
          <em class="body2b">종로</em>
          <em class="body2b">10기</em>
        </span>
        <div class="detail df fdc aic">
          <em class="body3b">개강일 : <?=$row->sale_start_date;?></em>
          <em class="body3b">수강기간 : 4개월 과정</em>
          <em class="body3b">수업시간 : 주 5회, 4시간</em>
          <em class="body3b">모집정원 : 10명</em>
        </div>
      <div class="lec_btn df aic">
          <button class="primary_btn body2b add_cart_btn">장바구니</button>
          <a href="u_qna_list.php" class="primary_btn body2b">문의하기</a>
      </div>
      </div>
      <div class="lecture_content">
        <span class="lec_group df aic">
          <em class="body2b">강남</em>
          <em class="body2b">17기</em>
        </span>
        <div class="detail df fdc aic">
          <em class="body3b">개강일 : <?=$row->sale_start_date;?></em>
          <em class="body3b">수강기간 : 6개월 과정</em>
          <em class="body3b">수업시간 : 주 3회, 5시간</em>
          <em class="body3b">모집정원 : 10명</em>
        </div>
      <div class="lec_btn df aic">
          <button class="primary_btn body2b add_cart_btn">장바구니</button>
          <a href="u_qna_list.html" class="primary_btn body2b">문의하기</a>
      </div>
      </div>
    </div>
    <div class="lecture_system_wrap df jcc">
      <div class="lecture_system df">
        <div class="system_tit_wrap df fdc">
            <em class="body5">reason1</em>
            <strong class="body1b">비전공자도 가능!</strong>
            <p class="body3b">딥러닝캥거루 <b class="strong">수강생의  85%</b>는<br>
              <b class="strong">비전공자 수강생으로 수료 후</b><br>
              <b class="strong">취업에 성공</b>하고 있습니다.
            </p>
        </div>
        <img src="/images/lecture_ct_img01.png" alt="">
      </div>
      <div class="lecture_system df">
        <div class="system_tit_wrap df fdc">
            <em class="body5">reason2</em>
            <strong class="body1b">실무적응 훈련</strong>
            <p class="body3b">이론 교육과 함께, 실제 업무에<br><b class="strong">투입되었을 때, 잘할 수 있는</b><br>
              프론트엔드 개발자가<br>
              될 수 있도록 교육합니다.
            </p>
        </div>
        <img src="/images/lecture_ct_img02.png" alt="">
      </div>
    </div>
    <div class="lecture_system_wrap df jcc">
        <div class="lecture_system df">
          <div class="system_tit_wrap df fdc">
              <em class="body5">reason3</em>
              <strong class="body1b">책임담임제</strong>
              <p class="body3b">수업 시간 전/후 학원 내 자습실에서<br><b class="strong">보강 및 복습이 가능합니다.</b><br>
                또한 책임담임제를 통하여 수업이외의<br>
                각종 애로사항들을 해결해드립니다.
              </p>
          </div>
          <img src="/images/lecture_ct_img03.png" alt="">
        </div>
        <div class="lecture_system df">
          <div class="system_tit_wrap df fdc">
              <em class="body5">reason4</em>
              <strong class="body1b">취업 지원 시스템</strong>
              <p class="body3b">ALL CARE+ 수강생들 수업 후<br><b class="strong">취업에 이르기까지 지원합니다.</b><br>
                수험생의 성향에 맞는<br>
                기업 검색부터 자소서 및 면접준비까지!
              </p>
          </div>
          <img src="/images/lecture_ct_img04.png" alt="">
        </div>
   </div>
  </section>
  <section class="lecture_cur">
  <div class="lecture_cur_container usergrid">
    <div class="cur_tit df aic">
      <h2 class="h3">커리큘럼 4개월 과정</h2>
      <ul class="lec_cur_pager df">
        <li>
          <img src="/images/pager_star.svg" alt="">
          <span class="body3b">1개월</span>
        </li>
        <li>
          <img src="/images/pager_star.svg" alt="">
          <span class="body3b">2개월</span>
        </li>
        <li>
          <img src="/images/pager_star.svg" alt="">
          <span class="body3b">3개월</span>
        </li>
        <li>
          <img src="/images/pager_star.svg" alt="">
          <span class="body3b">4개월</span>
        </li>
      </ul>
    </div>
    <div class="lec_cur_slide_wrap">
      <div class="lec_cur_wrap df jcc">
        <div class="lec_cur_slide">
          <em class="body3b">1~2주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
        <div class="lec_cur_slide">
          <em class="body3b">3~4주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
      </div>
      <div class="lec_cur_wrap df jcc">
        <div class="lec_cur_slide">
          <em class="body3b">5~6주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
        <div class="lec_cur_slide">
          <em class="body3b">7~8주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
      </div>
      <div class="lec_cur_wrap df jcc">
        <div class="lec_cur_slide">
          <em class="body3b">9~10주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
        <div class="lec_cur_slide">
          <em class="body3b">11~12주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
      </div>
      <div class="lec_cur_wrap df jcc">
        <div class="lec_cur_slide">
          <em class="body3b">13~14주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
        <div class="lec_cur_slide">
          <em class="body3b">15~16주차</em>
          <ul class="df fdc body2">
            <li>- VScode 설정</li>
            <li>- html 기본 개념</li>
            <li>- 태그와 스타일의 기본적인 사용방법</li>
            <li>- 박스 관련 속성과 여백 속성</li>
            <li>- 폼 요소와 테이블 요소</li>
            <li>- 포지션 속성과 레이아웃 정렬</li>
            <li>- 웹 폰트 속성과 인터렉션 속성</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  </section>
  <!------------- 강좌보기 - 송림 -->

  <!-- back_to_top - 선진 -->
  <div class="back-to-top"><span class="material-symbols-outlined">
    arrow_upward</span>
  </div>
  <!-- back_to_top - 선진 -->
</main>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
$('.add_cart_btn').on('click', function(){
            
    //상품코드, 옵션명, 수량
    // let target = $('.widget-desc input[type="radio"]:checked');
    // let pid = <?= $pid; ?>;            
    // let optname = target.attr('data-name');
    // let qty = Number($('#qty').val());
    // let total = Number($('#subtotal span').text());

    // let data = {
    //     pid : pid,
    //     optname: optname,
    //     qty :qty,
    //     total:total
    // }
    // console.log(data);

  $.ajax({
    url:'cart_insert.php',
    async:false,
    type: 'POST',
    data:data,
    dataType:'json',
    error:function(){},
    success:function(data){
      console.log(data);                    
      if(data.result == '중복'){
          alert('이미 장바구니에 담았습니다.');                                            
      } else if(data.result=='ok'){
          alert('장바구니에 상품을 담았습니다.'); 
          location.reload();   
      } else{
          alert('담기 실패!'); 
      }
    }
  });
});
</script>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>