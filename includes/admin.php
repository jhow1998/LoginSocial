<?php

 //retorn as informações do usuario  
 $info = \App\Session\User::getInfo();
?>

<h1>Admin - Joseph</h1>

<p>Olá, <b><?=$info['name']?></b> Seja muito bem-vindo(a) ao painel administrativo !</p>

<a href="logout.php">
   <button class='btn btn-danger'> sair</button>
</a>


