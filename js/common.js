(function () {
  //для сайдбара
  let aside__menu__item__parent__with__child = document.querySelectorAll('.aside__menu__item__parent'),
      a_current = document.querySelectorAll('.aside__menu__item__child li a');

  aside__menu__item__parent__with__child.forEach(function (item,idx) {
    item.addEventListener('click', function (e) {
        if (! e.target.classList.contains('active') ){
           e.target.classList.add('active')
           e.target.parentNode.childNodes[3].classList.add('active')
        } else {
           e.target.classList.remove('active')
           e.target.parentNode.childNodes[3].classList.remove('active')
        }
    });
   });

   a_current.forEach((item) => {
     if (item.getAttribute('aria-current') == 'page' &&                           item.parentNode.parentNode.classList.contains('aside__menu__item__child')){
      item.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].classList.add('active')
      item.parentNode.parentNode.parentNode.parentNode.classList.add('active')
     }
   });
  //для сайдбара
})();



$(document).ready(function() {
   $.mask.definitions['~']='[78]';
	$('[name="telephone"], [name="phone"],input[name="tel"]').mask('~ (999) 999-99-99');
    $('.call_btn').on('click', function(even) {
       $('.overlay').toggle()
       $('#call_back').animate({
           display: 'block',
           height: 'toggle',
       }, 400);
       $('body').css('overflow-y', 'hidden');
   });
    $('body').on('click','.clean_systems__item__callme', function(even) {
       $('.overlay').toggle()
       $('#call_back_product').animate({
           display: 'block',
           height: 'toggle',
       }, 400);
       $('body').css('overflow-y', 'hidden');
   });



    $('body').on('click','.clean_systems__item__callme',function() {
      console.log('test')
      $('input[name="product_name"]').val($(this).parent().parent().find('.clean_systems__item__description__title a').text())
    })
    $('body').on('click','.product .clean_systems__item__callme',function() {
      console.log('test')
      $('input[name="product_name"]').val($('h1').text().trim())
    })
    $(document).on("submit", "#form_zakaz_zvonka, #form_zakaz_zvonka2,#form_zakaz_zvonka__banner,#form_zakaz_zvonka3,#form_zakaz_zvonka__product", function(e) {
       e.preventDefault();
       var m_method = $(this).attr('method');
       var m_action = $(this).attr('action');
       var m_data = $(this).serialize();
       console.log(m_data)
        console.log(m_action)
          console.log(m_method)
       $.ajax({
         type: m_method,
         url: m_action,
         data: m_data,
         dataType: 'JSON',
         resetForm: 'true',
         success: function(response) {
               $('.thank_for_callback').css('display', 'flex');
               $('.overlay').css('display', 'none');
               $('#call_back,#call_back_product').css('display', 'none');
               $('body').css('overflow-y', 'scroll');
               console.log(response)
               setTimeout(function() {
                  $('.thank_for_callback').fadeOut('slow');
                  $('body').css('overflow-y', 'scroll');
                  $('.overlay').css('display', 'none');
                  $('#call_back').css('display', 'none');
                  $("#form_zakaz_zvonka, #form_zakaz_zvonka2,#form_zakaz_zvonka__banner,#form_zakaz_zvonka3,#form_zakaz_zvonka__product").trigger('reset');
               }, 4000);
         },
             error: function (jqXHR, exception,response) {
                 console.log(jqXHR);
                 console.log(exception);
            if (jqXHR.status === 0) {
                alert('Произошла ошибка: Not connect. Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Произошла ошибка: Requested page not found (404).');
            } else if (jqXHR.status == 500) {
                alert('Произошла ошибка: Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Произошла ошибка: Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Произошла ошибка: Time out error.');
            } else if (exception === 'abort') {
                alert('Произошла ошибка: Ajax request aborted.');
            } else {
                alert('Произошла ошибка: Uncaught Error. ' + jqXHR.responseText);
            }
        }
       });
    });





    jQuery(function($){
        // AJAX загрузка страниц/записей WP
        $('.btn-loadmore').on('click', function(){
            let _this = $(this);
            _this.html('<i class="fas fa-redo fa-spin"></i> Загрузка...'); // изменение кнопки

            let data = {
                'action': 'loadmore',
                'query': _this.attr('data-param-posts'),
                'page': this_page,
                'tpl': _this.attr('data-tpl')
            }
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                success:function(data){
                    if (data) {
                        _this.html('<i class="fas fa-redo"></i> Загрузить ещё');
                        $('.clean_systems__list').append(data); // где вставить данные
                        this_page++;                      // увелич. номер страницы +1
                        if (this_page == _this.attr('data-max-pages')) {
                            _this.remove();               // удаляем кнопку, если последняя стр.
                        }
                    } else {                              // если закончились посты
                        _this.remove();                   // удаляем кнопку
                    }
                }
          });
      });
    });


    $(window).scroll(function() {
        if ($(this).scrollTop() > window.outerHeight) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });


        $('#toTop').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
        });

        $('.menu_list_hidden .menu-item-has-children').on('click', function() {
            $(this).toggleClass('active');
            $(this).find('.sub-menu').slideToggle('slow')

            $('#menu-osnovnoe-menju-1').css('height',$('#menu-osnovnoe-menju-1').height())

        })

        $('.ham8').click(function() {
           $('body').css('position','fixed')
            // $('html').css('overflow-y','hidden')
            $('.overlay').css('display', 'block')
            if ( document.querySelector('.ham8').classList.contains('active') == false) {
                $('.overlay').css('display', 'none')
                   $('body').css('position','inherit')
                // $('html').css('overflow-y','scroll')

            }
        });
        $('.overlay').on('click', function() {
            document.querySelector('.ham8').classList.remove('active');
            $('.overlay').css('display','none')
            $('#call_back,#call_back_product').css('display','none')
            $('body').css('overflow-y', 'scroll');
            $('body').css('position', 'inherit');
            if ($('.menu_list_hidden').css('display') == 'block') {
                $('.menu_list_hidden').slideToggle('slow')
                // $('.ham.hamRotate.ham8').toggleClass('active')
            }
        })

        if (window.outerWidth < 1300){
          $('.page__main_footer__bottom__part__certificates__inner').slick({
                   dots: true,
                   infinite: true,
                   autoplay:true,
                   autoplaySpeed: 5000,
                   speed: 1600,
                  //  variableWidth:true,
                   slidesToShow: 3,
                   arrows:false,
                   slidesToScroll: 2,
                   responsive: [
                     {
                       breakpoint: 1200,
                       settings: {
                         slidesToShow: 3,
                         slidesToScroll: 1,
                         infinite: true,
                         dots: true
                       }
                     },
                     {
                       breakpoint: 800,
                       settings: {
                         slidesToShow: 2,
                         infinite: true,
                         dots: true,
                         slidesToScroll: 2
                       }
                     },
                     {
                       breakpoint: 600,
                       settings: {
                         infinite: true,
                         slidesToShow: 1,
                         dots: true,
                         slidesToScroll: 1
                       }
                     }
                   ]
               })
          $('.how_we_works__items').slick({

                   infinite: true,
                   autoplay:true,
                   autoplaySpeed: 5000,
                   speed: 1600,
                   slidesToShow: 3,
                   arrows:false,
                   slidesToScroll: 2,
                   responsive: [
                     {
                       breakpoint: 1100,
                       settings: {
                         slidesToShow: 3,
                         slidesToScroll: 1,
                         infinite: true,
                       }
                     },
                     {
                       breakpoint: 800,
                       settings: {
                         slidesToShow: 3,
                         infinite: true,
                         slidesToScroll: 2
                       }
                     },
                     {
                       breakpoint: 600,
                       settings: {
                         infinite: true,
                         slidesToShow: 2,
                         slidesToScroll: 1
                       }
                     }
                   ]
               })
        }

	$(".fancybox_certificates").fancybox();






});
