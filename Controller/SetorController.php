<?php

namespace desafioprojetolegado\Controller;

use desafioprojetolegado\Model\Setor;

class SetorController
{
    public static function index()
    {
        $setores = Setor::getAllRows();
        include VIEW . '/Setor/listar.php';
    }

    public static function form()
    {
        $model = new Setor();

        if (!empty($_GET['id'])) {
            $model = Setor::getById($_GET['id']) ?: new Setor();
        }

        include VIEW . '/Setor/form.php';
    }

    public static function salvar()
    {
        $model = new Setor();
        $model->id_setor = !empty($_POST['id_setor']) ? (int) $_POST['id_setor'] : null;
        $model->nome = trim($_POST['nome'] ?? '');
        $model->capacidade = ($_POST['capacidade'] ?? '') !== '' ? (int) $_POST['capacidade'] : null;

        if (!self::valido($model)) {
            include VIEW . '/Setor/form.php';
            return;
        }

        $model->save();
        header('Location: ' . APP_URL . '/setor/listar');
    }

    public static function excluir()
    {
        Setor::excluir($_GET['id'] ?? null);
        header('Location: ' . APP_URL . '/setor/listar');
    }

    private static function valido(Setor $model): bool
    {
        return mb_strlen($model->nome) >= 3
            && $model->capacidade !== null && $model->capacidade > 0;
    }
}
