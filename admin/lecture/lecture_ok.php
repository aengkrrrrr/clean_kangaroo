<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/login/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/dbcon.php';

$mysqli->autocommit(FALSE);//커밋이 안되도록 지정
try{
  $cate1 = $_POST['cate1'] ?? '';
  $cate2 = $_POST['cate2'] ?? '';
  $cate = $cate1 . $cate2 ;
  $price = $_POST['price'];

  $title  = $_POST['title'];
  $content  = rawurldecode($_POST['content']);
<<<<<<< HEAD
  $thumbnail  = $_FILES['thumbnail'];
  $url  = $_POST['url'] ?? '';
  $status = $_POST['status'] ?? '';
=======
 $thumbnail  = $_FILES['thumbnail'];

<<<<<<< HEAD
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
>>>>>>> parent of 5f298ea (Merge branch 'main-park')

  $userid = $_SESSION['AUID'];
   $dateString = $_POST['sale_start_date'];
  $dateString2 = $_POST['sale_end_date']; //2024-5-2
  $converTedDate = date('Y-m-d', strtotime($dateString, $dateString2))
  
<<<<<<< HEAD

  $sql = "INSERT INTO TB2 (코드, 년도)
  (
    SELECT A.코드, A.년도 -- 추가할 필드
    FROM TB1 A LEFT JOIN TB2 B 
    ON A.코드 = B.코드
    WHERE B.코드 IS NULL -- join한 TB2테이블의 필드가 NULL이라는 말은 TB2에는 없는 값을 의미한다.
  )";
=======
>>>>>>> parent of 5f298ea (Merge branch 'main-park')


 $status = $_POST['status'] ?? 1;
 $delivery_fee = $_POST['delivery_fee'] ?? 0;
$addedImg_id = rtrim($_POST['product_image'], ',');

<<<<<<< HEAD
=======

 $status = $_POST['status'] ?? 1;
 $delivery_fee = $_POST['delivery_fee'] ?? 0;
$addedImg_id = rtrim($_POST['product_image'], ',');

>>>>>>> parent of 5f298ea (Merge branch 'main-park')
 $optionCate1 = $_POST['optionCate1'] ?? '';//옵션 분류



  //파일 사이즈 검사
  if ($_FILES['thumbnail']['size'] > 10240000) {
    echo "<script>
      alert('10MB 이하만 업로드해주세요');
     history.back();
    </script>";
    exit;
  }
  //이미지 여부 검사
  if (strpos($_FILES['thumbnail']['type'], 'image') === false) {
    echo "<script>
      alert('이미지만 업로드해주세요');

    </script>";
    exit;
  }
  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/upload/';
  $fiename = $_FILES["thumbnail"]["name"]; //insta.jpg
  $ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
  $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg

  if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $save_dir . $savefile)) {
    $thumbnail = "/clean_kangaroo/admin/upload/" . $savefile;
  } else {
    echo "<script>
    alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
    history.back();
    </script>";
    exit;
  }
<<<<<<< HEAD
<<<<<<< HEAD
  $sql = "INSERT INTO products (cate,title,content,price,sale_start_date,sale_end_date,reg_date,status,thumbnail,url) VALUES (
=======
  $sql = "INSERT INTO products (cate,title,content,price,sale_end_date,reg_date,status,thumbnail) VALUES (
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
  $sql = "INSERT INTO products (cate,title,content,price,sale_end_date,reg_date,status,thumbnail) VALUES (
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
    '{$cate}',
    '{$title}',
    '{$content}',
    '{$price}',
    '{$sale_end_date}',
    now(),
    '{$status}',
    '{$thumbnail}',
    '{$url}'
  )";
  $result = $mysqli->query($sql);
  $pid = $mysqli->insert_id;




  if ($result) { //상품 등록 하면

    if(strlen($addedImg_id) > 0){ //추가 이미지가 있다면 12,13
      $sql = "UPDATE product_image_table SET pid = {$pid} where imgid in ({$addedImg_id})";
      $result = $mysqli->query($sql);
    }

    추가 옵션이 있다면
    $optionName1 = $_REQUEST['optionName1'] ?? ''; //옵션명
    
    if( strlen($optionName1[0]) > 1){

      $optionCnt1 = $_REQUEST['optionCnt1'] ?? ''; //옵션 재고
      $optionPrice1 = $_REQUEST['optionPrice1'] ?? ''; //옵션 가격
    

        for($i=0; $i<count($_FILES['optionImage1']['name']); $i++){
          //파일 사이즈 검사
          if ($_FILES['optionImage1']['size'][$i] > 10240000) {
            echo "<script>
              alert('10MB 이하만 업로드해주세요');
              history.back();
            </script>";
            exit;
          }
          //이미지 여부 검사
          if (strpos($_FILES['optionImage1']['type'][$i], 'image') === false) {
            echo "<script>
              alert('이미지만 업로드해주세요');
              history.back();
            </script>";
            exit;
          }
          //파일 업로드
          $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/clean_kangaroo/admin/upload/';
          $fiename = $_FILES["optionImage1"]["name"][$i]; //insta.jpg
          $ext = pathinfo($fiename, PATHINFO_EXTENSION); //jpg
          $newfilename = date("YmdHis") . substr(rand(), 0, 6); //202404111137.123123 -> 202404111137123123 
          $savefile = $newfilename . '.' . $ext;  //202404111137123123.jpg
    
          if (move_uploaded_file($_FILES["optionImage1"]["tmp_name"][$i], $save_dir . $savefile)) {
            $upload_option_image[] = "/clean_kangaroo/admin/upload/" . $savefile;
          } else {
            echo "<script>
            alert('썸네일 등록에 실패했습니다. 관리자에게 문의해주세요');
            history.back();
            </script>";
            exit;
          }
        } //for 반복문

    
    

        $x = 0;
        foreach($optionName1 as $opt){
          $optsql = "INSERT INTO product_options 
          (pid, cate, option_name, option_cnt, option_price, image_url) 
          VALUES (
            {$pid}, '{$optionCate1}', '{$opt}', '{$optionCnt1[$x]}', '{$optionPrice1[$x]}', '{$upload_option_image[$x]}'
          )";
          $optresult = $mysqli -> query($optsql);
          $x++;
        }    
  
    }

    $mysqli->commit();//디비에 커밋한다

    echo "<script>
<<<<<<< HEAD
<<<<<<< HEAD
    alert('강의 등록 완료');
   location.href = '/clean_kangaroo/admin/lecture/lecture_list.php';
=======
    alert('상품 등록 완료');
    location.href = '/clean_kangaroo/admin/lecture/lecture_list.php';
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
=======
    alert('상품 등록 완료');
    location.href = '/clean_kangaroo/admin/lecture/lecture_list.php';
>>>>>>> parent of 5f298ea (Merge branch 'main-park')
    </script>";
    }
} catch (Exception $e) {

  $mysqli->rollback();

  echo "<script>
  alert('강의 등록 실패');
  //history.back();
  </script>";
}
