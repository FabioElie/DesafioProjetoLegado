<?php

namespace desafioprojetolegado\DAO;

use desafioprojetolegado\Model\Setor;

class SetorDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function select()
    {
        $sql = "SELECT * FROM Setor ORDER BY nome";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, Setor::class);
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM Setor WHERE id_setor = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchObject(Setor::class);
    }

    public static function insert(Setor $model)
    {
        $sql = "INSERT INTO Setor (nome, capacidade) VALUES (?, ?)";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$model->nome, $model->capacidade]);

        $model->id_setor = parent::getConnection()->lastInsertId();
        return $model;
    }

    public static function update(Setor $model)
    {
        $sql = "UPDATE Setor SET nome = ?, capacidade = ? WHERE id_setor = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$model->nome, $model->capacidade, $model->id_setor]);

        return $model;
    }

    public static function save(Setor $model)
    {
        return empty($model->id_setor) ? self::insert($model) : self::update($model);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM Setor WHERE id_setor = ?";
        $stmt = parent::getConnection()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
