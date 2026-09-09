<?php

namespace desafioprojetolegado\DAO;

use desafioprojetolegado\Model\Evento;

class EventoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function select()
    {
        $sql = "SELECT * FROM Evento ORDER BY data";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, Evento::class);
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM Evento WHERE id_evento = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchObject(Evento::class);
    }

    public static function insert(Evento $model)
    {
        $sql = "INSERT INTO Evento (nome, data, capacidade_maxima) VALUES (?, ?, ?)";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$model->nome, $model->data, $model->capacidade_maxima]);

        $model->id_evento = parent::getConnection()->lastInsertId();
        return $model;
    }

    public static function update(Evento $model)
    {
        $sql = "UPDATE Evento SET nome = ?, data = ?, capacidade_maxima = ? WHERE id_evento = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$model->nome, $model->data, $model->capacidade_maxima, $model->id_evento]);

        return $model;
    }

    public static function save(Evento $model)
    {
        return empty($model->id_evento) ? self::insert($model) : self::update($model);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM Evento WHERE id_evento = ?";
        $stmt = parent::getConnection()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
