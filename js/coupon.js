  // 첨부파일 이미지
  let profile = document.querySelector("#profile");
  profile.addEventListener('change',(e)=>{
      let file = e.target.files[0];
      console.log(file);            
      var reader = new FileReader();
      reader.onloadend = (e)=>{
          let attachment = e.target.result;
          if(attachment){
              let target = document.querySelector('.preview');
              target.innerHTML = `<img src="${attachment}" alt="${file.name}">`;
          }
      }
      reader.readAsDataURL(file);
  });


  $( function() {
    $( "#cdatepicker1, #cdatepicker2" ).datepicker();
  } );


  
  $('.coupon_del').click(function(){

    $(this).closest('tr').remove();
    let cpid =  $(this).find('.coupon_post').attr('data-id');
    let data = {
      cpid :cpid
    }
    $.ajax({
        url:'coupon_delete.php',
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