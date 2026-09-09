<?php

use desafioprojetolegado\Controller\{
    AuthController,
    UsuarioController,
    EventoController,
    SetorController,
};


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

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

    case "/Desafio/desafioprojetolegado/usuario/excluir":
        UsuarioController::excluir();
        break;

    case "/Desafio/desafioprojetolegado/evento/listar":
        EventoController::index();
        break;

    case "/Desafio/desafioprojetolegado/evento/form":
        EventoController::form();
        break;

    case "/Desafio/desafioprojetolegado/evento/salvar":
        EventoController::salvar();
        break;

    case "/Desafio/desafioprojetolegado/evento/excluir":
        EventoController::excluir();
        break;

    case "/Desafio/desafioprojetolegado/setor/listar":
        SetorController::index();
        break;

    case "/Desafio/desafioprojetolegado/setor/form":
        SetorController::form();
        break;

    case "/Desafio/desafioprojetolegado/setor/salvar":
        SetorController::salvar();
        break;

    case "/Desafio/desafioprojetolegado/setor/excluir":
        SetorController::excluir();
        break;
}
