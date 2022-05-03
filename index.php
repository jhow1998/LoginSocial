<?php

//autoload composer
require __DIR__.'/vendor/autoload.php';

use \App\Session\User as SessionUser;

//header
include __DIR__.'/includes/header.php';

//corpo da pagina
include  SessionUser::isLogged() ? 
    __DIR__.'/includes/admin.php' :
    __DIR__.'/includes/login.php';

//footer
include __DIR__.'/includes/footer.php';

?>