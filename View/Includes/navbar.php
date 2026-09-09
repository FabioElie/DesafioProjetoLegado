<style>
  .navbar-desafio {
    background-color: #141414;
    border-bottom: 1px solid #c81e2c;
  }

  .navbar-desafio .navbar-brand {
    color: #ff3b3b;
    font-weight: bold;
  }

  .navbar-desafio .nav-link {
    color: #e0e0e0;
    transition: color 0.2s ease;
  }

  .navbar-desafio .nav-link:hover,
  .navbar-desafio .nav-link.active {
    color: #ff3b3b;
  }

  .navbar-desafio .navbar-toggler {
    border-color: #c81e2c;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-desafio">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= APP_URL ?>/login"><i class="bi bi-box-seam-fill me-1"></i>Desafio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= APP_URL ?>/usuario/listar">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= APP_URL ?>/evento/listar">Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= APP_URL ?>/setor/listar">Setores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= APP_URL ?>/ingresso/listar">Ingressos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container flex-grow-1">
