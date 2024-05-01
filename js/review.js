$('.review_del').click(function(){

  $(this).closest('form').remove();
  let rvid =  $(this).find('.review_wrap').attr('data-id');
  let data = {
    rvid :rvid
  }
  $.ajax({
      url:'review_delete.php',
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