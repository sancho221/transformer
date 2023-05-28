<?php
    include 'temp/head.php';
    include 'temp/navbar.php';
?>

<div class="container py-2">
    <div class="row pb-2">
        <div class="col-auto">
            <h3>Каталог</h3>
        </div>
        <div class="col-auto">
            <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#insertModal">
                <i class="fa fa-plus" aria-hidden="true"></i> Подать заявку
            </button>
        </div>
        <div class="col-8 col-lg-5 offset-lg-1">
            <input id="search" name="search" type="text" class="form-control" placeholder="Поиск">
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-9">
            <form id="catalog" method="get">
            </form>
        </div>
    </div>

</div>

<!-- Insert Modal -->
<form id="insertForm" enctype="multipart/form-data">
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавление</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="fio" class="form-control" placeholder="Введите ФИО" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Введите контактный телефон" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Введите название" required>
                    </div>
                    <div class="form-group">
                        <select name="accuracy" class="form-control" required>
                            <option value="0">Выберите класс точности</option>
                            <option>0.1</option>
                            <option>0.2</option>
                            <option>0.5</option>
                            <option>1.0</option>
                            <option>3.0</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file">
                        <small class="form-text text-muted">Если нет фото, оставьте поле пустым.</small>
                    </div>
                    <div class="form-group">
                        <select name="copper" class="form-control" required>
                            <option value="0">Имеется медная шина?</option>
                            <option>Да</option>
                            <option>Нет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="voltage" class="form-control" placeholder="Номинальное напряжение, В" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="first_current" class="form-control" placeholder="Номинальный первичный ток, А" required>
                    </div>
                    <div class="form-group">
                        <select name="second_connect" class="form-control" required>
                            <option value="0">Какое вторичное подключение?</option>
                            <option>Винтовое соединение</option>
                            <option>Разъемное (штекерное) соединение</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="second_power" class="form-control" placeholder="Вторичная мощность, ВА" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="second_current" class="form-control" placeholder="Номинальный вторичный ток, А" required>
                    </div>
                    <div class="form-group">
                        <select name="security" class="form-control" required>
                            <option value="0">Включает защиту от прикосновения?</option>
                            <option>Да</option>
                            <option>Нет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" step="0.1" name="weight" class="form-control" placeholder="Вес, кг" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="height" class="form-control" placeholder="Высота, см" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end InsertModal -->


<script type="text/javascript">
    // загрузка данных
    $(document).ready(function(){

        // взаимодействие с формой добавления
        $('#insertForm').submit(function(event){
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url : '<?php echo base_url('application/insert'); ?>',
                data : formData,
                type : 'post',
                cache: false,
                processData: false,
                contentType: false,
                success: function(result){
                    if(result != 2){
                        $('#insertModal').modal('hide');
                        $('#insertForm')[0].reset();
                        alert('Заявка оставлена');
                    }
                    else if(result == 2)
                    {
                        alert('Ошибка! Выберите медную шину, вторичное подключение и класс точности');
                    }
                    else if(result == 3)
                    {
                        alert('Ошибка! Подходяшие форматы фото: jpg, jpeg, png');
                    }
                }
            });
        });

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
                }  
            }
        });

        $('#search').keyup(function(){
            let text = $(this).val();
            $('div .card').hide();
            $("div .card:containsi('" + text + "')").show();
            if(text == '') $("div .card").show();
        });

        $.extend($.expr[':'], {
            'containsi': function(elem, i, match, array)
            {
                return (elem.textContent || elem.innerText || '').toLowerCase()
                .indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

    });

</script>


<?php include 'temp/footer.php'; ?>