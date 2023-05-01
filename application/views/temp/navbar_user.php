<header>  
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(0, 0, 17)">   
            <a class="navbar-brand" href="<?=base_url()?>home">
                <img src="<?=base_url()?>images/logo.png" height="30" alt="Логотип">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">
                <ul class="navbar-nav mr-auto text-center" id="dropdown-menu">
                    <li class="nav-item mr-2">   
                            <a href="<?=base_url()?>brons/index" class="nav-link mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_bron}" aria-pressed="true">Бронирование</a>
                    </li>
                    <li class="nav-item mr-2">   
                            <a href="<?=base_url()?>brons/history" class="nav-link mb-2 mb-lg-0 px-5 text-white btn btn-outline-danger {active_history}" aria-pressed="true">Просмотр заявок</a>
                    </li>
                </ul>
                <div class="form-inline ml-auto text-center">
                    <a href="<?=base_url()?>users/profile_user" class="btn btn-default btn-sm text-white">
                        <i class="fa fa-user"></i> Профиль
                    </a>
                    <a href="<?=base_url()?>users/out" class="btn btn-default btn-sm text-white">
                        <i class="fa fa-sign-out-alt"></i> Выход
                    </a>
                </div>
            </div>
        </nav>
</header>