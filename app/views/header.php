<?

use Libs\App; ?>
<!doctype html>
<html>

    <head>
        <script>
            window.BASE_DIR_AJAX = "<?= BASE_DIR_AJAX ?>";


        </script>

        <title>
<?= $this->getTitle(); ?>
        </title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="<?= TEMPLATE_PATH ?>/style.css?<?= rand() ?>" rel="stylesheet"/>
        <link href="<?= MAIN_PREFIX ?>/app/css/preloader12.css?<?= rand() ?>" rel="stylesheet"/>


        <script src="<?= TEMPLATE_PATH ?>/script.js?<?= rand() ?>"></script>

        <? if (isset($this->addjs)): ?>
            <script type ="text/javascript" src="<?= $this->addjs ?>?<?= rand() ?>"></script>
        <? endif ?>
        <? if (isset($this->addcss)): ?>
            <link rel="stylesheet" href="<?= $this->addcss ?>?<?= rand() ?>">
<? endif ?>


        <--#ADD_CSS_PATHS#-->

        <--#ADD_JS_PATHS#-->
    </head>

    <body>





        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-transparent  ">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">Restaurant</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= MAIN_PREFIX ?>/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= MAIN_PREFIX ?>/catalog/">Каталог</a>
                        </li>
                       
                        
<? if (Libs\User::isLogin()): ?>
                            <li class="nav-item ">

                                <a class="nav-link" href="<?= MAIN_PREFIX ?>/lk/"><?= Libs\User::getLogin() ?></a>  

                            </li>
                            <? endif ?>
                        <li class="nav-item ">
                            <? if (Libs\User::isLogin()): ?>
                                <a class="nav-link" href="<?= MAIN_PREFIX ?>/reg/logout/">Выйти</a>  
                            <? else: ?>
                                <a class="nav-link login_link" href="javascript:;" onclick="openDialogLogin()"  >Войти</a>
                        <? endif ?>

                        </li>
<? if (!Libs\User::isLogin()): ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= MAIN_PREFIX ?>/reg/">Регистрация</a>   
                            </li>
                        <? endif ?>


<? if (Libs\User::isAdmin()): ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= MAIN_PREFIX ?>/admin/">Админ панель</a>   
                            </li>
<? endif ?>

                    </ul>

                </div>
            </div>
        </nav>


