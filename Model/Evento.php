<?php

namespace desafioprojetolegado\Model;

use desafioprojetolegado\DAO\EventoDAO;

class Evento
{
    public ?int $id_evento = null;
    public ?string $nome = null;
    public ?string $data = null;
    public ?int $capacidade_maxima = null;

    public static function getAllRows()
    {
        return (new EventoDAO())->select();
    }

    public static function getById($id)
    {
        return (new EventoDAO())->selectById($id);
    }

    public function save()
    {
        return EventoDAO::save($this);
    }

    public static function excluir($id)
    {
        return EventoDAO::delete($id);
    }
}
