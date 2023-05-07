<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                        <a class="navbar-brand" href="<?=base_url('')?>">
                                <img src="<?=base_url('image/admin.jpg')?>" width="40" height="40" class="rounded-circle">
                        </a>
                        <ul class="navbar-nav mr-auto text-center" id="dropdown-menu">  
                                <li class="nav-item">
                                        <a href="<?=base_url('')?>" class="nav-link" aria-pressed="true">
                                        Каталог</a>
                                </li>      
                                <li class="nav-item">
                                        <a href="<?=base_url('')?>" class="nav-link" aria-pressed="true">
                                        Заявки</a>
                                </li>
                        </ul>
                        <ul class="navbar-nav ml-auto text-center">
                                <li class="nav-item">
                                <a class="nav-link ml-auto" href="<?=base_url('home/out')?>" aria-pressed="true">Выход</a>    
                                </li>
                        </ul>
                        
                </div>
        </nav>

</header>