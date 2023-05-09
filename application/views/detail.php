<?php
    include 'temp/head.php';
    include 'temp/navbar.php';
?>

<div class="container py-2">
    <form>
        <div class="row pb-2">
            <div class="col-2">
                <h3>Каталог</h3>
            </div>
            <div class="col-8 col-lg-5 offset-2">
                <input type="text" class="form-control" placeholder="Поиск">
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-3 rounded">
                    <img src="<?=base_url('image/logo2.jpg')?>" class="img-fluid rounded-start" style="height: 300px;">
                </div>
                <div class="col-8 m-auto offset-1">
                    <h5>Трансформатор тока ТТК-30 150/5А кл. точн. 0.5 5В.А измерительный</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5>Технические характеристики:</h5>
                    <p><b>Класс точности:</b> 0.5</p>
                    <p><b>Медная шина:</b> Да</p>
                    <p><b>Номинальное напряжение:</b> 660 В</p>
                    <p><b>Первичный ток:</b> 150 А</p>
                    <p><b>Вторичное подключение:</b> Винтовое соединение</p>
                    <p><b>Вторичная мощность:</b> 5 ВА</p>
                    <p><b>Вторичный номинальный ток:</b> 5 А</p>
                    <p><b>Защита от прикосновения:</b> Да</p>
                    <p><b>Вес:</b> 0.5 кг</p>
                    <p><b>Высота:</b> 10.5 см</p>
                </div>
            </div>
        </div>
    </div>

  



</div>


<?php include 'temp/footer.php'; ?>