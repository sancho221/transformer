<?php
    include 'temp/head.php';
    include 'temp/navbar.php';
?>

<div class="container-fluid py-2">
  <div class="row">
    <div class="col-10 offset-1">

      <h3>Расчёты</h3>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Первичная обмотка</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Вторичная обмотка</a>
        </div>
      </nav>
      <div class="tab-content p-2" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

          <div class="row">
            <p class="lead font-italic" style="font-size: 18px;">Все поля ввести в числовых значениях. Вводить единицу измерения не нужно!</p>
          </div>

          <div class="row"> 
            <div class="col-12 col-lg-5 border border-warning pr-lg-4 p-lg-3 border-left-0" style="border-width:3px !important;">
              
            <h4>Коэффициент трансформации</h4>
            <p class="text-muted" style="font-size:14px;">Можно узнать по маркировке трансформатора, например 200/5, соответственно ввести первое и второе значение.</p>
              <form id="rate">
                <div class="form-row">
                  <div class="form-group col-12 col-lg-5">
                    <input class="form-control" type="number" name="first_current_r" placeholder="Введите первичный ток, А" required>
                  </div>
                  <div class="form-group col-12 col-lg-5">
                    <input class="form-control" type="number" name="second_current_r" placeholder="Введите вторичный ток, А" required>
                  </div>
                  <div class="form-group col-1">
                    <button type="submit" class="btn btn-dark">Рассчитать</button>
                  </div>
                </div>
                <div id="answer_rate"></div>
              </form>

            </div>

            <div class="col-12 col-lg-5 border border-info ml-lg-3 p-lg-3 border-right-0" style="border-width:3px !important;">

              <h4>Проверка измерительного трансформатора</h4>
              <p class="text-muted" style="font-size:14px;">Коэф. можно узнать по маркировке трансформатора, например 200/5, соответственно ввести первое и второе значение.</p>
              <p><small class="form-text text-muted">Класс точности для измерительных трансформаторов по умолчанию 0,5 и 0,5s. <br>Потребляемый ток < первичного тока трансформатора тока, иначе он не подойдет.</small></p>
              
              <form id="verify">
                <div class="form-row">
                  <div class="form-group col-12 col-lg-6">
                    <input class="form-control" type="number" name="first_current_v" placeholder="Введите первичный ток, А" required>
                  </div>
                  <div class="form-group col-12 col-lg-6">
                    <input class="form-control" type="number" name="second_current_v" placeholder="Введите вторичный ток, А" required>
                  </div>
                  <div class="form-group col-12 col-lg-6">
                    <input class="form-control" type="number" name="current_v" placeholder="Введите потребляемый ток, А" required>
                    
                  </div>
                  <div class="form-group col-12 col-lg-6">
                    <input class="form-control" type="number" name="min_load_v" placeholder="Введите минимальную нагрузку, А" required>
                  </div>
                  <div class="form-group col-1">
                    <button type="submit" class="btn btn-dark">Рассчитать</button>
                  </div>
                </div>
                <div id="answer_verify"></div>
              </form>

            </div>



          </div>

        </div>



        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Номер два</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Третий</div>
      </div>

    </div>
  </div>
</div>


<script>

  $(document).ready(function(){
    //коэффициент трансформации
    $('#rate').submit(function(e){
      var first = parseInt($('input[name=first_current_r]').val()),
          second = parseInt($('input[name=second_current_r]').val()),
          result = first / second;
      e.preventDefault();
      if(first > second && isFinite(result)){
        $('#answer_rate').find('p').remove();
        $('#answer_rate').append('<p><b>Коэфф. трансформации = </b> ' + result + '</p>');
      }
      else if(!isFinite(result)) alert('Ошибка! Значение не должно = 0');
      else alert('Ошибка! Первое значение должно > второго');
    });

    //проверка ИТ
    $('#verify').submit(function(e){
      var first = parseInt($('input[name=first_current_v]').val()),     //первичный ток
          second = parseInt($('input[name=second_current_v]').val()),   //вторичный ток
          current = parseInt($('input[name=current_v]').val()),         //потребляемый ток
          min_load = parseInt($('input[name=min_load_v]').val()),       //мин нагрузка

          rate = first / second,                                        //коэф трансформации
          nominal_current = current / rate,                             //ток вторичной обмотки при номинальном токе
          min_current = second * rate / 100;                            //мин ток вторичной обмотки при номинальной нагрузке
      e.preventDefault();

      if(first > second && current < first && isFinite(first) && isFinite(second)){
        if(nominal_current > min_current){
          var second_current_min = min_load / rate,                       //ток вторичной обмотки при минимальном токе
              min_second_current = second * second / 100;                 //мин ток вторичной обмотки при минимальной нагрузке    
          if(second_current_min > min_second_current)
          {
            var current_25 = current * 25/100,                            //ток при 25% нагрузке
                second_current_25 = current_25 / rate,                    //ток во вторичной нагрузке при 25% нагрузке
                second_25 = second * 10/100;                              //мин ток вторичной обмотки при 25% нагрузке
            if(second_current_25 > second_25)
            {
              var result = true;
              $('#answer_verify').find('p, #answer, #detail').remove();
              $('#answer_verify').append('<p><b>Вывод:</b> измерительный трансформатор ' + first + '/' + second + ' для нагрузки ' + current + 'А выбран правильно.</p>');
              $('#answer_verify').append(
                `<button class="btn btn-info" id="detail">Подробнее</button>
                  <div id="v_answer" class="d-none">
                    <p>Проверка</p>
                  </div>
                `);
                  // <div class="d-none" id="answer">
                  //   <p><b>` + current + `/` + rate ` = ` + nominal_current + `А</b> - ток вторичной обмотки при номинальном токе.</p>
                  //   <p><b></b> - минимальный ток вторичной обмотки при номинальной нагрузке</p>
                  //   <p><b></b> - требование выполнено</p>
                  //   <p><b></b> - ток вторичной обмотки при минимальном токе</p>
                  //   <p><b></b> - минимальный ток вторичной обмотки при минимальной нагрузке </p>
                  //   <p><b></b> - требование выполнено</p>
                  //   <p><b></b> - ток при 25% нагрузке</p>
                  //   <p><b></b> - ток во вторичной нагрузке при 25% нагрузке</p>
                  //   <p><b></b> - минимальный ток вторичной обмотки при 25% нагрузке</p>
                  //   <p><b></b> - требование выполнено</p>
                  // </div>`);
            }
          }   
        }
      }
      else if(current > first) alert('Ошибка! Трансформатор не предназначен для такой нагрузки');
      else alert('Ошибка! Недопустимые значения');
    });   

  });
  
    $('#detail').on('click', function(){
      $('#v_answer').toggleClass(display);
    });


</script>


<?php include 'temp/footer.php'; ?>