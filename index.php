<?php include('header.php');
include_once('config.php');
//últimas quadras:
$sqlQuadras = "SELECT * FROM quadras ORDER BY id DESC limit 3";
$resultQuadras = $conn->query($sqlQuadras);
//Blog:
$sqlBlog = "SELECT * FROM blog ORDER BY id DESC limit 3";
$resultBlog = $conn->query($sqlBlog);
//Termos:
$sqlTermos = "SELECT * FROM termos";
$resultTerm = $conn->query($sqlTermos);
$user_termos = mysqli_fetch_assoc($resultTerm);
//Depoimentos:
$sqlDepoimentos = "SELECT * FROM depoimentos ORDER BY id DESC limit 4";
$resultDepoimentos = $conn->query($sqlDepoimentos);
//Banners:
$sqlBanner = "SELECT * FROM banners ORDER BY id";
$resultBanner = $conn->query($sqlBanner);
//Patrocinios:
$sqlPatrocinio = "SELECT * FROM patrocinios ORDER BY id";
$resultPatrocinio = $conn->query($sqlPatrocinio);
//Esportes:
$sqlEsporte = "SELECT * FROM esportes";
$resultEsporte = $conn->query($sqlEsporte);
$user_esporte = mysqli_fetch_assoc($resultEsporte);

$dataCot = date("d/m/Y");
?>
<!--Carousel do Swiper-->
<div class="swiper-container mySwiper carousel-index">
    <div class="swiper-wrapper">
    <?php while($user_banners = mysqli_fetch_assoc($resultBanner)){ ?>
        <div class="swiper-slide">
            <a href="" class="link-slide">
                <img src="admin/<?php echo $user_banners['path_banner']; ?>" alt="">
            </a><!--link-slide-->
        </div><!--swiper-slide-->
    <?php } ?>
    </div><!--swiper-wrapper-->

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div><!--swiper-->

<main class="principal">
<!--Ultimas add-->
<section class="ultimas">
    <h2 class="title text-center">
        <i class="fas fa-running"></i>  Confira as últimas quadras adicionadas
    </h2>

    <div class="row news-single mt-3">
        <?php while($user_quadra = mysqli_fetch_assoc($resultQuadras)){ ?>
        <div class="col-lg-4 single">
            <div class="card overflow-hidden">
                <div class="img-single card-img-top">
                    <img class="img-single-news" src="admin/<?php echo $user_quadra['path_imagem']; ?>" alt="">
                </div><!--img-single-->
                <div class="desc-single card-body">
                    <h2 class="title-news card-title"><?php echo $user_quadra['nome_quadra'];?></h2>
                    <span class="data mb-2"><i class="fas fa-phone-volume"></i> <?php echo $user_quadra['telefone'] . " | " . $user_quadra['celular'] ; ?></span>
                    <p class="p-news card-text"><i class="fas fa-map-marker-alt"></i> <?php echo $user_quadra['endereco']; ?></p>
                    <a href="quadras.php" class="btn link-news">
                        <i class="far fa-eye"></i> Ver Quadra
                    </a><!--link-news-->
                </div><!--desc-single-->
            </div><!--card-->
        </div><!--col-->
        <?php } ?>
    </div><!--news-single-->
    <div class="ver-mais-news text-center">
        <a class="ver-mais-link btn mb-5" href="quadras.php">
            <i class="far fa-arrow-alt-circle-right"></i> VER MAIS
        </a><!--ver-mais-link-->
    </div><!--ver-mais-news-->
</section><!--ultimas-->

<section class="ser-lider mt-4">
            <h3 class="title">Gostaria de tornar-se um líder de ginásio? Acesse o conteúdo do PDF que preparamos para você
                e entenda como funciona as diretrizes e normas - Caso já saiba como funciona clique <a href="solicita.php" class="solicita">aqui</a> e solicite um ginásio:
            </h3>
            <div class="div-link">
                <a target="_blank" href="admin/<?php echo $user_termos['path_termo']; ?>" class="link-lider text-center">
                <i class="far fa-eye"></i> Ver PDF</a>
            </div><!--link-->
        </section><!--ser-corretor-->

<section class="ultimas mt-5">
    <h2 class="title text-center mt-5">
        <i class="far fa-newspaper"></i>  Notícias de esportes
    </h2>

    <div class="row news-single mt-3">
        <?php while($user_blog = mysqli_fetch_assoc($resultBlog)){ ?>
        <div class="col-lg-4 single">
            <div class="card overflow-hidden">
                <div class="img-single card-img-top">
                    <img class="img-single-news" src="admin/<?php echo $user_blog['path_imagem']; ?>" alt="">
                </div><!--img-single-->
                <div class="desc-single card-body">
                    <h2 class="title-news card-title"><?php echo $user_blog['titulo']; ?></h2>
                    <span class="data mb-2"><i class="far fa-clock"></i> <?php echo $user_blog['data_news']; ?></span>
                    <p class="p-news card-text"><?php echo $user_blog['subtitulo']; ?></p>
                    <a href="blog.php" class="btn link-news">
                        <i class="far fa-eye"></i> Ver Mais
                    </a><!--link-news-->
                </div><!--desc-single-->
            </div><!--card-->
        </div><!--col-->
        <?php } ?>
    </div><!--news-single-->
    <div class="ver-mais-news text-center">
        <a class="ver-mais-link btn mb-5" href="blog.php">
            <i class="far fa-arrow-alt-circle-right"></i> VER MAIS
        </a><!--ver-mais-link-->
    </div><!--ver-mais-news-->
</section><!--ultimas-->

    <section class="beneficios mt-5">
        <h3 class="title text-center"><i class="fas fa-users"></i> Confira os benefícios de se cadastrar no corretores de gado:</h3>
        <div class="row mt-4">
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-users-cog"></i>
                <p class="mt-2">Serviços conforme suas necessidades</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-dollar-sign"></i>
                <p class="mt-2">Garantia de reembolso</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="far fa-thumbs-up"></i>
                <p class="mt-2">Seriedade e comprometimento</p>
            </div><!--col-->
        </div><!--row-->
        <div class="row mt-4">
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-bookmark"></i>
                <p class="mt-2">100% de satisfação</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-shield-alt"></i>
                <p class="mt-2">Garantia de segurança</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="far fa-check-circle"></i>
                <p class="mt-2">Foco no sucesso</p>
            </div><!--col-->
        </div><!--row-->
    </section><!--beneficios-->

    <!--Patrocinios-->
    <section class="patrocinios mt-3">
            <div class="line"></div>
            <h3 class="text-center mt-3 fw-lighter"><i class="far fa-handshake"></i> Patrocínios do Arena</h3>
            <div class="patrocinios-box text-center">
                <ul class="lista-patrocinios d-flex align-items-center flex-wrap mt-4
                justify-content-md-start justify-content-center">
                <?php while($user_patrocinios = mysqli_fetch_assoc($resultPatrocinio)){ ?>
                    <li class="patrocinios-single me-2">
                        <a class="patrocinios-link" href="">
                            <span class="patrocinios-img">
                                <img src="admin/<?php echo $user_patrocinios['path_patrocinio']; ?>" alt="">
                            </span>
                        </a><!--patrocinios-link-->
                     </li><!--patrocinios-single-->    
                <?php } ?>               
                </ul>
            </div><!--patrocinios-box-->
        </section><!--patrocinios-->
    <!--fim patrocinios-->
    
    <!--fale com um especialista-->
    <div class="fale-conosco">
        <div class="fale">
            <span>Fale com um atendente</span>
            <img src="assets/images/icons/seta.gif" >
            <a target="_blank" href="https://api.whatsapp.com/send?phone=5551992047788&text=Ol%C3%A1!%20No%20que%20podemos%20ajudar%3F">
            <i class="fab fa-whatsapp"></i> Whatsapp
            </a>
        </div><!--fale-->
    </div><!--fale-conosco-->
    <!--fim fale com um especialista-->

    <!--depoimentos cursos-->
    <section class="depoimentos mt-4">
        <h1 class="mt-4"><i class="far fa-star"></i> Veja os depoimentos de nossos clientes satisfeitos:</h1>
        <!--Aqui puxa os depoimentos da categoria depoimentos do
        painel admin-->
        <div class="slides-depoimentos swiper-container mySwiper2">
            <div class="swiper-wrapper">
                <!--Aqui puxa o depoimento-->
                <?php while($user_depoimentos = mysqli_fetch_assoc($resultDepoimentos)){ ?>
                <div class="depoimentos-single swiper-slide">
                    <div class="box-depoimento">
                        <blockquote>"<?php echo $user_depoimentos['comentario']; ?>"</blockquote>
                        <div class="img-name">
                            <img src="admin/<?php echo $user_depoimentos['path_imagem']; ?>">
                            <p><?php echo $user_depoimentos['nome']; ?></p>
                        </div><!--img-name-->
                    </div><!--box-depoimento-->  
                </div><!--depoimentos-single-->
                <?php } ?>

            </div><!--swiper-wrapper-->

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div><!--slides-depoimentos-->
    </section><!--depoimentos-->
    <!--fim depoimentos cursos-->

    <section class="prev-news row">
        <!--Previsão 2:-->
        <div class="previsao-cotacao col-md-4">
            <div id="Previsao" class="container-api-previsao"> 
                <div class="header-previsao">
                    <h2>TEMPO E TEMPERATURA</h2>
                </div><!--header-previsao-->

                <div class="body-previsao">
                    <div class="city">Rio de Janeiro, BR</div>
                    <div class="date"></div>
                    <div class="img-previsao">
                        <img src="assets/images/weather/unknown.png">
                    </div><!--img-previsao-->
                    <div class="temperatura">
                        <div>22</div>
                        <span>°C</span>
                    </div><!--temperatura-->
                    <div class="weather">Nublado</div>
                    <div class="low-high">22°c / 23°c</div>
                    <!--<p class="pressao">Pressão: </p>-->
                    <!--<p class="umidade">Umidade: </p>-->
                </div><!--body--previsao-->

                <div class="footer-previsao">
                    <input type="text" name="pesquisar" placeholder="Digite sua cidade..">
                    <button name="pesquisar" id="button" class="btn search"><i class="fas fa-search"></i></button>
                </div><!--footer-previsao-->
                <div class="previsao-mais">
                    <a class="ver-previsao" href="https://www.climatempo.com.br/" target="_blank">Próximos dias</a>
                </div><!--previsao-mais-->
            </div><!--container-api-previsão-->
        </div><!--previsao-cotacao-->
        <!--Fim previsão 2-->

        <div class="media-modalidades col-md-4 mt-4">
            <div class="cot-title text-center">
                <h5>Média de preços por esportes - <?php echo $dataCot; ?></h5>
            </div><!--cot-title-->
            <table class="table table-style table-bordered mt-4">
                <thead class="thead-border">
                    <tr>
                        <th scope="col"><i class="fas fa-sort-down"></i> ESPORTE</th>
                        <th scope="col"><i class="fas fa-dollar-sign"></i> Valor/hora</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Futebol 11</th>
                        <td><?php echo $user_esporte['fut_11']; ?></td>
                    </tr>
                    <tr>
                        <th>Futebol 7</th>
                        <td><?php echo $user_esporte['fut_7']; ?></td>
                    </tr>
                    <tr>
                        <th>Society</th>
                        <td><?php echo $user_esporte['society']; ?></td>
                    </tr>
                    <tr>
                        <th>Futsal</th>
                        <td><?php echo $user_esporte['futsal']; ?></td>
                    </tr>
                    <tr>
                        <th>Vôlei</th>
                        <td><?php echo $user_esporte['volei']; ?></td>
                    </tr>
                    <tr>
                        <th>Futevôlei</th>
                        <td><?php echo $user_esporte['futvolei']; ?></td>
                    </tr>
                    <tr>
                        <th>Handeball</th>
                        <td><?php echo $user_esporte['handebol']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--media-modalidades-->

        <div class="newsletter col-md-4">
            <h2 class="title"><i class="far fa-hand-point-right"></i> Insira seu e-mail e receba as novidades:</h2>
            <form method="post" class="news-field d-flex flex-column">
                <input type="email" name="email" id="emailNews" placeholder="Seu e-mail..." required>
                <button class="btn btn-success btn-news"><i class="far fa-newspaper"></i>  QUERO RECEBER AS NOVIDADES</button>
                <div class="img-n">
                    <img class="mt-1 img-letter" src="assets/images/logo/bola2.png" alt="Arena" title="Arena">
                </div><!--img-n-->
            </form><!--news-field-->
        </div><!--newsletter-->
    </section><!--prev-news-->
</main><!--principal-->

<!--Botão de cookie-->
<div class="box-cookies hide">
   <p class="msg-cookies mt-3">Este site usa cookies para garantir que você obtenha a melhor experiência.</p>
   <button class="btn btn-cookies ms-2"><i class="far fa-thumbs-up"></i> Aceitar</button>
</div><!--box-cookies-->
<!--fim cookies-->

<?php include('footer.php') ?>
<script src="assets/plugins/swiper/swiper.js"></script>
<script src="assets/js/index.js"></script>
<script src="assets/js/depoimento.js"></script>
<script src="assets/js/cookies.js"></script>