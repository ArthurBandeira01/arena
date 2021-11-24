//Navbar:
$(function(){
	$('.header-toggle').click(function(){
		$('.header-two-mobile').slideToggle();
	});
})
//Drop Pós-login header
$(function () {
    $('.navbar-pos-login').click(function () {
        $('.pos-login-drop').slideToggle();
    });

});