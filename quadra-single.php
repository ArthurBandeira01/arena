<?php include('header.php');
include_once('config.php');
//Blog: 
$sqlQuadra = "SELECT nome_quadra, telefone, endereco, celular, descricao FROM quadras ORDER BY id DESC limit 1";
$resultQuadra = $conn->query($sqlQuadra);
$user_quadra = mysqli_fetch_assoc($resultQuadra);
$data = date("d/m/Y");
?>
<div class="breadcrumb">
    <a href="index.php">
        Home       
    </a>
    <i class="fas fa-angle-double-right"></i>
    <a href="quadra-single.php">
        Ver Quadra
    </a><!--login-php-->
</div><!--breadcrumb-->

<main class="principal">
    <div class="row quadras">
        
    <div class="horarios col-md-6">
        <h2>Funcionamento: Segunda à sábado</h2>
        <p>Confira os horários disponíveis:</p>
        <table class="table table-style table-bordered mt-4">
            <thead class="thead-border">
                <tr>
                    <th scope="col"><i class="far fa-clock"></i> Horário</th>
                    <th scope="col"><i class="fas fa-caret-down"></i> Disponilidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>09:00 - 10:00</th>
                    <td class="text-danger">Indisponível - Arthur Bandeira</td>
                </tr>
                <tr>
                    <th>10:00 - 11:00</th>
                    <td class="text-success">Disponível - <button class="btn agendar" id="agendar"><i class="far fa-calendar-check"></i> Agendar</button></td>
                </tr>
                <tr>
                    <th>11:00 - 12:00</th>
                    <td class="text-danger">Indisponível - (Maria Eduarda)</td>
                </tr>
                <tr>
                    <th>13:00 - 14:00</th>
                    <td class="text-danger">Indisponível - (João Schumacher)</td>
                </tr>
                <tr>
                    <th>15:00 - 16:00</th>
                    <td class="text-success">Disponível - <a href="" class="btn agendar"><i class="far fa-calendar-check"></i> Agendar</a></td>
                </tr>
                <tr>
                    <th>17:00 - 18:00</th>
                    <td class="text-success">Disponível - <a href="" class="btn agendar"><i class="far fa-calendar-check"></i> Agendar</a></td>
                </tr>
                <tr>
                    <th>19:00 - 20:00</th>
                    <td class="text-danger">Indisponível - (Guilherme Santos)</td>
                </tr>
                <tr>
                    <th>21:00 - 22:00</th>
                    <td class="text-success">Disponível - <a href="" class="btn agendar"><i class="far fa-calendar-check"></i> Agendar</a></td>
                </tr>
                <tr>
                    <th>23:00 - 00:00</th>
                    <td class="text-danger">Indisponível - (Laura Macedo)</td>
                </tr>
                <tr>
                    <th>00:00 - 01:00</th>
                    <td class="text-success">Disponível - <a href="" class="btn agendar"><i class="far fa-calendar-check"></i> Agendar</a></td>
                </tr>        
            </tbody>
        </table>
    </div><!--col-->

        <div class="galeria col-md-6">
            <h4 class="text-center"><?php echo $user_quadra['nome_quadra']; ?></h4>
            <div style="--swiper-navigation-color: #0c70c2; --swiper-pagination-color: #fff" class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                            <img src="assets/images/quadras/gim4.jpg" alt="Ginásio" title="Ginásio">
                        </div>
                    </div>
                
                <div class="swiper-slide">
                    <div class="swiper-zoom-container">
                        <img src="assets/images/quadras/gim2.jpg" alt="Ginásio" title="Ginásio">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-zoom-container">
                        <img src="assets/images/quadras/gim3.jpg" alt="Ginásio" title="Ginásio" />
                    </div>
                </div>
            </div><!--swiper-container-->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            </div><!--swiper-wraper-->

            <div class="redes-sociais text-center">
                <p class="text-left"><?php echo $user_quadra['descricao']; ?></p>
                <h3 class="title mt-4">Nos siga nas redes sociais:</h3><br>
                <div class="socials d-flex align-items-center justify-content-center">
                    <a href="" class="social me-2">
                        <i class="fab fa-instagram"></i>
                    </a><!--social-->
                    <a href="" class="socials-single me-2">
                        <i class="fab fa-facebook-square"></i>
                    </a><!--social-->
                    <a href="" class="socials-single me-2">
                        <i class="fab fa-whatsapp"></i>
                    </a><!--social-->
                </div><!--socials-->
            </div><!--redes-sociais-->
        </div><!--col-->
    </div><!--row-->
</main><!--principal-->
<?php include ('footer.php') ?>
<script src="assets/plugins/swiper/swiper.js"></script>
<script src="assets/plugins/sweet/sweetalert.js"></script>
<script src="assets/js/blog.js"></script>