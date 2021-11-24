<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Arena - Entre e agende horários">
  <meta name="keywords" content="esporte, lazer, ginásios, bem-estar">
  <meta name="author" content="Arena">
  <script src="https://kit.fontawesome.com/a7cf753026.js" crossorigin="anonymous"></script>
  <!--<link rel="shortcut icon" href="assets/images/favicon.ico" />-->
  <link rel="stylesheet" href="assets/plugins/swiper/swiper.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Arena - Alugue horários</title>
</head>
<body class="login-body">

<div class="breadcrumb-login">
    <a href="index.php">
        Home
    </a>
    <i class="fas fa-angle-double-right"></i>
    <a href="login.php">
        Login
    </a><!--login-php-->
</div><!--breadcrumb-->

<section class="login">
    <div class="container">
        <div class="login-text">
            <h3 class="title">Faça seu login no Arena e agende horários para prática de esportes:</h3>
        </div><!--login-text-->

        <form action="loginCPF.php" method="post" class="form-login log-cpf">
            <div class="campo-logar">
                <label for="user" class="label-login form-label"><i class="far fa-user"></i> Usuário:</label>
                <input type="text" name="userCPF" class="input-login form-control" required>     
            </div><!--campo-logar-->

            <div class="campo-logar">
                <label for="password" class="label-login form-label"><i class="fas fa-key"></i> Senha:</label>
                <input type="password" name="passCPF" class="input-login form-control" required>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <input class="mt-1" type="checkbox" name="" id="">
                        <label for="" class="text-light">Lembrar login</label>
                    </div><!--col-->
                    <div class="col-md-6">
                        <a href="redefine.php" class="text-light">Esqueceu sua senha?</a>
                    </div><!--col-->
                </div><!--row-->
            </div><!--campo-logar-->
            <div class="enviar-login text-center mt-4">
                <input type="submit" value="Logar" class="btn input-logar" name="logarCPF">
            </div><!--enviar-login-->
            <br><p class="text-center text-light">OU</p>
            <div class="enviar-login text-center mt-4">
                <a class="btn input-cadastrar" href="cadastro.php">
                    Cadastrar-se
                </a><!--input-cadastrar-->
            </div><!--enviar-login-->
        </form><!--form-login-->

    </div><!--container-->
</section><!--login-->

<!--scripts-->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/botao-subir.js"></script>
<script src="assets/js/login.js"></script>
<!--fim scripts-->
</body>
</html>