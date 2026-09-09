<?php
include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>

<div class="mt-4">
    <h1><?= isset($model->id_evento) ? 'Editar evento' : 'Novo evento' ?></h1>
</div>

<form method="POST" action="<?= APP_URL ?>/evento/salvar" class="mt-3">
    <input type="hidden" name="id_evento" value="<?= $model->id_evento ?? '' ?>">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome"
            value="<?= htmlspecialchars($model->nome ?? '') ?>"
            required minlength="3" maxlength="100" placeholder="Ex.: Show de Abertura">
        <div class="form-text">Informe um nome com pelo menos 3 caracteres.</div>
    </div>

    <div class="mb-3">
        <label for="data" class="form-label">Data</label>
        <input type="date" class="form-control" id="data" name="data"
            value="<?= htmlspecialchars($model->data ?? '') ?>" required>
        <div class="form-text">Selecione a data em que o evento acontecerá.</div>
    </div>

    <div class="mb-3">
        <label for="capacidade_maxima" class="form-label">Capacidade máxima</label>
        <input type="number" class="form-control" id="capacidade_maxima" name="capacidade_maxima"
            value="<?= htmlspecialchars($model->capacidade_maxima ?? '') ?>"
            required min="1" placeholder="Ex.: 5000">
        <div class="form-text">Número total de pessoas que o evento comporta (maior que zero).</div>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-lg me-1"></i>Salvar
    </button>
    <a href="<?= APP_URL ?>/evento/listar" class="btn btn-dark ms-1">Cancelar</a>
</form>

</div>
</body>
</html>
