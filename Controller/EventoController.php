<?php

namespace desafioprojetolegado\Controller;

use desafioprojetolegado\Model\Evento;

class EventoController
{
    public static function index()
    {
        $eventos = Evento::getAllRows();
        include VIEW . '/Evento/listar.php';
    }

    public static function form()
    {
        $model = new Evento();

        if (!empty($_GET['id'])) {
            $model = Evento::getById($_GET['id']) ?: new Evento();
        }

        include VIEW . '/Evento/form.php';
    }

    public static function salvar()
    {
        $model = new Evento();
        $model->id_evento = !empty($_POST['id_evento']) ? (int) $_POST['id_evento'] : null;
        $model->nome = trim($_POST['nome'] ?? '');
        $model->data = trim($_POST['data'] ?? '');
        $model->capacidade_maxima = ($_POST['capacidade_maxima'] ?? '') !== '' ? (int) $_POST['capacidade_maxima'] : null;

        if (!self::valido($model)) {
            include VIEW . '/Evento/form.php';
            return;
        }

        $model->save();
        header('Location: ' . APP_URL . '/evento/listar');
    }

    public static function excluir()
    {
        Evento::excluir($_GET['id'] ?? null);
        header('Location: ' . APP_URL . '/evento/listar');
    }

    private static function valido(Evento $model): bool
    {
        return mb_strlen($model->nome) >= 3
            && !empty($model->data) && strtotime($model->data)
            && $model->capacidade_maxima !== null && $model->capacidade_maxima > 0;
    }
}
