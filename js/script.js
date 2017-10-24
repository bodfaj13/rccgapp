$(document).ready(function () {
	
	$('.dropdown-item').hover(function(){
		$(this).css('background-color','white');
	});

	$('.pass-addon').on('click',function(){
        if($(this).find('i').hasClass('fa-eye')){
            $(this).find('i').addClass('fa-eye-slash').removeClass('fa-eye');
            $(this).parent().find("input").attr('type', 'text');
        }else{
            $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            $(this).parent().find("input").attr('type', 'password');
        }
    });


});