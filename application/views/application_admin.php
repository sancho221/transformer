<?php
    include 'temp/head.php';
    include 'temp/navbar_admin.php';
?>

<div class="container-fluid pb-2">
    <div class="row">
        <div class="col-auto">
            <p class="h2 py-2">Заявки</p>
        </div>
        <div class="col-lg-1 py-2 mr-lg-auto">
            <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#insertModal">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col">
            <table id="table" class="table table-responsive-lg table-striped table-hover table-sm dataTable" width="100%" cellspacing="0">
                <thead class="bg-info text-light">
                    <tr>
                        <th class="col-1">id</th>
                        <th>ФИО</th>
                        <th>Контакт</th>
                        <th class="col-2">Фото</th>
                        <th>Название</th>
                        <th>Действие</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<form id="getForm">
    <div class="modal fade" id="getModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Просмотр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="getId" name="id">
                    <input type="hidden" id="getImage" name="image">
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Название</label>
                        <div class="col-6">
                            <input type="text" id="getTitle" name="title" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Класс точности</label>
                        <div class="col-6">
                            <input type="text" id="getAccuracy" name="accuracy" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Медная шина</label>
                        <div class="col-6">
                            <input type="text" id="getCopper" name="copper" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Номинальное напряжение (В)</label>
                        <div class="col-6">
                            <input type="text" id="getVoltage" name="voltage" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Номинальный первичный ток (А)</label>
                        <div class="col-6">
                            <input type="text" id="getFirst_current" name="first_current" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Вторичное подключение</label>
                        <div class="col-6">
                            <input type="text" id="getSecond_connect" name="second_connect" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Вторичная мощность (ВА)</label>
                        <div class="col-6">
                            <input type="text" id="getSecond_power" name="second_power" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Вторичный ток (А)</label>
                        <div class="col-6">
                            <input type="text" id="getSecond_current" name="second_current" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Защита от прикосновения</label>
                        <div class="col-6">
                            <input type="text" id="getSecurity" name="security" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Вес (кг)</label>
                        <div class="col-6">
                            <input type="text" id="getWeight" name="weight" class="form-control-plaintext" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-form-label">Высота (см)</label>
                        <div class="col-6">
                            <input type="text" id="getHeight" name="height" class="form-control-plaintext" readonly>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Принять заявку</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end InsertModal -->

<script type="text/javascript">
    
    // взаимодействие с формой добавления
    $('#insertForm').submit(function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url : '<?php echo base_url('catalog/insert'); ?>',
            data : formData,
            type : 'post',
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                if(result != 2){
                    $('#insertModal').modal('hide');
                    $('#insertForm')[0].reset();
                    alert('Данные успешно добавлены');
                }
                else if(result == 2)
                {
                    alert('Ошибка! Выберите медную шину, вторичное подключение и класс точности');
                }
                else if(result == 3)
                {
                    alert('Ошибка! Подходяшие форматы фото: jpg, jpeg, png');
                }
                $('#table').DataTable().ajax.reload();
            },
            error: function()
            {
                alert('Ошибка');
            }

        });
    });

    // загрузка данных в таблицу
    $(document).ready(function(){
        $('#table').DataTable({
            'ajax' : '<?php echo base_url('application/fetchDataforAdmin'); ?>',
            'order' : [],
            "bDestroy": true
        });
    });

    //получение данных
    function editFun(id)
    {
        $.ajax({
            url: '<?php echo base_url('application/getEditData'); ?>',
            method: 'post',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#getId').val(response.id);
                $('#getImage').val(response.image);

                $('#getTitle').val(response.title);
                $('#getAccuracy').val(response.accuracy);
                $('#getCopper').val(response.copper);
                $('#getVoltage').val(response.voltage);
                $('#getFirst_current').val(response.first_current);
                $('#getSecond_connect').val(response.second_connect);
                $('#getSecond_power').val(response.second_power);
                $('#getSecond_current').val(response.second_current);
                $('#getSecurity').val(response.security);
                $('#getWeight').val(response.weight);
                $('#getHeight').val(response.height);
                $('#getModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }
        })
    }

    //прием заявки
    $('#getForm').submit(function(event){
        event.preventDefault();
        $.ajax({
            url : '<?php echo base_url('application/success'); ?>',
            data : $('#getForm').serialize(),
            type : 'post',
            success: function(response){
                if(response == 1)
                {
                    $('#getModal').modal('hide');
                    $('#getForm')[0].reset();
                    alert('Заявка принята!');
                }
                else if(response == 5) alert('Такая запись имеется');
                else alert('Ошибка данных');
                $('#table').DataTable().ajax.reload();
            },
            error: function()
            {
                alert('Ошибка');
            }

        });
    });

    function deleteFun(id)
    {
        if(confirm('Вы хотите удалить?') == true)
        {
            $.ajax({
                url: '<?php echo base_url('application/deleteSingeData')?>',
                method: 'post',
                dataType: 'json',
                data:{id:id},
                success: function(response){
                    if(response == 1)
                    {
                        alert('Данные удалены');
                        $('#table').DataTable().ajax.reload();
                    }
                    else if(response == 2) alert('Ошибка удаления');
                }
            })
        }
    }

</script>

<?php
    include 'temp/footer.php';
?>