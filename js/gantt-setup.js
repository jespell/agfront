gantt.config.scale_unit = "hour";
gantt.config.step = 1;
gantt.config.date_scale = "%H:%i";
gantt.config.columns = [
    {name:"text", label:"Мастер", width:160, align: "left", tree:true }
];
gantt.config.order_branch = false;
gantt.config.drag_mode = false;
gantt.config.drag_move = false;
gantt.config.drag_links = false;
gantt.config.drag_resize = false;
gantt.config.drag_progress = false;
gantt.config.initial_scroll = true;
gantt.init("gantt_here");

gantt.templates.task_text=function(start, end, task){
    return '';
};

gantt.attachEvent("onTaskDblClick", function(id,e){

    return false;
});
gantt.attachEvent("onTaskClick", function(id,e){
    
    return false;
});
gantt.attachEvent("onTaskRowClick", function(id,row){
    
    return false;
});


function createBox(sizes, class_name){
	var box = document.createElement('div');
	box.style.cssText = [
		"height:" + sizes.height + "px",
		"line-height:" + sizes.height + "px",
		"width:" + sizes.width + "px",
		"top:" + sizes.top + 'px',
		"left:" + sizes.left + "px",
		"position:absolute"
	].join(";");
	box.className = class_name;
	return box;
}

gantt.addTaskLayer(function show_hidden(task) {
  if (!task.$open && gantt.hasChild(task.id)) {
    var sub_height = gantt.config.row_height - 5,
	    el = document.createElement('div'),
	    sizes = gantt.getTaskPosition(task);

    var sub_tasks = gantt.getChildren(task.id);

    var child_el;

    for (var i = 0; i < sub_tasks.length; i++){
      var child = gantt.getTask(sub_tasks[i]);
      var child_sizes = gantt.getTaskPosition(child);
      var child_color = child.color;

      child_el = createBox({
	height: sub_height,
	top:sizes.top+2,
	left:child_sizes.left,
	width: child_sizes.width
      }, "child_preview gantt_task_line");
      
      $(child_el).css('background-color', child_color);
      $(child_el).attr('task_id', child.parent);
      $(child_el).attr('work_start', child.work_start);
      $(child_el).attr('well_done', child.well_done);
      $(child_el).attr('diner', child.diner);
      $(child_el).attr('pl', child.pl);
      $(child_el).attr('pr', child.pr);
      
      el.appendChild(child_el);
    }
    return el;
  }
  return false;
});

gantt.parse(tasks);

var date = new Date();
var curTime = date.toString(); //date.getHours() + ':' + date.getMinutes;

/* Массив записей клиентов */

var clientArrey = {1: '<button type="button" class="task-button dropdown-toggle" data-toggle="dropdown">&nbsp;</button><ul class="dropdown-menu padding-20" role="menu" aria-labelledby="dLabel"><li>Иванов Иван Иванович</li><li>+7 999 555 4242</li><li>г/н Р545НР 72</li><li><br /><form class="form-group" method="GET" action="page1.php"><input type="hidden" name="clientName" value="Иванов Иван Иванович" /><input type="hidden" name="clientPhone" value="+7 999 555 4242" /><input type="hidden" name="clientNamber" value="г/н Р545НР 72" /><button type="submit" class="btn btn-xs btn-success">Открыть заявку</button></form></li></ul>',
		    2: '<button type="button" class="task-button dropdown-toggle" data-toggle="dropdown">&nbsp;</button><ul class="dropdown-menu padding-20" role="menu" aria-labelledby="dLabel"><li>Петров Михайл Сергеевич</li><li>+7 999 555 9561</li><li>г/н В545МТ 72</li><li><br /><form class="form-group" method="GET" action="page1.php"><input type="hidden" name="clientName" value="Петров Михайл Сергеевич" /><input type="hidden" name="clientPhone" value="+7 999 555 9561" /><input type="hidden" name="clientNamber" value="г/н В545МТ 72" /><button type="submit" class="btn btn-xs btn-success">Открыть заявку</button></form></li></ul>',
		    3: '<button type="button" class="task-button dropdown-toggle" data-toggle="dropdown">&nbsp;</button><ul class="dropdown-menu padding-20" role="menu" aria-labelledby="dLabel"><li>Сидоров Петр Михайлович</li><li>+7 999 555 4561</li><li>г/н А545КУ 72</li><li><br /><form class="form-group" method="GET" action="page1.php"><input type="hidden" name="clientName" value="Сидоров Петр Михайлович" /><input type="hidden" name="clientPhone" value="+7 999 555 4561" /><input type="hidden" name="clientNamber" value="г/н А545КУ 72" /><button type="submit" class="btn btn-xs btn-success">Открыть заявку</button></form></li></ul>',
		    4: '<button type="button" class="task-button dropdown-toggle" data-toggle="dropdown">&nbsp;</button><ul class="dropdown-menu padding-20" role="menu" aria-labelledby="dLabel"><li>Попов Алекстанд Иванович</li><li>+7 999 555 8491</li><li>г/н С545ТМ 72</li><li><br /><form class="form-group" method="GET" action="page1.php"><input type="hidden" name="clientName" value="Попов Алекстанд Иванович" /><input type="hidden" name="clientPhone" value="+7 999 555 8491" /><input type="hidden" name="clientNamber" value="г/н С545ТМ 72" /><button type="submit" class="btn btn-xs btn-success">Открыть заявку</button></form></li></ul>'
		  };

/* проход по всем таскам */

$(".gantt_task_line").each(function(){

  var task_id = $(this).attr('task_id');					// определяем id текущей таски
  var work_start = $(this).attr('work_start') ? $(this).attr('work_start') : 0;
  var well_done = $(this).attr('well_done') ? $(this).attr('well_done') : 0;
  var diner = $(this).attr('diner') ? $(this).attr('diner') : 0;
  var pl = $(this).attr('pl') ? $(this).attr('pl') : 0;
  var pr = $(this).attr('pr') ? $(this).attr('pr') : 0;
  var tillWork = Date.parse(work_start) - Date.parse(curTime);
  
  if(work_start != 0){
    
    if(tillWork > 0 && tillWork < 1800000){
    
      $(this).html(clientArrey[task_id])
	      .css({backgroundColor: 'orange',
		border: '1px orange solid'
	  });
    }else if(tillWork < 0 && tillWork > -1800000){
    
      $(this).html(clientArrey[task_id])
	      .css({backgroundColor: 'blue',
		border: '1px blue solid'
	  });
    }else if(tillWork < -1800000){
    
      if(well_done == 1){
      
	$(this).html(clientArrey[task_id])
	      .css({backgroundColor: 'green',
		border: '1px green solid'
	      });
      }else{
      
	$(this).html(clientArrey[task_id])
	      .css({backgroundColor: 'red',
		border: '1px red solid'
	      });
      
      }
    }else{
    
      $(this).html(clientArrey[task_id]);
    }
  }else{
  
    $(this).css({backgroundColor: 'white',
		  border: '1px silver solid'
	    });
  }
  
  if(diner == 1)
  
    $(this).html('Обед')
	    .css({backgroundColor: 'silver',
		  border: '1px gray solid',
		  textAlign: 'center'
	    });
	    
  if(pl == 1)
  
    $(this).html('ПЛ')
	    .css({backgroundColor: 'silver',
		  border: '1px gray solid',
		  textAlign: 'center'
	    });
	    
  if(pr == 1)
  
    $(this).html('ПР')
	    .css({backgroundColor: 'silver',
		  border: '1px gray solid',
		  textAlign: 'center'
	    });
});


$(".gantt_scale_cell").each(function(){

  var cellTime = $(this).text();
  
  if(cellTime == (date.getHours() + ':00')){
      
      var leftTime = date.getMinutes() / 60 * 100;
	
      $(this).html(
	'<div style="width:100%;height:100%;">' +date.getHours() + ':' 
	+ ((date.getMinutes() < 10) ? '0'+date.getMinutes() : date.getMinutes()) + '</div>'
	+ '<div style="position:absolute;width:2px;height:100%;top:0;left:' 
	+ leftTime + '%;background:red;z-index:2;"></div>');
	
  }
});

gantt.attachEvent("onGanttScroll", function (left, top){

    $(".gantt_scale_cell").each(function(){

      var cellTime = $(this).text();
      
      if(cellTime == (date.getHours() + ':00')){
	  
	  var leftTime = date.getMinutes() / 60 * 100;
	    
	  $(this).html(
	    '<div style="width:100%;height:100%;">' +date.getHours() + ':' 
	    + ((date.getMinutes() < 10) ? '0'+date.getMinutes() : date.getMinutes()) + '</div>'
	    + '<div style="position:absolute;width:2px;height:100%;top:0;left:' 
	    + leftTime + '%;background:red;z-index:2;"></div>');
	    
      }
    });
});
		