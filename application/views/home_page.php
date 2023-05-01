<?php
    include 'temp/head.php';    //подкл шапки
    include 'temp/navbar.php';  //подкл панели
?>
<div class="navbar bg-info p-1"></div>
<div class="navbar"></div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col py-2">
      <h2 class="text-center">Добро пожаловать в наш детский развлекательный центр "Эврика"</h2>
      <p class="text-weight-light" style="font-size: 20px;">В развлекательном центре большое количество кружков для детей разных возрастных групп. Каждый ребенок найдет для себя что-то интересное и познавательное, о чем будет рассказывать родным или своим друзьям.</p>
    </div>
  </div>
</div>

<div class="col-8 offset-2 d-none d-md-block d-lg-block d-xl-block">
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?=base_url()?>images/1.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="<?=base_url()?>images/2.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="<?=base_url()?>images/3.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="<?=base_url()?>images/4.jpg" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="<?=base_url()?>images/5.jpg" class="d-block w-100">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php
    include 'temp/footer.php';    //подкл подвала
?>