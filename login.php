<?php

require __DIR__.'/vendor/autoload.php';

use Google\Client as GoogleClient;
use \App\Session\User;

//validação principal do cookie

//verifica os campos obrigatorios

if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
    header('location: index.php');
    exit;
}

//cookie csrf
$cookie = $_COOKIE['g_csrf_token'] ?? '';
if($_POST['g_csrf_token'] != $cookie){
   
    header('location: index.php');
    exit; 
}

//validação secundaria do token

//instancia do cliente google
$client = new GoogleClient(['client_id' => '936898946569-4p2dotu27h2ok08fbf2h7l1k9nqvlgb9.apps.googleusercontent.com']);

//Obtem os dados do usuario na base no jwt
$payload = $client->verifyIdToken($_POST['credential']);

//verifica os dados do payload
if(isset($payload['email'])) {

  User::login($payload['name'],$payload['email']);
  header('location: index.php');
    exit; 

} 

//poblemas ao consulta API

die('Problemas ao consulta API');
