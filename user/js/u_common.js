// 공통 header 검색창
let searchBtn = document.querySelector('#u_header .u_search');
let search = document.querySelector('.search_area');

searchBtn.addEventListener('click',function(e){
	e.preventDefault();
	search.classList.toggle('active');
	
			if(search.classList.contains('active')) {
				 search.animate(
			[
				{ height: '0'},
				{ height: '310px'},

			],
			{duration:500, fill: "forwards"},
		);
				
	} else {
		 search.animate(
			[
				{ height: '310px'},
				{ height: '0px'},
			],
			{duration:500, fill: "forwards"},
		);
	}
});
//////////// 공통 header 검색창


  $(".user_banner").bxSlider( {
      mode: 'fade',
      speed: 400,
      auto: true,
      pager: false
  });

// 강좌소개 - 선진 
$('.lec_container').bxSlider({
	minSlides: 4,
	maxSlides: 10,
	slideWidth: 282,
	slideMargin: 30
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