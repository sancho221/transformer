<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgb(0, 0, 0)">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                        <ul class="navbar-nav mr-auto text-center" id="dropdown-menu">         
                                <li class="nav-item mr-2">
                                        <a href="<?=base_url()?>classrooms/index" class="nav-link btn-sm mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_classroom}" aria-pressed="true">
                                        Мероприятия</a>
                                </li>
                                <li class="nav-item mr-2">
                                        <a href="<?=base_url()?>halls/index" class="nav-link btn-sm my-2 my-lg-0 px-5 text-white btn btn-outline-danger {active_hall}" aria-pressed="true">
                                        Выставки</a>
                                </li>
                                <li class="nav-item mr-2">   
                                        <a href="<?=base_url()?>schedules/index" class="nav-link btn-sm mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_schedule}" aria-pressed="true">
                                        Спорт</a>
                                </li>
                        </ul>
                </div>
        </nav>

</header>