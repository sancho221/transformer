<?php
    include 'temp/head.php';
?>

<body class="background">
  <div class="container" style="height: 100vh;">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-4 bg-light rounded">
        <?=form_open('home/input')?>
          <h3 class="text-center">Авторизация</h3>
          <div class="form-group row px-3 pt-3">
            <input class="form-control" type="text" name="login" placeholder="Логин" required>
          </div>
          <div class="form-group row px-3 pt-2">
            <input class="form-control" type="password" name="password" placeholder="Пароль" required>
          </div>
          <div class="form-group row px-3 pt-2 pb-2">
            <?=form_submit('sign', 'Вход', 'class="btn btn-primary btn-block"')?>
            <a href="<?=base_url('home/index')?>" class="btn btn-secondary btn-block">На главную</a>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>

</body>