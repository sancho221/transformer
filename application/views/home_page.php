<?php
    include 'temp/head.php';
    include 'temp/navbar.php';
?>

<div class="container-fluid py-2">
  <div class="row">
    <div class="col-10 offset-1">

      <h3>Расчёты</h3>
      <p class="lead font-italic" style="font-size: 18px;">Все поля ввести в числовых значениях. Вводить единицу измерения не нужно!</p>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">Общие</a>
          <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Размеры</a>
          <a class="nav-item nav-link" id="nav-check-tab" data-toggle="tab" href="#nav-check" role="tab" aria-controls="nav-check" aria-selected="false">Проверка</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Первичная обмотка</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Вторичная обмотка</a>
        </div>
      </nav>
      <div class="tab-content p-2" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
          <div class="row">

            <div class="col-12 col-lg-5 border border-warning pr-lg-4 p-lg-3 border-left-0" style="border-width:3px !important;">
              <h4>Напряжение - U (Вольт)</h4>
                <form id="voltage">
                  <div class="form-check">
                    <input id="v_pi" class="form-check-input" type="radio" name="v_check" value="1">
                    <label for="v_pi" class="form-check-label">По мощности и силе тока (P и I)</label>
                  </div>
                  <div class="form-check">
                    <input id="v_ir" class="form-check-input" type="radio" name="v_check" value="2">
                    <label for="v_ir" class="form-check-label">По силе тока и сопротивлению (I и R)</label>
                  </div>
                  <div class="form-check">
                    <input id="v_pr" class="form-check-input" type="radio" name="v_check" value="3">
                    <label for="v_pr" class="form-check-label">По мощности и сопротивлению (P и R)</label>
                  </div>
                  <div class="form-row v_voltage">
                    <div class="form-group col-12 col-lg-5 v_power">
                      <input class="form-control" type="number" name="v_power" placeholder="Введите мощность, Вт">
                    </div>
                    <div class="form-group col-12 col-lg-5 v_current">
                      <input class="form-control" type="number" name="v_current" placeholder="Введите силу тока, А">
                    </div>
                    <div class="form-group col-12 col-lg-5 v_resist">
                      <input class="form-control" type="number" name="v_resist" placeholder="Введите сопротивление, Ом">
                    </div>
                    <div class="form-group col-1">
                      <button type="submit" class="btn btn-dark">Рассчитать</button>
                    </div>
                  </div>
                  <div id="g_voltage"></div>
                </form>
              </div>

              <div class="col-12 col-lg-5 border border-info ml-lg-3 p-lg-3 border-right-0" style="border-width:3px !important;">
                <h4>Сила тока - I (Ампер)</h4>
                <form id="current">
                  <div class="form-check">
                    <input id="c_pi" class="form-check-input" type="radio" name="c_check" value="1">
                    <label for="c_pi" class="form-check-label">По мощности и напряжению (P и U)</label>
                  </div>
                  <div class="form-check">
                    <input id="c_ir" class="form-check-input" type="radio" name="c_check" value="2">
                    <label for="c_ir" class="form-check-label">По мощности и сопротивлению (P и R)</label>
                  </div>
                  <div class="form-check">
                    <input id="c_pr" class="form-check-input" type="radio" name="c_check" value="3">
                    <label for="c_pr" class="form-check-label">По напряжению и сопротивлению (U и R)</label>
                  </div>
                  <div class="form-row current">
                    <div class="form-group col-12 col-lg-5 c_power">
                      <input class="form-control" type="number" name="c_power" placeholder="Введите мощность, Вт">
                    </div>
                    <div class="form-group col-12 col-lg-5 c_voltage">
                      <input class="form-control" type="number" name="c_voltage" placeholder="Введите напряжение, В">
                    </div>
                    <div class="form-group col-12 col-lg-5 c_resist">
                      <input class="form-control" type="number" name="c_resist" placeholder="Введите сопротивление, Ом">
                    </div>
                    <div class="form-group col-1">
                      <button type="submit" class="btn btn-dark">Рассчитать</button>
                    </div>
                  </div>
                  <div id="g_current"></div>
                </form>
              </div>


              <div class="col-12 col-lg-5 border border-info pr-lg-4 p-lg-3 border-left-0 mt-2" style="border-width:3px !important;">
              <h4>Мощность - P (Ватт)</h4>
                <form id="power">
                  <div class="form-check">
                    <input id="p_pi" class="form-check-input" type="radio" name="p_check" value="1">
                    <label for="p_pi" class="form-check-label">По напряжению и силе тока (U и I)</label>
                  </div>
                  <div class="form-check">
                    <input id="p_ir" class="form-check-input" type="radio" name="p_check" value="2">
                    <label for="p_ir" class="form-check-label">По силе тока и сопротивлению (I и R)</label>
                  </div>
                  <div class="form-check">
                    <input id="p_pr" class="form-check-input" type="radio" name="p_check" value="3">
                    <label for="p_pr" class="form-check-label">По напряжению и сопротивлению (U и R)</label>
                  </div>
                  <div class="form-row power">
                    <div class="form-group col-12 col-lg-5 p_voltage">
                      <input class="form-control" type="number" name="p_voltage" placeholder="Введите напряжение, В">
                    </div>
                    <div class="form-group col-12 col-lg-5 p_current">
                      <input class="form-control" type="number" name="p_current" placeholder="Введите силу тока, А">
                    </div>
                    <div class="form-group col-12 col-lg-5 p_resist">
                      <input class="form-control" type="number" name="p_resist" placeholder="Введите сопротивление, Ом">
                    </div>
                    <div class="form-group col-1">
                      <button type="submit" class="btn btn-dark">Рассчитать</button>
                    </div>
                  </div>
                  <div id="g_power"></div>
                </form>
              </div>

              <div class="col-12 col-lg-5 border border-warning ml-lg-3 p-lg-3 border-right-0 mt-2" style="border-width:3px !important;">
                <h4>Сопротивление - R (Ом)</h4>
                <form id="resist">
                  <div class="form-check">
                    <input id="r_pi" class="form-check-input" type="radio" name="r_check" value="1">
                    <label for="r_pi" class="form-check-label">По напряжению и силе тока (U и I)</label>
                  </div>
                  <div class="form-check">
                    <input id="r_ir" class="form-check-input" type="radio" name="r_check" value="2">
                    <label for="r_ir" class="form-check-label">По мощности и силе тока (P и I)</label>
                  </div>
                  <div class="form-check">
                    <input id="r_pr" class="form-check-input" type="radio" name="r_check" value="3">
                    <label for="r_pr" class="form-check-label">По напряжению и мощности (U и P)</label>
                  </div>
                  <div class="form-row resist">
                    <div class="form-group col-12 col-lg-5 r_voltage">
                      <input class="form-control" type="number" name="r_voltage" placeholder="Введите напряжение, В">
                    </div>
                    <div class="form-group col-12 col-lg-5 r_current">
                      <input class="form-control" type="number" name="r_current" placeholder="Введите силу тока, А">
                    </div>
                    <div class="form-group col-12 col-lg-5 r_power">
                      <input class="form-control" type="number" name="r_power" placeholder="Введите мощность, Вт">
                    </div>
                    <div class="form-group col-1">
                      <button type="submit" class="btn btn-dark">Рассчитать</button>
                    </div>
                  </div>
                  <div id="g_resist"></div>
                </form>
              </div>




          </div>
        </div>


      
        <div class="tab-pane fade" id="nav-check" role="tabpanel" aria-labelledby="nav-check-tab">

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

    $('.v_voltage, .current, .power, .resist').hide();
    //при выборе чекбокса появляются соответствующие поля для ввода
    $("input[name=v_check]").change(function(){
        var radio = $(this).val();
        $('input[name=v_power], input[name=v_current], input[name=v_resist]').attr('required', true);
        $('.v_voltage').show();
        if(radio == 1){
          $('.v_power, .v_current').show();     
          $('.v_resist').hide();
          $('input[name=v_resist]').attr('required', false);
        }
        else if(radio == 2){
          $('.v_current, .v_resist').show();
          $('.v_power').hide();
          $('input[name=v_power]').attr('required', false);
        }
        else if(radio == 3){
          $('.v_power, .v_resist').show();
          $('.v_current').hide();
          $('input[name=v_current]').attr('required', false);
        }
    }); 

    //Напряжение
    $('#voltage').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '<?php echo base_url('calculations/getVoltage'); ?>',
        data: $('#voltage').serialize(),
        type: 'post',
        async: false,
        dataType:'text',
        success: function(data){
          if(data != 0){
            $('#g_voltage').find('p').remove();
            $('#g_voltage').append('<p><b>Напряжение = </b> ' + data + ' В</p>');
          }
        },
        error: function()
        {
          alert('Ошибка');
        }
      });
    });

    //при выборе чекбокса появляются соответствующие поля для ввода
    $("input[name=c_check]").change(function(){
      var radio = $(this).val();
      $('input[name=c_power], input[name=c_voltage], input[name=c_resist]').attr('required', true);
      $('.current').show();
      if(radio == 1){
        $('.c_power, .c_voltage').show();     
        $('.c_resist').hide();
        $('input[name=c_resist]').attr('required', false);
      }
      else if(radio == 2){
        $('.c_power, .c_resist').show();
        $('.c_voltage').hide();
        $('input[name=c_voltage]').attr('required', false);
      }
      else if(radio == 3){
        $('.c_voltage, .c_resist').show();
        $('.c_power').hide();
        $('input[name=c_power]').attr('required', false);
      }
    }); 

    //Сила тока
    $('#current').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '<?php echo base_url('calculations/getCurrent'); ?>',
        data: $('#current').serialize(),
        type: 'post',
        async: false,
        dataType:'text',
        success: function(data){
          if(data != 0){
            $('#g_current').find('p').remove();
            $('#g_current').append('<p><b>Сила тока = </b> ' + data + ' А</p>');
          }
        },
        error: function()
        {
          alert('Ошибка');
        }
      });
    });

    //при выборе чекбокса появляются соответствующие поля для ввода
    $("input[name=p_check]").change(function(){
    var radio = $(this).val();
    $('input[name=p_voltage], input[name=p_current], input[name=p_resist]').attr('required', true);
    $('.power').show();
    if(radio == 1){
        $('.p_voltage, .p_current').show();     
        $('.p_resist').hide();
        $('input[name=p_resist]').attr('required', false);
      }
      else if(radio == 2){
        $('.p_current, .p_resist').show();
        $('.p_voltage').hide();
        $('input[name=p_voltage]').attr('required', false);
      }
      else if(radio == 3){
        $('.p_voltage, .p_resist').show();
        $('.p_current').hide();
        $('input[name=p_current]').attr('required', false);
      }
    }); 

      //Мощность
      $('#power').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('calculations/getPower'); ?>',
        data: $('#power').serialize(),
        type: 'post',
        async: false,
        dataType:'text',
        success: function(data){
          if(data != 0){
            $('#g_power').find('p').remove();
            $('#g_power').append('<p><b>Мощность = </b> ' + data + ' Вт</p>');
          }
        },
        error: function()
        {
          alert('Ошибка');
        }
      });
    });

    //при выборе чекбокса появляются соответствующие поля для ввода
    $("input[name=r_check]").change(function(){
    var radio = $(this).val();
    $('input[name=r_voltage], input[name=r_current], input[name=r_power]').attr('required', true);
    $('.resist').show();
    if(radio == 1){
        $('.r_voltage, .r_current').show();     
        $('.r_power').hide();
        $('input[name=r_power]').attr('required', false);
      }
      else if(radio == 2){
        $('.r_power, .r_current').show();
        $('.r_voltage').hide();
        $('input[name=r_voltage]').attr('required', false);
      }
      else if(radio == 3){
        $('.r_voltage, .r_power').show();
        $('.r_current').hide();
        $('input[name=r_current]').attr('required', false);
      }
    }); 

      //Сопротивление
      $('#resist').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('calculations/getResist'); ?>',
        data: $('#resist').serialize(),
        type: 'post',
        async: false,
        dataType:'text',
        success: function(data){
          if(data != 0){
            $('#g_resist').find('p').remove();
            $('#g_resist').append('<p><b>Сопротивление = </b> ' + data + ' Ом</p>');
          }
        },
        error: function()
        {
          alert('Ошибка');
        }
      });
    });







    //коэффициент трансформации
    $('#rate').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('calculations/getRate'); ?>',
        data: $('#rate').serialize(),
        type: 'post',
        async: false,
        dataType:'text',
        success: function(data){
          if(data != 0){
            $('#answer_rate').find('p').remove();
            $('#answer_rate').append('<p><b>Коэфф. трансформации = </b> ' + data + '</p>');
          }
        },
        error: function()
        {
          alert('Ошибка');
        }
      });
    });

    $('#verify').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('calculations/getVerify'); ?>',
        data: $('#verify').serialize(),
        type: 'post',
        async: false,
        dataType:'text',
        success: function(data){
          if(data != 0){
            $('#answer_rate').find('p').remove();
            $('#answer_rate').append('<p><b>Коэфф. трансформации = </b> ' + data + '</p>');
          }
        },
        error: function()
        {
          alert('Ошибка');
        }
      });
    });















    // $('#rate').submit(function(e){
    //   var first = parseInt($('input[name=first_current_r]').val()),
    //       second = parseInt($('input[name=second_current_r]').val()),
    //       result = first / second;
    //   e.preventDefault();
    //   if(first > second && isFinite(result)){
    //     $('#answer_rate').find('p').remove();
    //     $('#answer_rate').append('<p><b>Коэфф. трансформации = </b> ' + result + '</p>');
    //   }
    //   else if(!isFinite(result)) alert('Ошибка! Значение не должно = 0');
    //   else alert('Ошибка! Первое значение должно > второго');
    // });

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