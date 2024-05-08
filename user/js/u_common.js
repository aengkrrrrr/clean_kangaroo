$(function(){
  $(".user_banner").bxSlider( {
      mode: 'fade',
      speed: 400,
      auto: true,
      pager: false
  });
});
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