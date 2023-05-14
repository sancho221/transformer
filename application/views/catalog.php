<?php
    include 'temp/head.php';
    include 'temp/navbar.php';
?>

<div class="container py-2">
    <div class="row pb-2">
        <div class="col-2">
            <h3>Каталог</h3>
        </div>
        <div class="col-8 col-lg-5 offset-2">
            <input type="text" class="form-control" placeholder="Поиск">
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-lg-9">
            <form id="catalog" method="get">
            </form>
            <div class="card mb-3">
                <a class="row g-0 hoverblue" href="<?=base_url('catalog/detail')?>">
                    <div class="col-3 col-lg-2">
                        <img src="<?=base_url('image/logo2.jpg')?>" class="img-fluid rounded-start" style="height: 100px;">
                    </div>
                    <div class="col-9 col-lg-9">
                        <div class="card-body">
                            <h5>Трансформатор тока ТТК-30 150/5А кл. точн. 0.5 5В.А измерительный</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

<script>
    // загрузка данных
    $(document).ready(function(){
        // $.ajax({
        //     url: '<?=base_url('catalog/fetchDatafromDatabase')?>',
        //     type:'GET',
        //     success: function(response)
        //     {
        //         var data = JSON.parse(response);
        //         for(i in data){
        //             $('#catalog').append('<div>' + data[i].id + '</div>');
        //         }
        //     }
        // });


        $.ajax({
            url: '<?=base_url('catalog/fetchDataforCatalog')?>',
            success: function(result){
                let data = JSON.parse(result);
                for(i in data)
                {
                    if(data[i].image == null) data[i].image = 'image/not_photo.jpg';

                    $('#catalog').append(
                        `<div class="card mb-3">
                            <a class="row g-0 hoverblue" href="<?=base_url('catalog/detail')?>?id=${data[i].id}">
                                <div class="col-3 col-lg-2">
                                    <img src="<?=base_url('${data[i].image}')?>" class="img-fluid rounded-start" style="height: 100px;">
                                </div>
                                <div class="col-9 col-lg-9">
                                    <div class="card-body">
                                        <h5>${data[i].title}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>`
                    );
                        // data[i].id + ' ' + data[i].title + '<br>');
                }
                
            }
        });

    });

</script>


<?php include 'temp/footer.php'; ?>