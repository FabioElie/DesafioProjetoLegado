<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Desafio</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <style>
    :root {
      --bg-color: #0d0d0d;
      --surface-color: #1a1a1a;
      --border-color: #2a2a2a;
      --text-color: #e0e0e0;
      --text-muted: #b0b0b0;
      --red: #c81e2c;
      --red-light: #ff3b3b;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      color: var(--text-color);
    }

    a {
      color: var(--red-light);
    }

    /* Tabelas */
    .table td,
    .table th {
      border-color: var(--border-color);
      color: var(--text-color);
    }

    .table-striped tbody tr:nth-of-type(odd) td,
    .table-striped tbody tr:nth-of-type(odd) th {
      background-color: rgba(255, 255, 255, 0.04);
      color: var(--text-color);
    }

    .table-hover tbody tr:hover td,
    .table-hover tbody tr:hover th {
      background-color: rgba(200, 30, 44, 0.15);
      color: #fff;
    }

    /* Formulários */
    .form-control,
    .form-select {
      background-color: var(--surface-color);
      color: var(--text-color);
      border-color: var(--border-color);
    }

    .form-control:focus,
    .form-select:focus {
      background-color: var(--surface-color);
      color: var(--text-color);
      border-color: var(--red);
      box-shadow: 0 0 0 0.25rem rgba(200, 30, 44, 0.25);
    }

    .form-control::placeholder {
      color: #777;
    }

    .form-label {
      color: var(--text-muted);
    }

    /* Botões */
    .btn-primary {
      background-color: var(--red);
      border-color: var(--red);
    }

    .btn-primary:hover,
    .btn-primary:focus {
      background-color: var(--red-light);
      border-color: var(--red-light);
    }

    .btn-dark {
      border-color: var(--border-color);
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">
