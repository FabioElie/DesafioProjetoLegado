<?php

namespace desafioprojetolegado\Controller;

use desafioprojetolegado\DAO\UsuarioDAO;


class AuthController
{
    private UsuarioDAO $auth;


    public static function index()
    {
        include VIEW . '/Login/login.php';
    }

    public static function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $resultado = $this->autenticar($email, $senha);

        if (!$resultado['sucesso']) {
            include VIEW . '/Usuario/cadastrar_usuarios.php';
        } else {
            include VIEW . '/Usuario/listar_usuarios.php';
        }
    }



    private function autenticar(string $email, string $senha): array
    {
        if ($email === '' || $senha === '') {
            return [
                'sucesso' => false,
                'erro' => 'Preencha todos os campos.'
            ];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'sucesso' => false,
                'erro' => 'E-mail ou senha inválidos.'
            ];
        }

        $usuario = $this->auth->buscarPorEmail($email);

        if (!$usuario || !password_verify($senha, $usuario['senha'])) {
            return [
                'sucesso' => false,
                'erro' => 'E-mail ou senha inválidos.'
            ];
        }

        return [
            'sucesso' => true,
            'usuario' => $usuario
        ];
    }

    // public function logout(): void
    // {
    //     $_SESSION = [];
    //     session_destroy();

    //     $this->redirect('login');
    // }
}
