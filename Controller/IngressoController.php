<?php

namespace desafioprojetolegado\Controller;

use desafioprojetolegado\Model\Ingresso;
use desafioprojetolegado\Model\Evento;
use desafioprojetolegado\Model\Setor;
use Throwable;

class IngressoController
{
    public static function index()
    {
        $ingressos = Ingresso::getAllRows();
        include VIEW . '/Ingresso/listar.php';
    }

    public static function form()
    {
        $model = new Ingresso();

        if (!empty($_GET['id'])) {
            $model = Ingresso::getById($_GET['id']) ?: new Ingresso();
        }

        $eventos = Evento::getAllRows();
        $setores = Setor::getAllRows();

        include VIEW . '/Ingresso/form.php';
    }

    public static function salvar()
    {
        $model = new Ingresso();
        $model->id_ingresso = !empty($_POST['id_ingresso']) ? (int) $_POST['id_ingresso'] : null;
        $model->nome_cliente = trim($_POST['nome_cliente'] ?? '');
        $model->id_evento = ($_POST['id_evento'] ?? '') !== '' ? (int) $_POST['id_evento'] : null;
        $model->id_setor = ($_POST['id_setor'] ?? '') !== '' ? (int) $_POST['id_setor'] : null;

        if (!self::valido($model)) {
            $erro = 'Preencha o evento, o setor e um nome de cliente com pelo menos 3 caracteres.';
            $eventos = Evento::getAllRows();
            $setores = Setor::getAllRows();
            include VIEW . '/Ingresso/form.php';
            return;
        }

        try {
            $model->save();
        } catch (Throwable $e) {
            $erro = $e->getMessage();
            $eventos = Evento::getAllRows();
            $setores = Setor::getAllRows();
            include VIEW . '/Ingresso/form.php';
            return;
        }

        header('Location: ' . APP_URL . '/ingresso/listar');
        exit;
    }

    public static function excluir()
    {
        Ingresso::excluir($_GET['id'] ?? null);
        header('Location: ' . APP_URL . '/ingresso/listar');
        exit;
    }

    private static function valido(Ingresso $model): bool
    {
        return mb_strlen($model->nome_cliente ?? '') >= 3
            && $model->id_evento !== null && $model->id_evento > 0
            && $model->id_setor !== null && $model->id_setor > 0;
    }
}
