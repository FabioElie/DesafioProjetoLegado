<?php

namespace desafioprojetolegado\DAO;

use desafioprojetolegado\Model\Usuario;

class UsuarioDAO extends DAO
{
    public function __construct()
    {

        parent::__construct();
    }

    public static function select()
    {
        $sql = "SELECT * FROM usuario";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "desafioprojetolegado\Model\Usuario");
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject(Usuario::class);
    }

    public static function insert(Usuario $model)
    {
        $sql = "INSERT INTO usuario (nome,cpf,senha,email,perfil) VALUES (?,?,?,?,?)";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->perfil);
        $stmt->execute();

        $model->id_usuario = parent::getConnection()->lastInsertId();
        return $model;
    }

    public static function update(Usuario $model)
    {
        $sql = "UPDATE usuario SET nome = ?, cpf = ?, senha = ?, email = ?, perfil = ? WHERE id_usuario = ?";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->perfil);
        $stmt->execute();

        return $model;
    }

    public static function save(Usuario $model)
    {
        return ($model->id_usuario == null) ? self::insert($model) : self::update($model);
    }

    public function buscarPorEmail(string $email): array|false
    {
        $sql = "SELECT id_usuario, nome, senha, perfil FROM usuario WHERE email = ? LIMIT 1";
        $stmt = parent::getConnection()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
