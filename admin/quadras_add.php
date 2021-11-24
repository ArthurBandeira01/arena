<?php session_start(); 
include_once('../config.php');
    if((!isset($_SESSION['userCPF']) == true) && (!isset($_SESSION['passCPF']) == true)){
        unset($_SESSION['userCPF']);
        unset($_SESSION['passCPF']);
        header('Location: ../login.php');
    }
    $logadoCPF = $_SESSION['userCPF'];

    if(isset($_POST['postar'])){
        $msgTitulo = "";
        $msgSubtitulo = "";

        $titulo = "";
        $subtitulo = "";
        $textarea = $_POST['conteudo_text'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];

        //Verifica campo nome e comentário:
        if(isset($_POST['titulo']) && strlen($_POST['titulo']) >= 5 && !is_numeric($_POST['titulo'])){
            $titulo = $_POST['titulo'];
        }else{
            $msgTitulo = '<div class="invalido">Nome do ginásio inválido!</div>';
        }
        if(isset($_POST['subtitulo']) && strlen($_POST['subtitulo']) >= 10){
            $subtitulo = $_POST['subtitulo'];
        }else{
            $msgSubtitulo = '<div class="invalido">Endereço inválido!</div>';
        }
        //Foto:
        if(isset($_FILES['imagem'])){
            $imagem = $_FILES['imagem'];
            if($imagem['error']) die("Falha ao enviar arquivo");
            
            $pastaImagem = "assets/images/quadras/";
            $nomeImagem = $imagem['name'];
            $novoNomeImagem = uniqid();
            $extensaoImagem = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
    
            $pathImagem = $pastaImagem . $novoNomeImagem . "." . $extensaoImagem;
            $imagem_correto = move_uploaded_file($imagem["tmp_name"], $pathImagem);
        }
        if(!$msgTitulo && !$msgSubtitulo){
            $result = mysqli_query($conn, "INSERT INTO quadras(nome_quadra, endereco, descricao, imagem, path_imagem, telefone, celular) 
            VALUES ('$titulo', '$subtitulo', '$textarea', '$nomeImagem', '$pathImagem', '$telefone', '$celular')");
            echo '<div class="cadastrado" id="btnCadastrado"><i class="far fa-check-circle"></i> Post Adicionado!</div>';
        }else{
            echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
        } 
    }
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
    <script src="https://cdn.tiny.cloud/1/xpzjg27l6hftw36ks9c0ig8bs2yt66vrnelczj5hkqbt7bbn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                    <h2 class="title mb-5 text-center"><i class="far fa-futbol"></i> Adicionar quadra</h2>
                    <form action="quadras_add.php" method="post" class="form-depoimento" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="titulo" class="form-label">Nome do ginásio:</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="tituloHelp" required>
                                <div id="tituloHelp" class="form-text">Insira o nome do ginásio aqui</div>
                                <?php if(isset($msgTitulo)) echo $msgTitulo; ?>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col mb-3">
                                <label for="subtitulo" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" name="subtitulo" id="subtitulo" aria-describedby="subtituloHelp" required>
                                <div id="subtituloHelp" class="form-text">Insira o endereço do ginásio aqui</div>
                                <?php if(isset($msgSubtitulo)) echo $msgSubtitulo; ?>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="celularCPF" class="form-label">Celular</label>
                                <input type="text" name="celular" class="form-control" id="celularCPF" aria-describedby="celularHelp" required>
                                <div id="celularHelp" class="form-text">Insira um contato</div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="telefoneCPF" class="form-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control" id="telefoneCPF" aria-describedby="telefoneHelp">
                                <div id="telefoneHelp" class="form-text">Telefone residencial (facultativo)</div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <textarea name="conteudo_text" placeholder="Aqui vai a descrição..."></textarea>
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col mb-3">
                                <label for="imagem" class="form-label">Insira uma imagem:</label>
                                <input type="file" class="form-control" name="imagem" id="imagem" aria-describedby="imagemHelp" required>
                                <div id="imagemHelp" class="form-text">Imagem do ginásio</div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <input type="submit" name="postar" value="Enviar Post" class="btn input-logar">
                            </div><!--col-->
                        </div><!--row-->   
                    </form><!--form-->
                    
                    <script>
                        tinymce.init({
                            selector: 'textarea',
                            //plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                            //toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                            //toolbar_mode: 'floating',
                            //tinycomments_mode: 'embedded',
                            //tinycomments_author: 'Author name',
                            menubar: false,
                            entity_encoding: 'raw'
                        });
                    </script>
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
<script src="../assets/js/cadastra.js"></script>
<!--fim scripts-->

</body>
</html>
