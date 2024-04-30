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