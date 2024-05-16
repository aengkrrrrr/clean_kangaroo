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
        <span class="select_num">0개</span>
        <span class="total_num">총 0개</span>
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
      <input class="form-check-input" type="checkbox" value="" name="cart" id="cart">
      <img src="<?=$item->thumbnail;?>" alt="">
      <div class="cart_lec_ct">
        <h3 class="body3b"><?=$item->title?></h3>
        <p class="body5"><?=$item->content?></p>
        <div class="lec_time df aic">
          <span class="material-symbols-outlined">description</span>
          <span class="body4 month_tit">수강기간</span>
          <span class="body4 month"><?=$item->sale_start_date;?><br>~<?=$item->sale_end_date;?></span>
          <strong class="cart_lec_price body1b"><?= $item->price;?>원</strong>
        </div>
      </div>
    </div>
    <?php
        }
      }
    ?>
    <form class="pay_wrap" action="#" method="POST">
      <h3 class="body1b">결제정보</h3>
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
        <div class="cart_price df">
          <span class="body3">상품 금액 :</span>
          <span class="body3">0 원</span>
        </div>
        <div class="cart_sale df">
          <span class="body3">할인 금액 :</span>
          <span class="body3">0 원</span>
        </div>
        <div class="cart_total df">
          <strong class="body2b">총 결제 금액 :</strong>
          <strong class="body2b">0 원</strong>
        </div>
        <button class="secondary_btn pay_btn">구매하기</button>
      </form>
  </div>
</main>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
  let cart_item = $('.cart_ct');
  let cart_item_checked = cart_item.find('input:checked');
  let all_check = $('.all_check');


//모든 아이템이 체크가 되면 전체선택에 checked
if(cart_item.length === cart_item_checked.length){
  all_check.find('input').prop('checked',true);
} else{
  all_check.find('input').prop('checked',false);
}

//상품 전체 개수
$('.total_num').text(cart_item.length);

//선택 상품개수
$('.select_num').text(cart_item_checked.length);

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


//선택삭제 클릭 시 선택된 아이템 삭제
select_del.click(function(){
  let cart_item = $('.cart_ct');
  canUdel(cart_item.find('input:checked').parent());
  cartInfo();
});






//결제하기 클릭
$('.pay_btn').click(function(){

  if($('.cart_ct').find('input:checked').length>0){

    let total_price = Number($('.cart_total_price').text().replace(',',''));
  
    let discount_price = Number($('.cart_pay_price').text().replace(',',''));
    console.log(discount_price);
  
    let select_item = $('.cart_ct').find('input:checked').parent();
    let cart_id = [];
    select_item.each(function(){
      cart_id.push(Number($(this).attr('data-cartid')));
    });
    console.log(cart_id);
  
    let userid = $(this).find('.userid').val();

    let cpid = $(this).find('.coupon_select').val();
    console.log('cpid'+cpid);
  
  
    let data = {
      cartid : cart_id,
      userid: userid,
      pid: pid
    }
  console.log(data);
    $.ajax({
      async : false, 
      type: 'post',     
      data: data, 
      url: "cart_payment.php", 
      dataType: 'json', //결과 json 객체형식
      error: function(error){
        console.log('Error:', error);
      },
      success: function(return_data){
        location.reload();
      }
    });//ajax
  } else{
    alert('상품을 선택해주세요');
  }

});

</script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>