<?php include('header.php'); 
include('config.php');

if(isset($_POST['cadastrar'])){
    //Variável de erro caso tenho campos inválidos no cadastro:
    $erro = false;
    $msgNome = "";
    $msgEndereco = "";
    $msgCidade = "";
    $msgEstado = "";
    $msgEmail = "";
    $msgSenha = "";

        $nomeCPF = "";
        $emailCPF = "";
        $cpf = $_POST['cpf'];
        $enderecoCPF = "";
        $cidadeCPF = "";
        $estadoCPF = "";
        $celularCPF = $_POST['celular'];
        $telefoneCPF = $_POST['telefone'];
        $passwordCPF = "";   

            //Verifica campo nome:
            if(isset($_POST['nome']) && strlen($_POST['nome']) >= 5 && strlen($_POST['nome']) <= 50 && !is_numeric($_POST['nome'])){
                $nomeCPF = $_POST['nome'];
            }else{
                $msgNome = '<div class="invalido">Nome inválido!</div>';
            }

            //Verifica campo endereçoCPF:
            if(isset($_POST['endereco']) && strlen($_POST['endereco']) >= 5 && strlen($_POST['endereco']) <= 50){
                $enderecoCPF = $_POST['endereco'];
            }else{
                $msgEndereco = '<div class="invalido">Endereço inválido!</div>';
            }

            //Verifica campo cidadeCPF:
            if(isset($_POST['cidadeCPF']) && strlen($_POST['cidadeCPF']) >= 5 && strlen($_POST['cidadeCPF']) <= 50 && !is_numeric($_POST['cidadeCPF'])){
                $cidadeCPF = $_POST['cidadeCPF'];
            }else{
                $msgCidade = '<div class="invalido">Cidade inválida!</div>';
            }

            //Verifica campo estado:
            if(isset($_POST['estadoCPF']) && strlen($_POST['estadoCPF']) == 2 && !is_numeric($_POST['estadoCPF'])){
                $estadoCPFString = strval($_POST['estadoCPF']);
                $estadoCPFUpper = strtoupper($estadoCPFString);
                $estadoCPF = $estadoCPFUpper;
            }else{
                $msgEstado = '<div class="invalido">Estado inválido!</div>';
            }

            //Verifica e-mail:
            if(isset($_POST['email']) && strlen($_POST['email']) >= 5 && strlen($_POST['email']) <= 100){
                // Remove os caracteres ilegais, caso tenha
                $emailCPF = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                // Valida o e-mail
                if (filter_var($emailCPF, FILTER_VALIDATE_EMAIL)) {
                    $emailCPF = $_POST['email'];
                }else {
                    $msgEmail = '<div class="invalido">E-mail inválido!</div>';
                }
            }else{
                $msgEmail = '<div class="invalido">Preencha o campo e-mail</div>';
            }

            //Verifica senha:
            if(isset($_POST['password']) && strlen($_POST['password']) >= 5 && strlen($_POST['password']) <= 30){
                //$passwordCPF = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $passwordCPF = $_POST['password'];
            }else{
                $msgSenha = '<div class="invalido">Insira uma senha</div>'; 
            }
        
            if(isset($_FILES['imagem'])){
                $imagem = $_FILES['imagem'];
                if($imagem['error']) die("Falha ao enviar arquivo");
                
                $pastaImagem = "admin/assets/images/usuarios/";
                $nomeImagem = $imagem['name'];
                $novoNomeImagem = uniqid();
                $extensaoImagem = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
        
                $pathImagem = $pastaImagem . $novoNomeImagem . "." . $extensaoImagem;
                $imagem_correto = move_uploaded_file($imagem["tmp_name"], $pathImagem);
            }

        if(!$msgNome && !$msgEmail && !$msgSenha && !$msgEndereco && !$msgCidade && !$msgEstado){
            $result = mysqli_query($conn, "INSERT INTO usuarios(nome, email, cpf, endereco, cidade, estado, celular, telefone, senha, imagem, path_imagem) 
            VALUES ('$nomeCPF', '$emailCPF', '$cpf', '$enderecoCPF', '$cidadeCPF', '$estadoCPF', '$celularCPF', '$telefoneCPF', '$passwordCPF', '$nomeImagem', '$pathImagem')");
            echo '<div class="cadastrado" id="btnCadastrado"><i class="far fa-check-circle"></i> Cadastrado</div>';   
        }else{
            echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
        }
   // }
}
?>

<div class="breadcrumb">
    <a href="index.php">
        Home
    </a>
    <i class="fas fa-angle-double-right"></i>
    <a href="cadastrar.php">
        Cadastrar
    </a><!--login-php-->
</div><!--breadcrumb-->



<section class="cadastro">
    <div class="container">
        <div class="login-text">
            <h3 class="title text-center mt-3 mb-3">Faça seu cadastro no Arena</h3>
        </div><!--login-text-->
        
        <form action="cadastro.php" class="form-cpf" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nomeCPF" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" id="nomeCPF" maxlength="50" aria-describedby="nomeHelp" required>
                    <div id="nomeHelp" class="form-text">Insira seu nome completo</div>
                    <?php if(isset($msgNome)) echo $msgNome ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="imagem" class="form-label">Sua foto</label>
                    <input type="file" class="form-control" name="imagem" id="imagem" aria-describedby="imagemHelp" required>
                    <div id="imagemHelp" class="form-text">Insira sua foto aqui</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="emailCPF" class="form-label">E-mail</label>
                    <input type="text" class="form-control" name="email" id="emailCPF" maxlength="50" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Digite seu e-mail</div>
                    <?php if(isset($msgEmail)) echo $msgEmail ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                        <label for="senhaCPF" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="senhaCPF" maxlength="30" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Insira uma senha</div>
                        <?php if(isset($msgSenha)) echo $msgSenha ?>
                    </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelp" required>
                    <div id="cpfHelp" class="form-text">Insira seu CPF</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="enderecoCPF" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="enderecoCPF" maxlength="50" aria-describedby="enderecoHelp" required>
                    <div id="enderecoHelp" class="form-text">Digite seu endereço</div>
                    <?php if(isset($msgEndereco)) echo $msgEndereco ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cidadeCPF" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidadeCPF" id="cidadeCPF" maxlength="50" aria-describedby="cidadeCPFHelp" required>
                    <div id="cidadeCPFHelp" class="form-text">Nome de sua cidade</div>
                    <?php if(isset($msgCidade)) echo $msgCidade ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="estadoCPF" class="form-label">Estado</label>
                    <input type="text" size="2" maxlength="2" class="form-control" name="estadoCPF" id="estadoCPF" aria-describedby="estadoCPFHelp" required>
                    <div id="estadoCPFHelp" class="form-text">Seu estado. Ex.: SP, RJ, TO</div>
                    <?php if(isset($msgEstado)) echo $msgEstado ?>
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
                <div class="col text-center mt-4">
                    <input type="submit" value="Cadastrar" class="btn input-logar" name="cadastrar">
                </div><!--col-->
            </div><!--row-->
        </form><!--form-cpf-->
    </div><!--container-->
</section><!--cadastro-->
<?php include ('footer.php') ?>
<script src="assets/js/inputmask.js"></script>
<script src="assets/js/jquery.inputmask.js"></script>
<script src="assets/js/cadastra.js"></script>