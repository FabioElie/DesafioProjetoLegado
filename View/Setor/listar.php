<?php
include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>

<div class="d-flex justify-content-between align-items-center mt-4">
    <h1>Setores</h1>
    <a href="<?= APP_URL ?>/setor/form" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Novo setor
    </a>
</div>

<table class="table table-hover table-striped mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Capacidade</th>
            <th scope="col" class="text-end">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($setores)) : ?>
            <tr>
                <td colspan="4" class="text-center text-muted">Nenhum setor cadastrado.</td>
            </tr>
        <?php else : ?>
            <?php foreach ($setores as $setor) : ?>
                <tr>
                    <th scope="row"><?= $setor->id_setor ?></th>
                    <td><?= htmlspecialchars($setor->nome) ?></td>
                    <td><?= number_format($setor->capacidade, 0, ',', '.') ?></td>
                    <td class="text-end">
                        <a href="<?= APP_URL ?>/setor/form?id=<?= $setor->id_setor ?>" class="btn btn-dark btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= APP_URL ?>/setor/excluir?id=<?= $setor->id_setor ?>"
                            class="btn btn-danger btn-sm ms-1"
                            onclick="return confirm('Deseja realmente excluir este setor?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</div>
</body>
</html>
