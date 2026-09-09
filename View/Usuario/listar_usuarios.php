<?php



include VIEW . '/Includes/header.php';
include VIEW . '/Includes/navbar.php';
?>


<div class="mt-4">
    <h1>Usuarios Cadastrados</h1>
</div>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Perfil</th>
            <th scope="col">Acoes</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dadosUsuarios as $usuario) :
            echo ' <tr>
                <th scope="row"> ' . $usuario->id_usuario . ' </th>
                <td>' . $usuario->nome . '</td>
                <td>' . $usuario->cpf . '</td>
                <td>' . $usuario->email . '</td>
                <td>' . $usuario->perfil . '</td>

                <td><a href="/Desafio/desafioprojetolegado/usuario/cadastrar?id_usuario=' . $usuario->id_usuario . '" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a><a href="/Desafio/desafioprojetolegado/usuario/excluir?id_usuario=' . $usuario->id_usuario . '" class="btn btn-danger btn-sm ms-1" onclick="return confirm(\'Deseja realmente excluir este usuário?\');"><i class="bi bi-trash"></i></a></td> </tr>';
        endforeach; ?>
    </tbody>
</table>

<?php

?>
