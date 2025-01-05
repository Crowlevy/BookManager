<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Biblioteca Pessoal</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css?v=1.0" rel="stylesheet">
    <link rel="stylesheet" href="../css/user_style/style-user.css?v=1.0">
</head>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <div class="login">
        <form action="process_login.php" method="POST">

            <h3 class="title">Faça o login na sua conta</h3>
                <div class="text-input">
                    <i class="ri-mail-fill"></i>
                    <input type="email" placeholder="Email:" id="email" name="email" required>
                </div>
                <div class="text-input">
                    <i class="ri-lock-fill"></i>
                    <input type="password" placeholder="Senha:" id="senha" name="senha" required>
                </div>
                <button class="login-btn" type="submit">LOGIN</button>
            </form>
                <a href="#" class="forgot">Esqueceu seu email ou senha?</a>
                <div class="create">
                    <a href="register.php">Crie Sua Conta</a>
                    <i class="ri-arrow-right-fill"></i>
                </div>
        </div>
    </div>
</body>

</html>