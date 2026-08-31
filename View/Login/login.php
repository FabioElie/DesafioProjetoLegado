<?php



include VIEW . '/Includes/header.php';
?>


<body>
    <main>
        <div class="geral">

            <section class="lado-dir">
                <div class="login-box">
                    <form method="POST" action="login">
                        <label for="email">E-mail</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="email@example.com"
                            autocomplete="email"
                            required>

                        <label for="senha">Senha</label>

                        <input
                            id="senha"
                            type="password"
                            name="senha"
                            placeholder="senha"
                            autocomplete="current-password"
                            required>
                        <button
                            type="submit"
                            class="btn-entrar-login">
                            Entrar
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
