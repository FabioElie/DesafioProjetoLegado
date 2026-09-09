<?php
include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>

<div class="d-flex justify-content-between align-items-center mt-4">
    <h1>Eventos</h1>
    <a href="<?= APP_URL ?>/evento/form" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Novo evento
    </a>
</div>

<table class="table table-hover table-striped mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Data</th>
            <th scope="col">Capacidade máxima</th>
            <th scope="col" class="text-end">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($eventos)) : ?>
            <tr>
                <td colspan="5" class="text-center text-muted">Nenhum evento cadastrado.</td>
            </tr>
        <?php else : ?>
            <?php foreach ($eventos as $evento) : ?>
                <tr>
                    <th scope="row"><?= $evento->id_evento ?></th>
                    <td><?= htmlspecialchars($evento->nome) ?></td>
                    <td><?= $evento->data ? date('d/m/Y', strtotime($evento->data)) : '' ?></td>
                    <td><?= number_format($evento->capacidade_maxima, 0, ',', '.') ?></td>
                    <td class="text-end">
                        <a href="<?= APP_URL ?>/evento/form?id=<?= $evento->id_evento ?>" class="btn btn-dark btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= APP_URL ?>/evento/excluir?id=<?= $evento->id_evento ?>"
                            class="btn btn-danger btn-sm ms-1"
                            onclick="return confirm('Deseja realmente excluir este evento?');">
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
