<?php

use desafioprojetolegado\Controller\{
    AuthController,
    UsuarioController,
};


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $url;

switch ($url) {
    case "/Desafio/desafioprojetolegado/":
        UsuarioController::index();
        break;

    case "/Desafio/desafioprojetolegado/login":
        AuthController::index();
        break;

    case "/Desafio/desafioprojetolegado/logar":
        AuthController::login();
        break;

    case "/Desafio/desafioprojetolegado/usuario/listar":
        UsuarioController::index();
        break;

    case "/Desafio/desafioprojetolegado/usuario/cadastrar":
        UsuarioController::cadastro();
        break;
}
