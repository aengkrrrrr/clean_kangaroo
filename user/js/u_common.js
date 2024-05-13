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
			{duration:500, fill: "forwards", mode: 'swing'},
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

// 장바구니 아이콘 호버
// let cart = document.querySelector('.util_wrap .cart');
// let min_cart = document.querySelector('.min_cart_wrap');

$('.util_wrap .cart').hover(function(){
	$('.min_cart_wrap').animate({display:'block'});
}, function(){
	$('.min_cart_wrap').animate({display:'none'});
}
)

////////////// 장바구니 아이콘 호버
