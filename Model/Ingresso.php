<?php

namespace desafioprojetolegado\Model;

use desafioprojetolegado\DAO\IngressoDAO;

class Ingresso
{
    public ?int $id_ingresso = null;
    public ?string $nome_cliente = null;
    public ?string $data_venda = null;
    public ?int $id_evento = null;
    public ?int $id_setor = null;

    public static function getAllRows()
    {
        return (new IngressoDAO())->select();
    }

    public static function getById($id)
    {
        return (new IngressoDAO())->selectById($id);
    }

    public function save()
    {
        return IngressoDAO::save($this);
    }

    public static function excluir($id)
    {
        return IngressoDAO::delete($id);
    }
}
