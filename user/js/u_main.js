// 메인배너 - 다영
$(".user_banner").bxSlider( {
  mode: 'fade',
  speed: 400,
  auto: true,
  controls:false,
  pager: false
});
///////////// 메인배너 - 다영

// 강좌소개 - 선진 
$('.lec_container').bxSlider({
minSlides: 2,
maxSlides: 4,
slideWidth: 282,
slideMargin: 30,
pager:false,
prevSelector:'.lec_controls .lec_prev',
nextSelector:'.lec_controls .lec_next'
});

$('.lec_cate a').on('click', function(e){
  var currentAttrValue = $(this).attr('href');

  // 탭의 활성화 상태 제어
  $('.lec_cate').removeClass('active');
  $('.lec_container').hide();

  // 클릭한 탭 활성화 및 해당하는 내용 표시
  $(this).parent('.lec_cate').addClass('active');
  $(currentAttrValue).show();

  e.preventDefault();
});

$(".lec_cate").click(function(){
$(".lec_cate").removeClass("active"); 
$(this).addClass("active"); 
});



//////////// 강좌소개 - 선진 


// 공지사항 - 송림
$('.notice_wrap').bxSlider({
minSlides: 1,
pager:false,
prevSelector:'.main_notice .controls .prev',
nextSelector:'.main_notice .controls .next'
});
//////////// 공지사항 - 송림


// 수강평 - 다영
$(".main_review_list").bxSlider( {
auto: true,
moveSlides: 1,
slideWidth: 370,
slideMargin: 45,
maxSlides: 3,
controls:false,
pager: false
});

/////////// 수강평 - 다영

// 이벤트 - 다영
$(".user_e_slide").bxSlider( {
moveSlides: 1,
slideWidth: 330,
slideMargin: 60,
maxSlides: 3,
nextSelector: '.user_e_title .slider_next',
pager: false
});

/////////// 이벤트 - 다영

// back_to_top - 선진 
$(window).scroll(function(){
if ($(this).scrollTop() > 100) {
$('.back-to-top').fadeIn();
} else {
$('.back-to-top').fadeOut();
}
});

$('.back-to-top').click(function(){
$('html, body').animate({scrollTop : 0},0);
return false;
});
//////////// back_to_top - 선진 