let headerMenu = document.querySelector('#header .gnb_wrap li');
headerMenu.forEach(function(item){
  console.log(item);
  item.classList.remove("active");
})
