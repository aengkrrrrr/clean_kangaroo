// 팝업 쿠키
document.addEventListener('DOMContentLoaded', ()=>{


const popup = document.querySelector('.popup');
const input = popup.querySelector('input');
const popupBtn =popup.querySelector('.popup_btn');


popupBtn.addEventListener('click',()=>{
  if(input.checked){
    //쿠키생성
    setCookie('Portfolio','DeepKangaroo', 1);
  }else{
    //쿠키삭제
    delCookie('Portfolio');
  }
  popup.classList.add('hide');
});
function setCookie(name, val, day){
    let date = new Date();
    date.setDate(date.getDate()+day);
    document.cookie = `${name}=${val};Expires=${date}`;
  }
  function delCookie(name){
    let date = new Date();
    date.setDate(date.getDate()-1);
    document.cookie = `${name}='';Expires=${date}`;
  }

  function checkCookie(name){
    let cookieArr = document.cookie.split(';');
    let visited = false;

    for(let cookie of cookieArr){
      if(cookie.indexOf(name) > -1) {
        visited = true;
      }
    }

    console.log(visited);
    if(!visited) {
      popup.style.display='block';
    }  else {
      popup.style.display='none';
    }
  }
  checkCookie('DeepKangaroo');

});
///////////////// 팝업 쿠키








