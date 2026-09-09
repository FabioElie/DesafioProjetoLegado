<?php

namespace desafioprojetolegado\Controller;

use desafioprojetolegado\DAO\UsuarioDAO;


class AuthController
{
    public static function index()
    {
        include VIEW . '/Login/login.php';
    }

    public static function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $resultado = self::autenticar($email, $senha);

        if (!$resultado['sucesso']) {
            header('Location: /Desafio/desafioprojetolegado/login');
        } else {
            header('Location: /Desafio/desafioprojetolegado/usuario/listar');
        }
    }



    private static function autenticar(string $email, string $senha): array
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

        $usuario = UsuarioDAO::buscarPorEmail($email);

        if (!$usuario || $senha !== $usuario['senha']) {
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
