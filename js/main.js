$("#datepicker").datepicker({
  autoSize: true,
  dayNamesMin: ['Пн','Вт','Ср','Чт','Пт','Сб','Вс'],
  monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрьr','Октябрь','Ноябрь','Декабрь'] 
});

$("#navButtons a").each(function(){
  
  if($(this).attr('href') == window.location.pathname.replace(/^.+\//g, ''))

    $(this).removeClass('btn-default').addClass('btn-info').addClass('active');
});

$(".gantt_tree_icon").hide();

var centerSide = $("#centerSide").height();
var winWidth  = $(window).width();

if(winWidth > 500){
  
  $("#leftSide").css('height', centerSide);
  $("#rightSide").css('height', centerSide);
}

function showUnslist() {

  if (document.getElementById("unsuccessList")) {
    
      var obj = document.getElementById("unsuccessList");
    
      if (obj.style.display != "block") {
	
	obj.style.display = "block";
      }      
      else{ 
	obj.style.display = "none";
      }
  }
}
