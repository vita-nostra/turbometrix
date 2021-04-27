<?php
if ($_COOKIE ['login'] != '') {header ('Location: /main.php');
   exit();}
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
  <body>
 <main class="body-singin">
   <div class="container">
     <div class="text-center row">
      <form class="form-singin" method="post" >
       <img class="mb-4" src="img/logo.png">
       <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, войдите</h1>
       <label for="inputLogin" class="sr-only">Login</label>
       <input type="login" id="inputLogin" class="form-control" placeholder="Логин" required="" autofocus="">
       <label for="inputPassword" class="sr-only">Пароль</label>
       <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
       <div class="alert alert-danger" id ="error_alert"></div>
       <button class="btn btn-lg btn-primary btn-block login" type="button" id="singin">Войти</button>
       <p class="mt-5 mb-3 text-muted">© 2020</p>
     </form>
     </div>
   </div>
 </main>
</body>
</html>

<??>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#singin').click(function(){
  var login = $('#inputLogin').val();
  var password = $('#inputPassword').val();

  $.ajax ({
    url: 'auth.php',
    type: 'POST',
    cache: false,
    data: {'login' : login, 'password' : password },
    dataType: 'html',
    success: function(data){
      if (data == 'успех') {
          window.location = "main.php";
      }
        else {
          $('#error_alert').show();
          $('#error_alert').text(data);
        }
    }
  });
});
</script>
</html>
