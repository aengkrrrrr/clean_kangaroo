$(document).ready(function(){
  $('#header').load('/admin/header.html'); 

  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  $('.summernote').summernote({
    height: 150,
    lang: "ko-KR"
	});
});