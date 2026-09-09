<?php
include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>

<div class="mt-4">
    <h1><?= !empty($model->id_ingresso) ? 'Editar venda' : 'Nova venda' ?></h1>
</div>

<?php if (!empty($erro)) : ?>
    <div class="alert alert-danger mt-3"><?= htmlspecialchars($erro) ?></div>
<?php endif; ?>

<form method="POST" action="<?= APP_URL ?>/ingresso/salvar" class="mt-3">
    <input type="hidden" name="id_ingresso" value="<?= $model->id_ingresso ?? '' ?>">

    <div class="mb-3">
        <label for="id_evento" class="form-label">Evento</label>
        <select class="form-select" id="id_evento" name="id_evento" required>
            <option value="">Selecione o evento</option>
            <?php foreach (($eventos ?? []) as $evento) : ?>
                <option value="<?= $evento->id_evento ?>"
                    <?= (int) ($model->id_evento ?? 0) === (int) $evento->id_evento ? 'selected' : '' ?>>
                    <?= htmlspecialchars($evento->nome) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="form-text">Selecione o evento para o qual o ingresso será vendido.</div>
    </div>

    <div class="mb-3">
        <label for="id_setor" class="form-label">Setor</label>
        <select class="form-select" id="id_setor" name="id_setor" required>
            <option value="">Selecione o setor</option>
            <?php foreach (($setores ?? []) as $setor) : ?>
                <option value="<?= $setor->id_setor ?>"
                    <?= (int) ($model->id_setor ?? 0) === (int) $setor->id_setor ? 'selected' : '' ?>>
                    <?= htmlspecialchars($setor->nome) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="form-text">Selecione o setor do ingresso.</div>
    </div>

    <div class="mb-3">
        <label for="nome_cliente" class="form-label">Nome do cliente</label>
        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente"
            value="<?= htmlspecialchars($model->nome_cliente ?? '') ?>"
            required minlength="3" maxlength="100" placeholder="Ex.: Maria Silva">
        <div class="form-text">Informe o nome de quem vai usar o ingresso (pelo menos 3 caracteres).</div>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check-lg me-1"></i>Confirmar venda
    </button>
    <a href="<?= APP_URL ?>/ingresso/listar" class="btn btn-dark ms-1">Cancelar</a>
</form>

</div>
</body>

</html>
