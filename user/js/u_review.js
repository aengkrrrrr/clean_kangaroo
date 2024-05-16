let rating = $('.user_intreview_title .rating');
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




  // 삭제
  $('.delete_btn').click(function(){

    $(this).closest('tr').remove();
    let cpid =  $(this).find('.cart_ct').attr('data-id');
    let data = {
      cpid :cpid
    }
    $.ajax({
        url:'u_review_delete.php',
        async:false,
        type: 'POST',
        data:data,
        dataType:'json',
        error:function(){},
        success:function(data){
        console.log(data);
        if(data.result=='ok'){
            alert('선택한 글이 삭제되었습니다.');  
            location.reload();                      
        }else{
            alert('오류, 다시 시도하세요');                        
            }
        }
    });
  });