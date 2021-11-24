<?php session_start(); 
include_once('../config.php');
    if((!isset($_SESSION['userCPF']) == true) && (!isset($_SESSION['passCPF']) == true)){
        unset($_SESSION['userCPF']);
        unset($_SESSION['passCPF']);
        header('Location: ../login.php');
    }
    $logadoCPF = $_SESSION['userCPF'];
    
    $sqlCot = "SELECT * FROM esportes";
    $resultCot = $conn->query($sqlCot);
    $user_data = mysqli_fetch_assoc($resultCot);
?>
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
    <link rel="stylesheet" href="../assets/plugins/swiper/swiper.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="assets/css/painel.css">
    <title>Arena - Admin</title>
</head>
<body>
    <!-- conteúdo lateral do site -->
<div class="conteudo-painel">
    <input type="checkbox" name="" id="nav-toggle">
    <aside class="aside">
        <div class="logo-painel">
            <div class="logo-toggle">
                <a href="index.php" class="logo-link-toggle">
                    <img class="toggle-img" src="assets/images/logo/bola2.png" alt="Arena"
                    title="Arena">
                </a><!--logo-link-toggle-->
            </div><!--logo-toggle-->
            <a href="index.php" class="link-logo-painel">
                <img class="logo-painel-img" src="assets/images/logo/bola2.png" alt="Arena"
                title="Arena">
            </a><!--link-logo-painel-->
        </div><!--logo-->

        <div class="dashboard-painel mt-4">
            <ul class="dashboard-sidebar mt-5">
                <li class="link-item">
                    <a href="../index.php" class="dashboard-links">
                        <i class="fas fa-home"></i>
                        <span> Home</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="usuarios_edit.php" class="dashboard-links">
                        <i class="fas fa-user"></i> 
                        <span> Usuários</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="banners_edit.php" class="dashboard-links">
                        <i class="far fa-images"></i>
                        <span> Banners</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="quadras_edit.php" class="dashboard-links">
                        <i class="far fa-futbol"></i>
                        <span> Quadras</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="patrocinios.php" class="dashboard-links">
                        <i class="far fa-handshake"></i>
                        <span> Patrocínios</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="blog_edit.php" class="dashboard-links">
                        <i class="far fa-newspaper"></i>
                        <span> Blog</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="cotacao_edit.php" class="dashboard-links">
                        <i class="fas fa-dollar-sign"></i>
                        <span> Cotações</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="depoimento.php" class="dashboard-links">
                        <i class="far fa-comment"></i>
                        <span> Depoimentos</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="termos_edit.php" class="dashboard-links">
                        <i class="far fa-file-alt"></i>
                        <span> Ser líder de ginásio</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
            </ul><!--dashboard-sidebar-->
        </div><!--dashboard-painel-->

        <div class="aside-direitos">
            <p class="text-center text-white">Arena - Todos os direitos reservados ©</p>
        </div><!--aside-direitos-->
    </aside><!--aside-->
    <!--mobile-->
    <div class="main-content">
        <header class="mobile-painel d-flex justify-content-between align-items-center">
                <h3 class="icone-mobile mt-2">
                    <label class="pointer-icone" for="nav-toggle">
                        <i class="fas fa-bars"></i> Painel
                    </label>
                </h3><!--icone-mobile-->
                <div class="user-wrapper">
                    <img src="assets/images/usuarios/user.png" alt="" class="user-profile mt-1">
                    <span class="name-user ms-2"><?php echo $logadoCPF ?></span>
                </div><!--user-wrapper-->
                <div class="logout me-3">
                    <a href="logout.php" class="logout-link">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a><!--logout-->
                </div><!--logout-->
        </header><!--mobile-->

            <main class="principal-painel">
                <div class="lista-usuarios">
                    <h2 class="title mb-5 text-center"><i class="fas fa-funnel-dollar"></i> Cotações de horários</h2>
                    
                    <form action="cotacaoSave.php" class="form-cotacao" id="cot" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fut11" class="form-label">Futebol 11:</label>
                                <input type="text" class="form-control" name="fut11" id="fut11" maxlength="50" aria-describedby="fut11Help" required>
                                <div id="fut11Help" class="form-text">Valor atual: R$ <?php echo $user_data['fut_11']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="fut7" class="form-label">Futebol 7:</label>
                                <input type="text" class="form-control" name="fut7" id="fut7" maxlength="50" aria-describedby="fut7Help" required>
                                <div id="fut7Help" class="form-text">Valor atual: R$ <?php echo $user_data['fut_7']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="society" class="form-label">Society:</label>
                                <input type="text" name="society" class="form-control" id="society" maxlength="50" aria-describedby="societyHelp" required>
                                <div id="societyHelp" class="form-text">Valor atual: R$ <?php echo $user_data['society']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="futsal" class="form-label">Futsal:</label>
                                <input type="text" name="futsal" class="form-control" id="futsal" maxlength="50" aria-describedby="futsalHelp" required>
                                <div id="futsalHelp" class="form-text">Valor atual: R$ <?php echo $user_data['futsal']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="volei" class="form-label">Vôlei:</label>
                                <input type="text" class="form-control" name="volei" id="volei" aria-describedby="voleiHelp" required>
                                <div id="voleiHelp" class="form-text">Valor atual: R$ <?php echo $user_data['volei']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="futvolei" class="form-label">Futvôlei:</label>
                                <input type="text" class="form-control" name="futvolei" id="futvolei" maxlength="50" aria-describedby="futvoleiHelp" required>
                                <div id="futvoleiHelp" class="form-text">Valor atual: R$ <?php echo $user_data['futvolei']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="handebol" class="form-label">Handeball:</label>
                                <input type="text" class="form-control" name="handebol" id="handebol" maxlength="50" aria-describedby="handebolHelp" required>
                                <div id="handebolHelp" class="form-text">Valor atual: R$ <?php echo $user_data['handebol']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 text-center mt-4">
                                <input type="submit" value="Atualizar Cotação" class="btn input-logar" name="atualizar">
                            </div><!--col-->
                        </div><!--row-->
                    </form><!--form--->
                </div><!--lista-usuarios-->
            </main><!--principal-->
        </div><!--main--content-->
        <!--fim mobile-->
    <!--fim aside-->
</div><!--conteudo-painel-->

<!--scripts-->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/botao-subir.js"></script>
<!--fim scripts-->

</body>
</html>
