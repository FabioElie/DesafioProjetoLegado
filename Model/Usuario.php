<?php

namespace desafioprojetolegado\Model;

use desafioprojetolegado\DAO\UsuarioDAO;

class Usuario
{
    public ?int $id_usuario;
    public string $nome;
    public string $cpf;
    public string $senha;
    public string $email;
    public ?int $perfil;

    public static function getAllRows()
    {
        $objCli = new UsuarioDAO();
        return $objCli->select();
    }

    public static function getById($id)
    {
        $objCli = new UsuarioDAO();
        return $objCli->selectById($id);
    }

    public function save()
    {

        return UsuarioDAO::save($this);
    }

    public function update()
    {
        return UsuarioDAO::update($this);
    }

}
