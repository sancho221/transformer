<?php
    include 'temp/head.php';
    include 'temp/navbar_admin.php';
?>

<div class="container-fluid pb-2">
    <div class="row">
        <div class="col-auto">
            <p class="h2 py-2">Каталог</p>
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
                        <th class="col-2">Фото</th>
                        <th>Название</th>
                        <th>Действие</th>
                    </tr>
                </thead>
            </table>
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

<!-- editModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Изменение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <input type="text" id="editTitle" name="title" class="form-control" placeholder="Введите название" required>
                    </div>
                    <div class="form-group">
                        <select id="editAccuracy" name="accuracy" class="form-control" required>
                            <option value="0">Выберите класс точности</option>
                            <option>0.1</option>
                            <option>0.2</option>
                            <option>0.5</option>
                            <option>1.0</option>
                            <option>3.0</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" id="editImage" name="image" class="form-control-file">
                        <small class="form-text text-muted">Если не хотите изменить фото, оставьте поле пустым.</small>
                    </div>
                    <div class="form-group">
                        <select id="editCopper" name="copper" class="form-control" required>
                            <option value="0">Имеется медная шина?</option>
                            <option>Да</option>
                            <option>Нет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" id="editVoltage" name="voltage" class="form-control" placeholder="Номинальное напряжение, В" required>
                    </div>
                    <div class="form-group">
                        <input type="number" id="editFirst_current" name="first_current" class="form-control" placeholder="Номинальный первичный ток, А" required>
                    </div>
                    <div class="form-group">
                        <select id="editSecond_connect" name="second_connect" class="form-control" required>
                            <option value="0">Какое вторичное подключение?</option>
                            <option>Винтовое соединение</option>
                            <option>Разъемное (штекерное) соединение</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" id="editSecond_power" name="second_power" class="form-control" placeholder="Вторичная мощность, ВА" required>
                    </div>
                    <div class="form-group">
                        <input type="number" id="editSecond_current" name="second_current" class="form-control" placeholder="Номинальный вторичный ток, А" required>
                    </div>
                    <div class="form-group">
                        <select id="editSecurity" name="security" class="form-control" required>
                            <option value="0">Включает защиту от прикосновения?</option>
                            <option>Да</option>
                            <option>Нет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" step="0.1" id="editWeight" name="weight" class="form-control" placeholder="Вес, кг" required>
                    </div>
                    <div class="form-group">
                        <input type="number" id="editHeight" name="height" class="form-control" placeholder="Высота, см" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end editModal -->


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
            'ajax' : '<?php echo base_url('catalog/fetchDataforAdmin'); ?>',
            'order' : [],
            "bDestroy": true
        });
    });

    //получение данных для изменения
    function editFun(id)
    {
        $.ajax({
            url: '<?php echo base_url('catalog/getEditData'); ?>',
            method: 'post',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#editId').val(response.id);
                $('#editTitle').val(response.title);
                $('#editAccuracy').val(response.accuracy);
                $('#editCopper').val(response.copper);
                $('#editVoltage').val(response.voltage);
                $('#editFirst_current').val(response.first_current);
                $('#editSecond_connect').val(response.second_connect);
                $('#editSecond_power').val(response.second_power);
                $('#editSecond_current').val(response.second_current);
                $('#editSecurity').val(response.security);
                $('#editWeight').val(response.weight);
                $('#editHeight').val(response.height);
                $('#editModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }
        })
    }

    //изменение данных
    $('#editForm').submit(function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url : '<?php echo base_url('catalog/update'); ?>',
            data : formData,
            type : 'post',
            cache: false,
            processData: false,
            contentType: false,
            success: function(response){
                if(response == 1)
                {
                    $('#editModal').modal('hide');
                    $('#editForm')[0].reset();
                    alert('Данные успешно изменены');
                }
                else if(response == 4) alert('Ошибка! Выберите медную шину, вторичное подключение и класс точности');
                else if(response == 5) alert('Ошибка! Такое название имеется, выберите другое');
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
                url: '<?php echo base_url('catalog/deleteSingeData')?>',
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