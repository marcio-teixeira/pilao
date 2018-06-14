jQuery.fn.smoothScroll = function(){
	$(this).each(function(){
		var node = $(this);
		$(node).click(function(e){
            var topo = $('header').height();
			var anchor = $(this).attr('href');
			anchor = anchor.split("#");
			anchor = anchor[1];
			var t = 0;
			var found = false;
			var tName = 'a[name='+anchor+']';
			var tId = '#'+anchor;
			if (!!$(tName).length){
				t = $(tName).offset().top;
				if ($(tName).text() == ""){
					t = $(tName).parent().offset().top;
				}
				found = true;
			} else if(!!$(tId).length){
				t = $(tId).offset().top;
				found = true;
			}
			if (found){
				$("body, html").animate({scrollTop: t-topo}, 500);
			}
			//e.preventDefault();
		});
	});
	var lAnchor = location.hash;
	if (lAnchor.length > 0){
		lAnchor = lAnchor.split("#");
		lAnchor = lAnchor[1];
		if (lAnchor.length > 0){
			$("body, html").scrollTop(0);
			var lt = 0;
			var lfound = false;
			var ltName = 'a[name='+lAnchor+']';
			var ltId = '#'+lAnchor;
            var topo = $('header').height();
			if (!!$(ltName).length){
				lt = $(ltName).offset().top;
				if ($(ltName).text() == ""){
					lt = $(ltName).parent().offset().top;
				}
				lfound = true;
			} else if(!!$(ltId).length){
				lt = $(ltId).offset().top;
				lfound = true;
			}
			if (lfound){
				$("body, html").animate({scrollTop: lt-topo}, 500);
			}
		}
	}
};
////////////////////////////////////////////////////////////////
$(document).ready(function(){
    
    $('a.anchorList').smoothScroll();
    
    dmPaginaAtivo = window.location;
	if(dmPaginaAtivo != ""){
		$('a[href="'+dmPaginaAtivo+'"]').addClass('ativo');
	}
    $('.mainMenu a').click(function(){
        $('.mainMenu a').removeClass('ativo');
        $(this).addClass('ativo');
    });
    
    if($(window).width() >= 576){
        var scroll = $(document).scrollTop();
        if(scroll > 0){
            $('header').addClass('stick');
        }else{
            $('header').removeClass('stick');
        }
        $(document).on('scroll', function () {
            var scroll = $(document).scrollTop();
            if(scroll > 10){
                $('header').addClass('stick');
            }else{
                $('header').removeClass('stick');
            }
        });
    }
    $('.pbox-imagem').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    $('.sliderDepoimentos').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    /* Datepicker */

    $.datepicker.regional['pt-BR'] = {
        closeText: 'Fechar',
        prevText: '&#x3c;Anterior',
        nextText: 'Pr&oacute;ximo&#x3e;',
        currentText: 'Hoje',
        monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                     'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                          'Jul','Ago','Set','Out','Nov','Dez'],
        dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
        dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['pt-BR']);

    var today = new Date().getTime(),
        tomorrow = new Date(today + 24 * 60 * 60 * 1000);

    $('.checkin').datepicker({
        minDate: 0,
        onSelect: function(date, inst) {
            // debugger;
            var nextDay = new Date($(this).datepicker('getDate').getTime() + 24 * 60 * 60 * 1000);

            $('.checkout').datepicker('setDate', nextDay);
            $('.checkout').datepicker( "option", "minDate", nextDay);

            //console.log( $(this).datepicker('getDate') );

            setTimeout(function(){
                $('.checkout').datepicker("show");
            },50);
        }
    });
    $(".checkout").datepicker({
        minDate: tomorrow
    });

    /* Abre Formulário Newsletter */

    $('input.emailNews').keypress(function() {
        var thisLength = $(this).val();

        if( thisLength !== '' ) {
            $('.abreNews').addClass('aberto');
            $(this).addClass('aberto');
        } else {
            $('.abreNews').removeClass('aberto');
            $(this).removeClass('aberto');
        }
    });
    $('.abreNews').click(function () {
        $(this).hide();
        $('.newsHide').slideToggle();
    });

    ///////////////////////////////////
    // Mascaras formulario
    /////////////////////////////////

    $('.tel').mask('(00) 0000-0000');
    $('.data').mask('00/00/0000');
    $('.cpf').mask('000.000.000-00');
    $('.ano').mask('0000');
    $('.horas').mask('00:00');
    $('.cep').mask('000-000');
    $('.money').mask('R$ 000.000.000.000.000,00', {reverse: true});
    $('.m-cnpj').mask('00.000.000/0000-00', {reverse: true});

    $(".cel").bind('focusin', function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        element = $(target);
        element.unmask();
        element.mask("(00) 00000-0000");
    }).bind('focusout', function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(00) 00000-0000");
        } else {
            element.mask("(00) 0000-0000");  
        }
    });

    //Formulário

    $('#formHotel').submit(function(event){

        var hotel = $('#idHotel').val();
        var chegada = $('#chegada').val();
        var saida = $('#saida').val();
        var quartos = $('#quartos-hotel').val();
        var adultos = $('#adultos-hotel').val();
        var criancas = $('#criancas-hotel').val();
        var promocode = $('#promocode').val();

        url = "https://myreservations.omnibees.com/default.aspx?";
        url += "q=" + hotel;
        url += "&NRooms=" + quartos;
        url += "&ad=" + adultos;
        url += "&ch=" + criancas;
        url += "&CheckIn=" + chegada.replace(/\//g,"");
        url += "&CheckOut=" + saida.replace(/\//g,"");
        url += "&Code=" + promocode;
        alert(url);
        window.open(url, "_self");
        event.preventDefault();
    });
});



