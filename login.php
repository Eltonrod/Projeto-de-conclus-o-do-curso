<?php
session_start();
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login do usuário</title>
    <link rel="stylesheet" type="text/css" href="css/estiloLogin.css">
</head>
</style>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Faça de Login</h3>
                    <img src="img/Logo_Projeto.png">
                    <?php
                      if(isset($_SESSION['nao_autenticado'])):
                    ?>

                    <div class="notification is-danger">
                      <p id="msgErro">ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                      endif;
                    ?>
                    <div class="box">
                        <form action="loginDB.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
