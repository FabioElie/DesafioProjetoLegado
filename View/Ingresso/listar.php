<?php
include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>

<div class="d-flex justify-content-between align-items-center mt-4">
    <h1>Ingressos</h1>
    <a href="<?= APP_URL ?>/ingresso/form" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Nova Venda
    </a>
</div>

<table class="table table-hover table-striped mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Evento (ID)</th>
            <th scope="col">Setor (ID)</th>
            <th scope="col">Data da venda</th>
            <th scope="col" class="text-end">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($ingressos)) : ?>
            <tr>
                <td colspan="6" class="text-center text-muted">Nenhum ingresso vendido.</td>
            </tr>
        <?php else : ?>
            <?php foreach ($ingressos as $ingresso) : ?>
                <tr>
                    <th scope="row"><?= $ingresso->id_ingresso ?></th>
                    <td><?= htmlspecialchars($ingresso->nome_cliente ?? '') ?></td>
                    <td><?= $ingresso->id_evento ?></td>
                    <td><?= $ingresso->id_setor ?></td>
                    <td><?= $ingresso->data_venda ? date('d/m/Y H:i', ($ingresso->data_venda)) : '' ?></td>
                    <td class="text-end">
                        <a href="<?= APP_URL ?>/ingresso/form?id=<?= $ingresso->id_ingresso ?>" class="btn btn-dark btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= APP_URL ?>/ingresso/excluir?id=<?= $ingresso->id_ingresso ?>"
                            class="btn btn-danger btn-sm ms-1"
                            onclick="return confirm('Deseja realmente excluir este ingresso?');">
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
