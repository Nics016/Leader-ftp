jQuery(document).ready(function($){


	//подключаю слайдер
	$('.bxslider:first').bxSlider({
		controls: false,
		easing: 'easeInOutQuad',
		infiniteLoop: true,
		auto: true,
		pause: 4000,
		speed: 500

    });

	//закрытие модалки
    $(".modal-close").bind("click", function(){
    	$(this).fadeOut(500);
    	$("#modal").fadeOut(500);
    });

    //показываем окошко на слайдере при наведении мышки
    $(".bx-wrapper").bind("mouseenter", function(){
    		$(".slider-image-textblock").fadeIn(500);
    });

    //скрываем окошко на слайдере при уходе мышки
    $(".bx-wrapper").bind("mouseleave", function(){
    		$(".slider-image-textblock").fadeOut(500);
    });

});

function spanClick(id){
	document.getElementByID(id).click();
}