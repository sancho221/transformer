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
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>

    <div id="catalog"></div>
  
<script>

    $(document).ready(function(){

        var url_string = window.location.href,
            id = (new URL(url_string)).searchParams.get("id");

        $.ajax({
            url: '<?php echo base_url('catalog/getDataGet'); ?>',
            data: {id: id},
            success: function(result){
                let data = JSON.parse(result);
                if(data.image == null) data.image = 'image/not_photo.jpg';
                $('#catalog').append(`
                <div class="row">
                    <div class="col-12 col-lg-9 border border-secondary border-bottom-0 rounded" style="border-width:2px !important;">
                        <div class="row">
                            <div class="col-4 border-top border-light rounded" style="border-width:3px !important;">
                                <img src="<?=base_url('${data.image}')?>" class="img-fluid rounded-start" style="height: 200px;">
                            </div>
                            <div class="col-8 m-auto">
                                <h5>${data.title}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border-top border-bottom border-dark rounded p-3" style="border-width:3px !important;">
                                <h5>Технические характеристики:</h5>
                                <div class="row">
                                    <p class="col-5"><b>Класс точности:</b></p>
                                    <div class="col">${data.accuracy}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Медная шина:</b></p>
                                    <div class="col">${data.copper}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Номинальное напряжение:</b></p>
                                    <div class="col">${data.copper}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Первичный ток:</b></p>
                                    <div class="col">${data.voltage}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Вторичное подключение:</b></p>
                                    <div class="col">${data.second_connect}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Вторичная мощность:</b></p>
                                    <div class="col">${data.second_power}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Вторичный номинальный ток:</b></p>
                                    <div class="col">${data.second_current}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Защита от прикосновения:</b></p>
                                    <div class="col">${data.security}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Вес:</b></p>
                                    <div class="col">${data.weight}</div>
                                </div>
                                <div class="row">
                                    <p class="col-5"><b>Высота:</b></p>
                                    <div class="col">${data.height}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
                `);
            }
        });

    });
</script>



</div>


<?php include 'temp/footer.php'; ?>