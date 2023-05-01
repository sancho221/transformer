$(document).ready(function(){

//Гость
//Кружки
    // отображение описания
    $('#descriptionModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // ввод переменных (получение данных через атрибут data)
        var name_classroom = button.data('name_classroom');
        var description_classroom = button.data('description_classroom');
        // передача значений
        modal.find('h5[name="name_classroom"]').text(name_classroom);
        modal.find('p[name="description_classroom"]').text(description_classroom);
    })

});