<?php

namespace desafioprojetolegado\Controller;

use desafioprojetolegado\Model\Usuario;

class UsuarioController
{

    public static function index()
    {
        $dadosUsuarios = Usuario::getAllRows();
        include VIEW . '/Usuario/listar_usuarios.php';
    }

    public static function cadastro()
    {

        $model = new Usuario();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $model->id_usuario = !empty($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
            $model->nome = $_POST['nome'];
            $model->cpf = $_POST['cpf'];
            $model->senha = $_POST['senha'];
            $model->email = $_POST['email'];
            $model->perfil = $_POST['perfil'];

            $model = $model->save();
            if ($model->id_usuario) {
                header("Location: /Desafio/desafioprojetolegado/usuario/listar");
            }
        } else {
            if (isset($_GET['id_usuario'])) {
                $id = $_GET['id_usuario'];
                $model = Usuario::getById($id);
            }
            include VIEW . '/Usuario/cadastrar_usuario.php';
        }
    }
}
