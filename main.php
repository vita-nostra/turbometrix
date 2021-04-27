<?php
if ($_COOKIE ['login'] == '') {header ('Location: /index.php');
   exit();}
require 'connectdb.php';
$login =$_COOKIE ['login'];
$sql='SELECT `calcul` FROM `users` WHERE `login`= :login ';
$query = $pdo->prepare($sql);
$query -> execute([':login'=>$login]);
$row=$query->fetch(PDO::FETCH_OBJ);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/132e30c8bc.js" crossorigin="anonymous"></script>
    <title>Turbometrix-Главная</title>
  </head>
  <body class="main">
    <div class="header">
    	<div class="container header__container">
    		<a href="index.html" class="logo">
				<img src="img/logo.png" alt="" class="logo__img">
			</a>    
	    	<div class="query">
	      		<span>Осталось запросов: </span><span class="query-count"><?php echo $row->calcul; ?></span>
	    	</div>
	    </div>
    </div>
    <div class="settings">
    	<div class="container">
    		<div class="domain-form"> 
			    <div class="polzunok-label">
			      <span class="polz_sum_text">Домен</span>
			      <div class="polz_sum_val">
			        <input type="text" id="amount2" data-calc="domen" value="" class="cal_val domain-field">

			      </div>
			    </div>
			    <div class="polzunok-label">
			      <span class="polz_sum_text">Дата начало</span>
			      <div class="polz_sum_val">
			        <input type="text" id="amount2" data-calc="start_date" value="2021-01" class="cal_val">
			        <div class="polz_sum_value_suffix"></div>
			      </div>
			    </div>
			    <div class="polzunok-label">
			      <span class="polz_sum_text">Дата конец</span>
			      <div class="polz_sum_val">
			        <input type="text" id="amount2" data-calc="end_date" value="2021-03" class="cal_val">
			        <div class="polz_sum_value_suffix"></div>
			      </div>
			    </div>
		    </div>
		    <div class="options">
		    	<div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="per_vis">
				      <label class="custom-control-label" for="per_vis"><span></span>Среднее кол-во просмотренных страниц</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="vis">
				      <label class="custom-control-label" for="vis"><span></span>Кол-во визитов</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12 select-traf">
				      <input type="checkbox" class="checkbox_set" id="traf">
				      <label class="custom-control-label" for="traf"><span></span>Трафик по каналам</label>
				      <select class="select_traf">
				        <option  value="all" selected="selected">Все</option>
				        <option  value="Direct">Прямой зайход</option>
				        <option  value="Email">Электронная почта</option>
				        <option  value="Social">Социальные сети</option>
				        <option  value="Search / Organic">Поиск (органика)</option>
				        <option  value="Search / Paid">Поиск (платный)</option>
				        <option  value="Display Ad">Баннеры</option>
				        <option  value="Referral">Рефералы</option>
				        <option  value="Other">Другое</option>
				      </select>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="vs">
				      <label class="custom-control-label" for="vs"><span></span>Трафик ПК VS Мобильный</label>
				    </div>
			    </div>
			    <div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="sm">
				      <label class="custom-control-label" for="sm"><span></span>Похожие сайты</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="keysorg">
				      <label class="custom-control-label" for="keysorg"><span></span>Ключевые запросы (Органика)</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="keyspay">
				      <label class="custom-control-label" for="keyspay"><span></span>Ключевые запросы (Платный)</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="comorg">
				      <label class="custom-control-label" for="comorg"><span></span>Конкуренты (Органика)</label>
				    </div>
				</div>
				<div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="compay">
				      <label class="custom-control-label" for="compay"><span></span>Конкуренты (Платный)</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="refin">
				      <label class="custom-control-label" for="refin"><span></span>Входящий реферальный трафик</label>
				    </div>
				    <div class="custom-control custom-checkbox col-md-12">
				      <input type="checkbox" class="checkbox_set" id="refout">
				      <label class="custom-control-label" for="refout"><span></span>Исходящий реферальный трафик</label>
				    </div>
				</div>
		    </div> 
		    <button id="exit" name="button">Анализировать </button>
		</div>
	</div>
	<div class="result">
		
	</div>
	<div class="footer">
	</div>

  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  var load_ajax;
  var load = $('#exit').click(function() {
      if(load_ajax) load_ajax.abort();
      var data = {
          domen: $('[data-calc="domen"]').val(),
          start_date: $('[data-calc="start_date"]').val(),
          end_date: $('[data-calc="end_date"]').val(),
          count: $('[count-name="count"]').val(),
          chek_sr_v: $('#per_vis:checked').val(),
          chek_visit: $('#vis:checked').val(),
          chek_traf: $('#traf:checked').val(),
          chek_sel_traf: $('[class="select_traf"]').val(),
          chek_descvsmob: $('#vs:checked').val(),
          chek_simmilar: $('#sm:checked').val(),
          chek_keyogr: $('#keysorg:checked').val(),
          chek_keypay: $('#keyspay:checked').val(),
          chek_comorg: $('#comorg:checked').val(),
          chek_compay: $('#compay:checked').val(),
          chek_refin: $('#refin:checked').val(),
          chek_refout: $('#refout:checked').val()
      };
      load_ajax = $.post('/functions.php', data, function (resp) {
          $('.result').html(resp);
          $('body,html').animate({
              scrollTop: 0
          }, 400);

      });
      load_ajax = $.post('/getquerycount.php', data, function (resp) {
          $('.query-count').html(resp);
          $('body,html').animate({
              scrollTop: 0
          }, 400);

      });
  });


  </script>
</html>
