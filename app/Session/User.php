<?php

namespace App\Session;

class User{

    /**
     * Método responsavel por inicia a sessao
     * @return boolean
     */
    private static function init(){

        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
    }

    /**
     * método responsavel por definir a sessao de login usuario
     * @param  []
     * 
     *
     */
    public static function login($name , $email){
        //inicia a sessão da aplicação
        self::init();

        //define a sessao do usuario
        $_SESSION['user'] = [
            'name' =>$name,
            'email' => $email
        ];
    }

    /**
     * Metodo responsalvel por verifica se esta logado
     */
    public static function isLogged(){
        self::init();

        return isset($_SESSION['user']);
    }

    //metodo responsavel por retorna as informações na sessao usuario
    public static function getInfo(){
        self::init();

        return $_SESSION['user'] ?? [];
    }

    public static function logout(){
        //inicia a sessao
        self::init();


        //desloga usuario
        unset($_SESSION['user']);

        //redireciona o Usuario para a pagina inicial
       
    }

}
