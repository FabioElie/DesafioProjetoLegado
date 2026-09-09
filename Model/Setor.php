<?php

namespace desafioprojetolegado\Model;

use desafioprojetolegado\DAO\SetorDAO;

class Setor
{
    public ?int $id_setor = null;
    public ?string $nome = null;
    public ?int $capacidade = null;

    public static function getAllRows()
    {
        return (new SetorDAO())->select();
    }

    public static function getById($id)
    {
        return (new SetorDAO())->selectById($id);
    }

    public function save()
    {
        return SetorDAO::save($this);
    }

    public static function excluir($id)
    {
        return SetorDAO::delete($id);
    }
}
