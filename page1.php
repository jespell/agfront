<?php

$clientName = $_GET['clientName'];
$clientPhone = $_GET['clientPhone'];
$clientNamber = $_GET['clientNamber'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Интерфейс</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="codebase/dhtmlxgantt.css" rel="stylesheet"> 
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="codebase/dhtmlxgantt.js"></script>
    
  </head>
  <body>

  <script src="js/gantt-array.js"></script>
    
    <div class="wrapper container-fluid">
      <div class="row">
	<header class="col-md-2 text-center">
	 
	  Сервис-Бюро Форд
	 
	</header>
	
	<section class="col-md-7 silver-td header-height big-font">
	 
	  <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
	  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
	  <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
	 
	</section>
	
	<section class="col-md-3 silver-td header-height big-font">
	  
	  <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
	  
	  <!-- Оператор 1 -->
	 
	</section>
      </div>

      <!-- Тело -->
      
      <div class="row">
	
	<!-- Левая навигация -->
	
	<aside id="leftSide" class="col-md-2 col-sm-3">
	  
	  <p class="well well-sm" style="color:#303030">Цели</p>
	  
	  <ul style="padding-left:10px;">
	    <li>Убедить, что Автоград лучшее СТО</li>
	    <li>Записать клиента</li>
	    <li>Развеять сомнения</li>
	    <li>Вовремя напомнить о договоренности</li>
	  </ul>
	  
	  <br />
	  
	  <button type="button" class="btn btn-sm btn-default medium-font" onclick="showUnslist()">
	  <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
	  &nbsp;Возражения
	  
	  <div id="unsuccessList" class="unsuccessList">
	    <br />
	    
	    <input type="checkbox" /> Дорого<br />
	    <input type="checkbox" /> Записать клиента<br />
	    <input type="checkbox" /> Развеять сомнения<br />
	  </div>
	  
	  <div class="row">
	    <section class="col-md-12">
	      <br />
	      <button type="button" class="btn btn-sm btn-default medium-font">
		<span class="glyphicon glyphicon-compressed" aria-hidden="true"></span>
	      </button>
	      &nbsp;
	    </section>
	  </div>
	  
	  <div class="row">
	    <section class="col-md-12">
	      <br />
	      <button type="button" class="btn btn-sm btn-default medium-font">
		<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
	      </button>
	      &nbsp;Спецпредложения
	    </section>
	  </div>
	  
	  <div class="row">
	    <section class="col-md-12">
	      <br />
	      <button type="button" class="btn btn-sm btn-default medium-font">
		<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
	      </button>
	      &nbsp;Рекомендации
	    </section>
	  </div>
	  
	</aside>

	<!-- Центральная часть -->
	
	<section id="centerSide" class="col-md-8 col-sm-6">
	
	  <!-- Гант -->
	  
	  <div class="row">
	    
	    <section class="col-md-12 col-sm-12">
	      <br />
	      <div id="gantt_here" class="ganttTable"></div>
	      
		<script src="js/gantt-setup.js"></script>
	      
	      <br />
	    </section>
	  </div>
	  
	  <!-- Центральные три колонки -->
	  
	  <div class="row">
	    
	    <!-- Колонка 1 -->
	    <section class="col-md-4 col-sm-4 text-center">
	      
	      <form class="form-inline">
		<input type="text" class="form-control input-large" value="<?php echo $clientName; ?>" placeholder="Поиск по имени">
		<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	      </form>
	      <br />
	      <form class="form-inline">
		<input type="text" class="form-control input-large" value="<?php echo $clientNamber; ?>" placeholder="Поиск по VIN">
		<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	      </form>
	      
	    </section>
	    
	    <!-- Колонка 2 -->
	    <section class="col-md-4 col-sm-4 text-center">
	      
	      <form class="form-inline">
		<input type="text" class="form-control input-large" value="<?php echo $clientPhone; ?>" placeholder="Поиск по телефону">
		<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></button>
	      </form>
	      
	    </section>
	    
	    <!-- Колонка 3 -->
	    <section class="col-md-4 col-sm-4">
	      
	      <button class="btn btn-success margin-left-45" id="dLabel" role="button" data-toggle="dropdown">История</button>
	      
	      <ul class="dropdown-menu padding-20" role="menu" aria-labelledby="dLabel">
		<li>01.03.2017, ТО 2</li>
		<li>14.10.2016, Шиномонтаж</li>
		<li>06.05.2016, ТО-1</li>
		<li>13.01.2016, ТО-0</li>
	      </ul>
	      
	    </section>
	  </div>
	  
	  <!-- Чекбоксы -->
	  
	  <div class="row padding-20">
	    <section class="col-md-12 col-sm-12 padding-20">
	    
	    <br /><br /><br />
	    
	    <p class="lead">
	      <input type="checkbox" /> TO - 0
	    </p>	    
	    </section>
	    
	    <section class="col-md-12 col-sm-12 padding-20 border-silver">
	    
	      <table class="lead">
		<tr><td width="30px"><input type="checkbox" /></td><td> ТО ноль для того что бы убедиться в исправной работе всех узлов, Вашего автомобиля</td></tr>
		<tr><td width="30px"><input type="checkbox" /></td><td> Это бесплатно и не займет много времени, мы просто проверим ваш автомобиль</td></tr>
		<tr><td width="30px"><input type="checkbox" /></td><td> Ответим на все возникшие вопросы по автомобилю</td></tr>
		<tr><td width="30px"><input type="checkbox" /></td><td> Удобное время работы с 8-00 до 22-00, в будни и  выходные</td></tr>
	      </table>
	      
	    </section>
	    
	  </div>
	  
	  <div class="row padding-20">
	    <section class="col-md-12 col-sm-12 padding-20">
	    <p class="lead">
	      Гарантия: <input type="checkbox" /> ДА <input type="checkbox" /> НЕТ <br /><br />
	      
	      Записан 30.08.2017 в 15.30 к мастеру Иванову 
	      <button type="button" class="btn btn-success">Изменить</button> <br /><br />
	      
	      <input type="checkbox" /> Знает точно что нужно <input type="checkbox" /> Нужна диагностика <br /><br />
	    </p>  
	    </section>
	    
	    <section class="col-md-12 col-sm-12 padding-20 border-silver">
	    
	      <table class="lead">
		<tr><td width="30px"><input type="checkbox" /></td><td> У нас бесплатная диагностика, приезжайте посмотрим автомобиль, потом определимся по срокам ремонта и цене, на какое время записать?</td></tr>
		<tr><td width="30px"><input type="checkbox" /></td><td> Это не займет много времени, мы проверим ваш автомобиль, и дадим точные рекомендации, при необходимости закажем запасные части, когда вам удобно?</td></tr>
		<tr><td width="30px"><input type="checkbox" /></td><td> Удобное время работы с 8-00 до 22-00</td></tr>
		<tr><td width="30px"><input type="checkbox" /></td><td> Спец инструмент и диагностика, для вашего автомобиля</td></tr>
	      </table>
	    
	    </section>
	    
	    <section class="col-md-3 col-sm-4">
	      <br /><br />
	      
	      <button type="button" class="btn btn-danger">Out</button>
	      <button type="button" class="btn btn-success">ПСК</button>
	    </section>
	    
	    <section class="col-md-9 col-sm-8">
	      <br /><br />
	      
	      Записать 
	      <button type="button" class="btn btn-success">ДАТА +30 дн.</button>
	      
	    </section>
	    
	    <section class="col-md-12 col-sm-12">
	      <br /><br />
	      
	      Записать 
	      <button type="button" class="btn btn-success">Сегодня 11-00</button>
	      <button type="button" class="btn btn-success">Завтра 14-00</button>
	      <button type="button" class="btn btn-danger">Передать мастеру</button>
	      
	    </section>
	    
	    <section class="col-md-12 col-sm-12">
	      <br /><br />
	      
	      Записать 
	      <button type="button" class="btn btn-success">Сегодня 11-00</button>
	      <button type="button" class="btn btn-success">Завтра 14-00</button>
	      <button type="button" class="btn btn-danger">Создать заявку</button>
	      
	    </section>
	    
	    <section class="col-md-12 col-sm-12">
	      <br /><br />
	      <button type="button" class="btn btn-success">Открыть заявку</button>
	      
	    </section>
	  </div>
	  <!-- Кнопки страниц -->
      
	  <div class="row">
	    <section class="col-md-1 col-sm-1">
	    
	    </section>
	    
	    <section id="navButtons" class="col-md-11 col-sm-11">
	      
	      <br /><br />
	      
	      <a href="./" role="button" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
	      <a href="page1.php" role="button" class="btn btn-default">Карточка клиента</a>
	      <a href="page5.html" role="button" class="btn btn-default">Оформление заезда</a>
	      <a href="page6.html" role="button" class="btn btn-default">Выдача автомобиля</a>
	      <a href="page7.html" role="button" class="btn btn-default">Планировщик</a>
	      <br /><br />
	    </section>
	  </div>
	  
	</section>
	
	<!-- Правая колонка -->
	
	<section id="rightSide" class="col-md-2 col-sm-3 bg-silver" style="padding:0;margin:0;">
	  
	  <div id="datepicker" class="small"></div>
	  
	  <section class="col-md-12 col-sm-12 right-section">
	    
	    <p class="well well-sm">Доп. аргументы</p>
	    
	    <input type="checkbox" /> Бесплатная мойка<br />
	    <input type="checkbox" /> Бесплатный ужин<br />
	    <input type="checkbox" /> Велкам скидка 40%<br />
	    <input type="checkbox" /> Супер предложение 1<br />
	    <input type="checkbox" /> Супер предложение 2<br />
	    <input type="checkbox" /> Супер предложение 3<br />
	    <input type="checkbox" /> Сезонные предложение<br />
	    <input type="checkbox" /> Не выполненные рекомендации<br />
	  </section>
	</section>
      </div>
      
    </div>
    
    <footer></footer>    
    
    <script src="js/main.js"></script>
  </body>
</html>