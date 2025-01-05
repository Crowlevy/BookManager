<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Biblioteca Pessoal</title>
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
            <form action="process_register.php" method="POST">
                <h3 class="title">Faça seu registro</h3>
                <div class="text-input">
                    <i class="ri-user-fill"></i>
                    <input type="text" placeholder="Nome:" id="nome" name="nome" required>
                </div>
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
            <div class="create">
            <a href="login.php">Já tem uma conta?</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </div>
    </div>
</body>

</html>