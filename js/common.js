document.addEventListener('DOMContentLoaded',function(){

  const headerMenu = document.querySelector('#header .gnb_wrap li');
  // headerMenu.forEach(function(item){
  //   item.classList.remove('active');
  // })
  for(let menu of headerMenu){
    menu.classList.remove('active');
  }
});
