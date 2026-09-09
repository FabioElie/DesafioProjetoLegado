<?php

namespace desafioprojetolegado\DAO;

use desafioprojetolegado\Model\Ingresso;
use PDO;
use RuntimeException;
use Throwable;

class IngressoDAO extends DAO
{
    public function __construct()
    {

        parent::__construct();
    }

    public static function select()
    {
        $sql = "SELECT * FROM Ingresso ORDER BY data_venda DESC";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "desafioprojetolegado\Model\Ingresso");
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM Ingresso WHERE id_ingresso = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject(Ingresso::class);
    }

    public static function insert(Ingresso $model)
    {
        $pdo = parent::getConnection();

        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare("SELECT capacidade_maxima FROM Evento WHERE id_evento = ? FOR UPDATE");
            $stmt->execute([$model->id_evento]);
            $capacidadeEvento = $stmt->fetchColumn();

            $stmt = $pdo->prepare("SELECT capacidade FROM Setor WHERE id_setor = ? FOR UPDATE");
            $stmt->execute([$model->id_setor]);
            $capacidadeSetor = $stmt->fetchColumn();

            if ($capacidadeEvento === false || $capacidadeSetor === false) {
                throw new RuntimeException('Evento ou setor informado não existe.');
            }

            if ($capacidadeEvento < 1 || $capacidadeSetor < 1) {
                throw new RuntimeException('Não há ingressos disponíveis para este evento/setor.');
            }

            $sql = "INSERT INTO Ingresso (id_evento, id_setor, nome_cliente) VALUES (?, ?, ?)";
            $pdo->prepare($sql)->execute([
                $model->id_evento,
                $model->id_setor,
                $model->nome_cliente,
            ]);
            $model->id_ingresso = $pdo->lastInsertId();

            $pdo->prepare("UPDATE Evento SET capacidade_maxima = capacidade_maxima - 1 WHERE id_evento = ?")
                ->execute([$model->id_evento]);
            $pdo->prepare("UPDATE Setor SET capacidade = capacidade - 1 WHERE id_setor = ?")
                ->execute([$model->id_setor]);

            $pdo->commit();
        } catch (Throwable $e) {
            $pdo->rollBack();
            throw $e;
        }

        return $model;
    }

    public static function update(Ingresso $model)
    {
        $sql = "UPDATE Ingresso SET nome_cliente = ? WHERE id_ingresso = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$model->nome_cliente, $model->id_ingresso]);

        return $model;
    }

    public static function save(Ingresso $model)
    {
        return ($model->id_ingresso == null) ? self::insert($model) : self::update($model);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM Ingresso WHERE id_ingresso = ?";
        $stmt = parent::getConnection()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
