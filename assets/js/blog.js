//Slides inicial com swiper
var swiper = new Swiper(".mySwiper", {
    speed: 2000,
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

//Galeria quadras
document.getElementById('agendar').onclick = function(){
    Swal.fire({
      title: 'Agendar horário',
      html: '<img src="assets/images/quadras/pix.png" class="pix mb-3"><br>' +
      'Realize o pix para agendar seu horário',
      icon: 'info',
      footer: '<a href="quadra-single.php">VOLTAR</a>'
    });
  };