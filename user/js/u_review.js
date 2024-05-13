let rating = $('.review .rating');
let selectForm = $('#makeStar');
// rating.eq(0).find('i:nth-child(-1+3)').css({color:'#F05522'});

rating.each(function(){
	let num = $(this).attr('data-rate');
	$(this).find('i').slice(0,num).css({color:'#F05522'});
});

selectForm.on('change',function(){
	let num = $(this).val();
	$('.make_star .rating').find('svg').css({color:'#ebebeb'});
	$('.make_star .rating').find('svg').slice(0,num).css({color:'#F05522'});
});

$(".user_review_list").bxSlider( {
  maxSlides: 4,
  slideWidth: 330,
  slideMargin: 40,
  ticker: true,
  speed: 20000
  });