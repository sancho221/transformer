<?php
    include 'temp/head.php';    //подкл шапки
    include 'temp/navbar_admin.php';    //подкл
?>

<div class="container-fluid pb-2">
    <div class="row">
        <div class="col">
            <p class="h2 py-2">Информация</p>
        </div>
        <div class="col-auto py-2 ml-lg-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Добавить</button>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col">
            <table id="table" class="table table-responsive-lg table-striped table-hover table-sm dataTable" width="100%" cellspacing="0">
                <thead class="bg-info text-light">
                    <tr>
                        <th>id</th>
                        <th>Имя</th>
                        <th>Возраст</th>
                        <th>Действие</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

<!-- Insert Modal -->
<form id="insertForm">
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
                        <input type="text" name="name" class="form-control" placeholder="Название" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="age" class="form-control" placeholder="Возраст" required>
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
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <input type="text" name="name" id="editName" class="form-control" placeholder="Название" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="age" id="editAge" class="form-control" placeholder="Возраст" required>
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
        $.ajax({
            url : '<?php echo base_url('catalog/insert'); ?>',
            data : $('#insertForm').serialize(),
            type : 'post',
            async : false,
            dataType : 'json',
            success: function(response){
                $('#insertModal').modal('hide');
                $('#insertForm')[0].reset();
                alert('Данные успешно добавлены');
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
            'ajax' : '<?php echo base_url('home/fetchDatafromDatabase'); ?>',
            'order' : [],
            "bDestroy": true
        });
    });

    //получение данных для изменения
    function editFun(id)
    {
        $.ajax({
            url: '<?php echo base_url('home/getEditData'); ?>',
            method: 'post',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#editId').val(response.id);
                $('#editName').val(response.name);
                $('#editAge').val(response.age);
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
        $.ajax({
            url : '<?php echo base_url('home/update'); ?>',
            data : $('#editForm').serialize(),
            type : 'post',
            async : false,
            dataType : 'json',
            success: function(response){
                $('#editModal').modal('hide');
                $('#editForm')[0].reset();
                if(response == 1)
                {
                    alert('Данные успешно изменены');
                }
                else{
                    alert('Ошибка данных');
                }
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
                url: '<?php echo base_url('home/deleteSingeData')?>',
                method: 'post',
                dataType: 'json',
                data:{id:id},
                success: function(response){
                    if(response == 1)
                    {
                        alert('Данные удалены');
                        $('#table').DataTable().ajax.reload();
                    }
                    else{
                        alert('Ошибка удаления');
                    }
                }
            })
        }
    }

</script>

<?php
    include 'temp/footer.php';
?>