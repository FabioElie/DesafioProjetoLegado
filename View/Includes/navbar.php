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

  .navbar-desafio .dropdown-menu {
    background-color: #1a1a1a;
    border: 1px solid #2a2a2a;
  }

  .navbar-desafio .dropdown-item {
    color: #e0e0e0;
  }

  .navbar-desafio .dropdown-item:hover,
  .navbar-desafio .dropdown-item:focus {
    background-color: #c81e2c;
    color: #fff;
  }

  .navbar-desafio .navbar-toggler {
    border-color: #c81e2c;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-desafio">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Desafio/desafioprojetolegado/"><i class="bi bi-box-seam-fill me-1"></i>Desafio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <li><a class="dropdown-item" href="/Desafio/desafioprojetolegado/usuario/listar"><i class="bi bi-list-ul me-2"></i>Listar</a></li>
      <li><a class="dropdown-item" href="/Desafio/desafioprojetolegado/usuario/cadastrar"><i class="bi bi-plus-lg me-2"></i>Cadastrar</a></li>

      </ul>

    </div>
  </div>
</nav>


<div class="container flex-grow-1">
