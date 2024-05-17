<?php
$title='장바구니';
$css1 =' <link rel="stylesheet" href="./css/cart.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';

if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];//유저아이디

  //cart item 조회
  $sqlct = "SELECT p.*,ct.* FROM cart ct
          JOIN products p ON p.pid = ct.pid
          WHERE ct.userid = '{$userid}'
  
          ORDER BY ct.cartid DESC";
  // echo $sqlct;
  
  $result = $mysqli-> query($sqlct);
  while($rs = $result->fetch_object()){
    $rscct[]=$rs;
  }


  //coupon 조회
  $sqlcp = "SELECT c.* FROM user_coupons uc
          JOIN coupons c ON c.cid = uc.couponid
          WHERE uc.userid = '{$userid}'
          ORDER BY uc.couponid DESC";
  
  // echo $sqlcp;
  $result = $mysqli-> query($sqlcp);
  while($rs = $result->fetch_object()){
    $rsccp[]=$rs;
  }
}
?>
<main class="usergrid">
  <div class="my_cart">
    <h2 class="h2">장바구니</h2>
    <div class="select df aic">
      <div class="form-floating all_check">
        <input class="form-check-input" type="checkbox" value="" id="all_check">
        <label class="form-check-label" for="all_check">전체선택</label>
      </div>
      <div class="num df">
        <span class="select_num">0</span><span>개</span>
        <span class="total_num">총 0</span><span>개</span>
      </div>
      <button class="delete_btn select_del">선택 삭제</button>
    </div>
    <div class="cart_ct_none df fdc jcc aic hidden">
      <img src="/clean_kangaroo/images/cart_kang.png" alt="">
      <strong class="body1b">장바구니에 담긴 강의가 없습니다.</strong>
      <a href="" class="primary_btn">홈으로 이동</a>
    </div>
    <?php
          if (isset($rscct)) {
          foreach ($rscct as $item) {
        ?>
    <div class="cart_ct df">
      <input class="form-check-input" type="checkbox" value="<?= $item->cartid ?>" name="cart" id="cart">
      <img src="<?=$item->thumbnail;?>" alt="">
      <div class="cart_lec_ct">
        <h3 class="body3b"><?=$item->title?></h3>
        <p class="body5"><?=$item->content?></p>
        <div class="lec_time df aic">
          <span class="material-symbols-outlined">description</span>
          <span class="body4 month_tit">수강기간</span>
          <span class="body4 month"><?=$item->sale_start_date;?><br>~<?=$item->sale_end_date;?></span>
          <strong class="cart_lec_price body1b"><?= $item->price;?></strong><span>원</span>
        </div>
      </div>
    </div>
    <?php
        }
      }
    ?>
    <form class="pay_wrap" action="#" method="POST">
      <h3 class="body1b">결제정보</h3>
      <input type="hidden" value="<?=$userid?>" class="userid">
      <div class="select_wrap">
        <label for="" class="body3">쿠폰선택</label>
        <select class="form-select" aria-label="" id="" name="">
          <option selected>사용가능한 쿠폰</option>
        <?php
          if (isset($rsccp)) {
          foreach ($rsccp as $cp) {
        ?>
          <option><?= $cp-> coupon_name?></option>
        <?php
          }
        }
      ?>
        </select>
      </div>
        <div class="cart_price_wrap df">
          <span class="body3">상품 금액 :</span>
          <span class="body3 cart_price">0</span><em>원</em>
        </div>
        <div class="cart_sale df">
          <span class="body3">할인 금액 :</span>
          <span class="body3">0 원</span>
        </div>
        <div class="cart_total df">
          <strong class="body2b">총 결제 금액 :</strong>
          <strong class="body2b cart_total_price">0</strong><em>원</em>
        </div>
        <button class="secondary_btn pay_btn">구매하기</button>
      </form>
  </div>
</main>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
  let all_check = $('.all_check');
  let select_del = $('.select_del');

//카트 결제정보
function cartInfo() {
  let cart_item = $('.cart_ct');
  let cart_item_checked = cart_item.find('input:checked');


//모든 아이템이 체크가 되면 전체선택에 checked
if(cart_item.length === cart_item_checked.length){
  all_check.find('input').prop('checked',true);
} else{
  all_check.find('input').prop('checked',false);
}

//상품 전체개수
$('.total_num').text('총' + cart_item.length);

//선택 상품개수
$('.select_num').text(cart_item_checked.length);


}

//아이템 체크박스 change
$('.cart_ct').change(function(){
  cartInfo();
});

//강좌금액 출력
function calcTotal(){
    let cartItem = $('.cart_ct');
    let grand_total = 0;
    let p_sub_price = 0;

    cartItem.each(function(){
      let price = Number($(this).find('.cart_lec_price').text());

      let sub_price = $('.cart_price_wrap').find('.cart_price');
      let total_price = $('.cart_total').find('.cart_total_price');

      p_sub_price += price;
    });        

    $('.cart_total_price').text(grand_total);
    $('.cart_price').text(p_sub_price);
  }
calcTotal();
  



//전체선택 체크(전체선택) / 해제(전체해제)
all_check.change(function(){
  let cart_item = $('.cart_ct');
  //전체선택
  if($(this).find('input').prop('checked')){
    cart_item.find('input').prop('checked',true);
  } else{
    cart_item.find('input').prop('checked',false);
  }
  cartInfo();
});



  //카트 삭제 업데이트
  $('.select_del').click(function(){
      let target =$('.cart_ct');

      if(target.length > 0){
        let cartid = [];
        $('.cart_ct').each(function(){

          if($(this).find('input').prop('checked')){
            cartid.push($(this).find('input').val());
            
          } 
        })

        let data = {
          cartid : cartid
        }
        console.log(data);

        $.ajax({
          url:'cart_del.php',
          async:false,
          type:'POST',
          dataType:'json',
          data:data,
          error:function(){},
          success:function(data){
          console.log(data);
          if(data.result=='ok'){
              alert('상품을 삭제하였습니다.');     
              location.reload();                   
          }else{
              alert('오류, 다시 시도하세요');                        
              }
            }
        });
      } 

  });






//결제하기 클릭
$('.pay_btn').click(function(){

  let target =$('.cart_ct');

  if(target.length > 0){
    let cartid = [];
    $('.cart_ct').each(function(){

      if($(this).find('input').prop('checked')){
        cartid.push($(this).find('input').val());
        
      } 
    })
    
    let userid = $(this).find('.userid').val();
    let total = $('.cart_total').find('.cart_total_price');

    let data = {
      pid : pid
      cartid : cartid,
      userid : userid,
      total : total
    }
    console.log(data);

    $.ajax({
      url:'cart_payment.php',
      async:false,
      type:'POST',
      dataType:'json',
      data:data,
      error:function(){},
      success:function(data){
      console.log(data);
      if(data.result=='true'){
          alert('상품을 구매가 완료되었습니다.');     
          location.reload();                   
      }else{
          alert('구매오류, 다시 시도하세요');                        
          }
        }
    });
  }  else{
    alert('상품을 선택해주세요');
  }

});

</script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>