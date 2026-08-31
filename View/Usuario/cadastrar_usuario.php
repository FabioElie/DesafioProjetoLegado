<?php



include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>


<div class="mt-4">
    <h1>Cadastrar Usuario</h1>
</div>


<form method="POST" action="/Desafio/desafioprojetolegado/usuario/cadastrar<?= isset($model->id_usuario) ? '?id_usuario=' . $model->id_usuario : ''; ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= $model->nome ?? ''; ?>">
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $model->cpf ?? ''; ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $model->email ?? ''; ?>">
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">senha</label>
        <input type="text" class="form-control" id="senha" name="senha" value="<?= $model->senha ?? ''; ?>">
    </div>

    <div class="mb-3">
        <label for="perfil" class="form-label">Perfil 1:Adm 2:Comum</label>
        <input type="text" class="form-control" id="perfil" name="perfil" value="<?= $model->perfil ?? ''; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php


?>
