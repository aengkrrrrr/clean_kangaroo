$("#checkAlls").click(function() {
  if($("#checkAlls").is(":checked")) $("input[name=pcode]").prop("checked", true);
  else $("input[name=pcode]").prop("checked", false);
});

$("input[name=pcode]").click(function() {
  var total = $("input[name=pcode]").length;
  var checked = $("input[name=pcode]:checked").length;
  
  if(total != checked) $("#checkAlls").prop("checked", false);
  else $("#checkAlls").prop("checked", true); 
});

$("#checkAll").click(function() {
  if($("#checkAll").is(":checked")) $("input[name=code2]").prop("checked", true);
  else $("input[name=code2]").prop("checked", false);
});

$("input[name=code2]").click(function() {
  var total = $("input[name=code2]").length;
  var checked = $("input[name=code2]:checked").length;
  
  if(total != checked) $("#checkAll").prop("checked", false);
  else $("#checkAll").prop("checked", true); 
});