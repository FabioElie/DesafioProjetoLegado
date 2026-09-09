<?php
include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>

<div class="mt-4">
    <h1><?= isset($model->id_setor) ? 'Editar setor' : 'Novo setor' ?></h1>
</div>

<form method="POST" action="<?= APP_URL ?>/setor/salvar" class="mt-3">
    <input type="hidden" name="id_setor" value="<?= $model->id_setor ?? '' ?>">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome"
            value="<?= htmlspecialchars($model->nome ?? '') ?>"
            required minlength="3" maxlength="100" placeholder="Ex.: Pista, Camarote, Arquibancada">
        <div class="form-text">Informe um nome com pelo menos 3 caracteres.</div>
    </div>

    <div class="mb-3">
        <label for="capacidade" class="form-label">Capacidade por setor</label>
        <input type="number" class="form-control" id="capacidade" name="capacidade"
            value="<?= htmlspecialchars($model->capacidade ?? '') ?>"
            required min="1" placeholder="Ex.: 3000">
        <div class="form-text">Número de pessoas que o setor comporta (maior que zero).</div>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-lg me-1"></i>Salvar
    </button>
    <a href="<?= APP_URL ?>/setor/listar" class="btn btn-dark ms-1">Cancelar</a>
</form>

</div>
</body>
</html>
