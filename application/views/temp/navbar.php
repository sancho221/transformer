<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                        <a class="navbar-brand" href="<?=base_url('home/index')?>">
                            <img src="<?=base_url('image/logo.png')?>" width="40" height="40" class="bg-white rounded-circle">
                        </a>
                        <ul class="navbar-nav mr-auto text-center" id="dropdown-menu">  
                                <li class="nav-item {active_calculation}">
                                        <a href="<?=base_url('home/index')?>" class="nav-link" aria-pressed="true">
                                        Расчеты</a>
                                </li>      
                                <li class="nav-item {active_guide}">
                                        <a href="<?=base_url('home/guide')?>" class="nav-link" aria-pressed="true">
                                        Справочник</a>
                                </li>
                                <li class="nav-item {active_catalog}">
                                        <a href="<?=base_url('catalog/index')?>" class="nav-link" aria-pressed="true">
                                        Каталог трансформаторов</a>
                                </li>
                        </ul>
                </div>
        </nav>

</header>