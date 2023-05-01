<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgb(0, 0, 0)">
                <a class="navbar-brand" href="<?=base_url()?>home">
                        <img src="<?=base_url()?>images/logo2.png" height="30" alt="Логотип">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                        <ul class="navbar-nav mr-auto text-center" id="dropdown-menu">         
                                <li class="nav-item mr-2">
                                        <a href="<?=base_url()?>classrooms/admin" class="nav-link mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_classroom}" aria-pressed="true">Кружки</a>
                                </li>
                                <li class="nav-item mr-2">
                                        <a href="<?=base_url()?>halls/admin" class="nav-link my-2 my-lg-0 px-5 text-white btn btn-outline-danger {active_hall}" aria-pressed="true">Комнаты</a>
                                </li>
                                <li class="nav-item mr-2">   
                                        <a href="<?=base_url()?>brons/admin" class="nav-link mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_bron}" aria-pressed="true">Бронирование</a>
                                </li>
                                <li class="nav-item mr-2">   
                                        <a href="<?=base_url()?>schedules/admin" class="nav-link mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_schedule}" aria-pressed="true">Расписание</a>
                                </li>
                                <li class="nav-item mr-2">   
                                        <a href="<?=base_url()?>users/admin" class="nav-link mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_user}" aria-pressed="true">Пользователи</a>
                                </li>
                        </ul>
                        <a href="<?=base_url()?>users/out" class="form-inline btn btn-default btn-sm text-white ml-auto">
                            <i class="fa fa-sign-out-alt"></i> Выход
                        </a>
                </div>
        </nav>
</header>