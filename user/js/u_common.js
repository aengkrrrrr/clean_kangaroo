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
			{duration:800, fill: "forwards", easing: "cubic-bezier(0.34, 1.56, 0.64, 1)"},
		);
				
	} else {
		 search.animate(
			[
				{ height: '310px'},
				{ height: '0px'},
			],
			{duration:700, fill: "forwards",easing: "cubic-bezier(0.25, 1, 0.5, 1)"},
		);
	}
});
//////////// 공통 header 검색창


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

// 장바구니 아이콘 호버
let cart = document.querySelector('.util_wrap .cart');
let min_cart = document.querySelector('.min_cart_wrap');

cart.addEventListener('mouseenter',function(){
	min_cart.style.display='block';
})
min_cart.addEventListener('mouseleave',function(){
	min_cart.style.display='none';
})
////////////// 장바구니 아이콘 호버
