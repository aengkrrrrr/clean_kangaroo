<?php
$title='장바구니';
$css1 =' <link rel="stylesheet" href="./css/cart.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/u_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/user_check.php';

if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];//유저아이디

  //cart item 조회
  $sqlct = "SELECT p.*,ct.* FROM cart ct
          JOIN products p ON p.pid = ct.pid
          WHERE ct.userid = '{$userid}'
  
          ORDER BY ct.cartid DESC";
//  echo $sqlct;

    $rscct = array();
      $result = $mysqli-> query($sqlct);
      while($rs = $result->fetch_object()){
        $rscct[]=$rs;
      }


  //coupon 조회
  $sqlcp = "SELECT c.* FROM user_coupons uc
          JOIN coupons c ON c.cid = uc.couponid
          WHERE uc.userid = '{$userid}'
          AND uc.couponid = c.cid
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
      <?php
      if (count($rscct) > 0) {
        foreach ($rscct as $item) {
          ?>  
      <div class="cart_ct df">
        <input class="form-check-input" type="checkbox" data-pid="<?= $item->pid ?>" value="<?= $item->cartid ?>" name="cart" id="cart">
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
      } else {
        ?>
      <div class="cart_ct_none df fdc jcc aic">
        <img src="/clean_kangaroo/images/cart_kang.png" alt="">
        <strong class="body1b">장바구니에 담긴 강의가 없습니다.</strong>
        <a href="index.php" class="primary_btn">홈으로 이동</a>
      </div>
      <?php
      }
    ?>
    <form class="pay_wrap" action="cart_payment.php" method="POST">
      <h3 class="body1b">결제정보</h3>
      <input type="hidden" name="userid" value="<?=$userid?>">
      <input type="hidden" name="pid[]" id="pid" value="">
      <input type="hidden" name="cartid[]" id="cartid" value="">
      <input type="hidden" name="total_price" id="total_price" value="">
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
          <span class="body3 discount">0 </span><em>원</em>
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
//   let all_check = $('.all_check');
//   let select_del = $('.select_del');

// //카트 결제정보
// function cartInfo() {
//   let cart_item = $('.cart_ct');
//   let cart_item_checked = cart_item.find('input:checked');


//   //모든 아이템이 체크가 되면 전체선택에 checked
//   if(cart_item.length === cart_item_checked.length){
//     all_check.find('input').prop('checked',true);
//   } else{
//     all_check.find('input').prop('checked',false);
//   }

//   //상품 전체개수
//   $('.total_num').text('총' + cart_item.length);

//   //선택 상품개수
//   $('.select_num').text(cart_item_checked.length);
// }

// //아이템 체크박스 change
// $('.cart_ct').change(function(){
//   cartInfo();
// });



// //강좌금액 출력
// function calcTotal(){
//     let cartItem = $('.cart_ct');
//     let grand_total = 0;
//     let p_sub_price = 0;
//     let discount = 0;
//     let pids= [];
//     let cartid=[];

//     cartItem.each(function(){

//       let price = Number($(this).find('.cart_lec_price').text());

//       let sub_price = $('.cart_price_wrap').find('.cart_price');
//       let total_price = $('.cart_total').find('.cart_total_price');

//       p_sub_price += price;
//       cartid.push($(this).find('input').val());
//       pids.push($(this).find('input').attr('data-pid'));
//     });        

//     $('#pid').val(pids);
//     $('#cartid').val(cartid);
//     discount=  Number($('.discount').text());
//     grand_total = p_sub_price - discount;
//     $('.cart_total_price').text(grand_total);
//     $('#total_price').val(grand_total);
//     $('.cart_price').text(p_sub_price);
//   }
// calcTotal();


// //전체선택 체크(전체선택) / 해제(전체해제)
//   all_check.change(function(){
//     let cart_item = $('.cart_ct');
//     //전체선택
//     if($(this).find('input').prop('checked')){
//       cart_item.find('input').prop('checked',true);
//     } else{
//       cart_item.find('input').prop('checked',false);
//     }
//     cartInfo();
//   });



//   //카트 삭제 업데이트
//   $('.select_del').click(function(){
//       let target =$('.cart_ct');

//       if(target.length > 0){
//         let cartid = [];
//         $('.cart_ct').each(function(){

//           if($(this).find('input').prop('checked')){
//             cartid.push($(this).find('input').val());
            
//           } 
//         })

//         let data = {
//           cartid : cartid
//         }
//         console.log(data);

//         $.ajax({
//           url:'cart_del.php',
//           async:false,
//           type:'POST',
//           dataType:'json',
//           data:data,
//           error:function(){},
//           success:function(data){
//           console.log(data);
//           if(data.result=='ok'){
//               alert('상품을 삭제하였습니다.');     
//               location.reload();                   
//           }else{
//               alert('오류, 다시 시도하세요');                        
//               }
//             }
//         });
//       } 

//   });

  let all_check = $('.all_check input');
  let select_del = $('.select_del');

  // 카트 정보 업데이트
  function cartInfo() {
    let cart_item = $('.cart_ct');
    let cart_item_checked = cart_item.find('input:checked');

    // 모든 아이템이 체크되면 전체선택 체크
    all_check.prop('checked', cart_item.length === cart_item_checked.length);

    // 상품 전체 개수 및 선택 개수 업데이트
    $('.total_num').text('총 ' + cart_item.length);
    $('.select_num').text(cart_item_checked.length);

    // 가격 정보 업데이트
    calcTotal();
  }

  // 강좌 금액 출력 (체크된 상품만 계산)
  function calcTotal() {
    let grand_total = 0;
    let p_sub_price = 0;
    let discount = Number($('.discount').text());
    let pids = [];
    let cartid = [];

    $('.cart_ct input:checked').each(function () {
      let cartItem = $(this).closest('.cart_ct');
      let price = Number(cartItem.find('.cart_lec_price').text());

      p_sub_price += price;
      cartid.push($(this).val());
      pids.push($(this).attr('data-pid'));
    });

    grand_total = p_sub_price - discount;
    
    // 업데이트된 값 반영
    $('.cart_price').text(p_sub_price);
    $('.cart_total_price').text(grand_total);
    $('#pid').val(pids);
    $('#cartid').val(cartid);
    $('#total_price').val(grand_total);
  }

  // 개별 아이템 체크박스 변경 시
  $('.cart_ct input[type="checkbox"]').change(function () {
    cartInfo();
  });

  // 전체선택 체크박스 변경 시
  all_check.change(function () {
    let isChecked = $(this).prop('checked');
    $('.cart_ct input[type="checkbox"]').prop('checked', isChecked);
    cartInfo();
  });

  // 선택 삭제 버튼 클릭 시
  select_del.click(function () {
    let cartid = [];

    $('.cart_ct input:checked').each(function () {
      cartid.push($(this).val());
    });

    if (cartid.length > 0) {
      $.ajax({
        url: 'cart_del.php',
        type: 'POST',
        dataType: 'json',
        data: { cartid: cartid },
        success: function (data) {
          if (data.result === 'ok') {
            alert('상품을 삭제하였습니다.');
            location.reload();
          } else {
            alert('오류, 다시 시도하세요');
          }
        }
      });
    }
  });

  // 최초 로딩 시 전체선택 체크박스는 하나만 표시
  $('.all_check:not(:first)').remove();

  // 초기화 (체크 상태 반영하여 가격 업데이트)
  cartInfo();





</script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/user/footer.php';
?>