<?php session_start(); 
include_once('../config.php');
    if((!isset($_SESSION['userCPF']) == true) && (!isset($_SESSION['passCPF']) == true)){
        unset($_SESSION['userCPF']);
        unset($_SESSION['passCPF']);
        header('Location: ../login.php');
    }
    $logadoCPF = $_SESSION['userCPF'];
    //Lista usuários da base corretores:
    $sqlBanner = "SELECT * FROM banners ORDER BY id";
    $resultBanner = $conn->query($sqlBanner);

    //$logadoCNPJ = $_SESSION['userie'];
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
                    <h2 class="title mb-5 text-center"><i class="far fa-images"></i> Editar banner</h2>
                    <table class="table table-usuarios bg-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Diretório</th>
                                <th scope="col">Editar Banner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($user_data = mysqli_fetch_assoc($resultBanner)){
                                    echo "<tr>";
                                    echo "<td>".$user_data['id']."</td>";
                                    echo "<td>".$user_data['banner']."</td>";
                                    echo "<td>".$user_data['path_banner']."</td>";
                                    echo "<td>
                                    <a href='banner_update.php?id=$user_data[id]' class='edit-user btn btn-sm btn-primary'><i class='fas fa-pencil-alt'></i></a>
                                    </td>";
                                }
                            ?>
                        </tbody>
                    </table>
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
