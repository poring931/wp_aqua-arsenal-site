<?php
    /*
    Template Name: Калькулятор
    */
    get_header();
    ?>
<link rel="stylesheet" href="<?=get_theme_file_uri( 'css/calculator.css' );?>">
<div class="container page__content">
    <aside class="page__aside">
        <?get_template_part( 'template__page__parts/sidebar' );//левый главный сайдбар?>
    </aside>
    <div class="page__main-part">
        <div class="breadcrumbs container">
            <?php if(function_exists('bcn_display') && !is_front_page())
                {
                 bcn_display();
                }?>
        </div>
        <h1>
            <? if( is_category() ){
                echo get_queried_object()->name;
                  } else {
                	the_title();
                  }
                ?>
        </h1>
        <div class="page__main-part__content">
            <div class="form_wrapper calculator">
                <form action="/mail.php?op=calculator_form" method="POST"  id="calculator_fom" >
                    <div class="border_block top_block_calculator mgb_25">
                        <div class="calculator_fom__topPart__col" style="">
                            <p class="titl">Источник водоснабжения</p>
                            <div class="box_list">
                                <p class="check istok"></p>
                                <span class="list_item">Скважина</span>
                            </div>
                            <div class="box_list">
                                <p class="check  istok"></p>
                                <span class="list_item">Колодец</span>
                            </div>
                            <div class="box_list">
                                <p class="check  istok"></p>
                                <span class="list_item">Водопровод</span>
                            </div>
                            <div class="box_list">
                                <p class="check  istok "></p>
                                <span class="list_item">Иное</span>
                            </div>
                        </div>
                        <div  class="calculator_fom__topPart__col" style=" ">
                            <p class="titl">Проблемы с водой</p>
                            <div class="box_list">
                                <p class="check probsvod"></p>
                                <span>Накипь</span>
                            </div>
                            <div class="box_list">
                                <p class="check probsvod "></p>
                                <span>Неприятный запах</span>
                            </div>
                            <div class="box_list">
                                <p class="check probsvod "></p>
                                <span>Много железа</span>
                            </div>
                            <div class="box_list">
                                <p class="check probsvod "></p>
                                <span>Иное</span>
                            </div>
                        </div>
                        <div  class="calculator_fom__topPart__col" style=" ">
                            <p class="titl">Объект</p>
                            <div class="box_list">
                                <p class="check obj"></p>
                                <span class="list_item">Коттедж</span>
                            </div>
                            <div class="box_list">
                                <p class="check  obj"></p>
                                <span class="list_item">Загородный дом</span>
                            </div>
                            <div class="box_list">
                                <p class="check  obj"></p>
                                <span class="list_item">Дачный дом</span>
                            </div>
                            <div class="box_list">
                                <p class="check  obj"></p>
                                <span class="list_item">Квартира</span>
                            </div>
                        </div>
                    </div>

                    <div class="middle_block_calculator mgb_25">
                        <div class="middle_block_calculator__left_side">
                            <div class="lab_check_to">
                                <label class="lab_check">Сезонное проживание</label>
                                <input class="mal" style="width: 60px;" min="0" max="1" step="1" value="0" name="sezon" type="range">
                                <label class="lab_check">Постоянное проживание</label>
                            </div>
                            <div class="lab_check_bo">
                                <label class="lab_check">Необходимо установить</label>
                                <input class="mal" style="width: 60px;" min="0" max="1" step="1" value="0" name="gidroakkum" type="range">
                                <label class="lab_check">Гидроаккумулятор установлен</label>
                            </div>
                        </div>
                        <div class="middle_block_calculator_right_side">
                            <div class="lab_check_r">
                                <label class="lab_check_rr">Количество санузлов</label>
                                <input class="boll" style=" padding:0;margin:0;margin-top:0px;" min="0" max="6" step="1" value="1" name="sanuzel" type="range">
                                <ul class="hrr">
                                    <li class="transpar_li">0</li>
                                    <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li>
                                    <li>5</li>
                                    <li class="transpar_li">6</li>
                                </ul>
                            </div>
                            <div class="lab_check_r">
                                <label class="lab_check_rr">Количество жильцов</label>
                                <input class="boll" style="padding:0;margin:0;margin-top:0px;" min="0" max="6" step="1" value="1" name="people" type="range">
                                <ul class="hrr">
                                    <li class="transpar_li">0</li>
                                    <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li>
                                    <li>5</li>
                                    <li class="transpar_li">6</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="border_block bass_banya mgb_25">
                        <ul style="text-align: center;" class="hr">
                            <li>
                                <div class="img_box"><img src="<?=get_theme_file_uri( '/images/well_8.png' );?>" alt="icon_8"></div>
                                <p class="check vanbas"></p>
                                <span class="list_item">Бассейн</span>
                            </li>
                            <li>
                                <div class="img_box"><img src="<?=get_theme_file_uri( '/images/well_9.png' );?>" alt="icon_9"></div>
                                <p class="check vanbas"></p>
                                <span class="list_item">Баня</span>
                            </li>
                        </ul>
                    </div>
                    <div class="border_block mgb_25 kanalizacia">

                            <ul class="hr">
                              <li><span>Тип канализации</span></li>
                              <li><p class="check typekan"></p><span class="list_item">Септик</span></li>
                              <li><p class="check typekan"></p><span class="list_item">Централизованная</span></li>
                              <li><p class="check typekan"></p><span class="list_item">Иное</span></li>
                            </ul>

                  </div>
                  <input style="display:none;" type="text" name="vanbas" value="" id="vanbas">
                  <input style="display:none;" type="text" name="probsvod" value="" id="probsvod">
                  <input style="display:none;" type="text" name="typekan" value="" id="typekan">
                  <input style="display:none;" type="text" name="istok" value="" id="istok">
                  <input style="display:none;" type="text" name="obj" value="" id="obj">
                    <div class="form_inputs os_info_custumer">
                        <div class="p-floating-container w50">
                            <input class="overflow_index input__control textfield phone-input" name="familiya" type="text" value="" autocomplete="off" placeholder="Ваше имя" required="">
                            <label>Ваше имя</label>
                        </div>
                        <div class="p-floating-container w50">
                            <input class="overflow_index input__control textfield phone-input" name="custumer__mail" type="text" value="" autocomplete="off" placeholder="E-mail" required="">
                            <label>E-mail</label>
                        </div>
                        <div class="p-floating-container w50">
                            <input class="overflow_index input__control textfield phone-input" name="tel" type="text" value="" autocomplete="off" placeholder="Телефон *" required="">
                            <label>Телефон *</label>
                        </div>
                        <textarea name="text_area" rows="8" cols="80" placeholder="Комментарий"></textarea>
                        <button class="submit_btn"  type="submit" name="button">Подобрать оборудование</button>
                    </div>
                </form>
            </div>
            <div class="how_we_works">
                <h2>Как мы работаем</h2>
                <div class="how_we_works__items">
                    <div class="how_we_works__item">
                        <div class="how_we_works__item__img-block">
                            <div class="how_we_works__item__img-block__number">
                                1
                            </div>
                            <img class="how_we_works__item__back" src="<?=get_theme_file_uri( '/images/work_schema/Vector.png' );?>" alt="">
                            <img class="how_we_works__item__icon" src="<?=get_theme_file_uri( '/images/work_schema/1.png' );?>" alt="">
                        </div>
                        <div class="how_we_works__item__text">
                            <a href="/analysis/">Анализ воды</a>
                        </div>
                        <a class="abs_href" href="/analysis/"></a>
                    </div>
                    <div class="how_we_works__item">
                        <div class="how_we_works__item__img-block">
                            <div class="how_we_works__item__img-block__number">
                                2
                            </div>
                            <img class="how_we_works__item__back" src="<?=get_theme_file_uri( '/images/work_schema/Vector.png' );?>" alt="">
                            <img class="how_we_works__item__icon" src="<?=get_theme_file_uri( '/images/work_schema/2.png' );?>" alt="">
                        </div>
                        <div class="how_we_works__item__text">
                            <a href="/podbor-oborudovaniya/">подбор систем</a>
                        </div>
                        <a class="abs_href" href="/podbor-oborudovaniya/"></a>
                    </div>
                    <div class="how_we_works__item">
                        <div class="how_we_works__item__img-block">
                            <div class="how_we_works__item__img-block__number">
                                3
                            </div>
                            <img class="how_we_works__item__back" src="<?=get_theme_file_uri( '/images/work_schema/Vector.png' );?>" alt="">
                            <img class="how_we_works__item__icon" src="<?=get_theme_file_uri( '/images/work_schema/3.png' );?>" alt="">
                        </div>
                        <div class="how_we_works__item__text">
                            <a href="/montazh-sistem-vodoochistki/">монтаж за 1 день</a>
                        </div>
                        <a class="abs_href" href="/montazh-sistem-vodoochistki/"></a>
                    </div>
                    <div class="how_we_works__item">
                        <div class="how_we_works__item__img-block">
                            <div class="how_we_works__item__img-block__number">
                                4
                            </div>
                            <img class="how_we_works__item__back" src="<?=get_theme_file_uri( '/images/work_schema/Vector.png' );?>" alt="">
                            <img class="how_we_works__item__icon" src="<?=get_theme_file_uri( '/images/work_schema/4.png' );?>" alt="">
                        </div>
                        <div class="how_we_works__item__text">
                            <a href="/services/montazh-i-naladka-oborudovaniya/">пусконаладка</a>
                        </div>
                        <a class="abs_href" href="/services/montazh-i-naladka-oborudovaniya/"></a>
                    </div>
                    <div class="how_we_works__item">
                        <div class="how_we_works__item__img-block">
                            <div class="how_we_works__item__img-block__number">
                                5
                            </div>
                            <img class="how_we_works__item__back" src="<?=get_theme_file_uri( '/images/work_schema/Vector.png' );?>" alt="">
                            <img class="how_we_works__item__icon" src="<?=get_theme_file_uri( '/images/work_schema/5.png' );?>" alt="">
                        </div>
                        <div class="how_we_works__item__text">
                            <a href="/service/">обслуживание</a>
                        </div>
                        <a class="abs_href" href="/service/"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page__main_footer__bottom__part">
            <?get_template_part( 'template__page__parts/bottom__part-of-page' );//нижняя часть контента, относящаяся к футеру (сертификаты, преимущества)?>
        </div>
    </div>
</div>
</div> <?//close <div id="page" class="site">?>
<?php
    get_footer();
    ?>
<script>
    $('.submit_btn').click(function(event) {
        $("#vanbas,#typekan,#probsvod,#istok,#obj,#pochta").val('');
        van='';probsvod='';
        $('.vanbas').filter('.on').each(function(i, obj) { van=van+' '+$(this).next().text(); }); ///ванна или бассейн
        $('.probsvod').filter('.on').each(function(i, obj) {  probsvod=probsvod+' '+$(this).next().text(); }); ///Проблемы с водой

        $('#vanbas').val(van);
        $('#probsvod').val(probsvod);

        $('#typekan').val($('.typekan').filter('.on').next().text());//Тип канализации
        $('#istok').val($('.istok').filter('.on').next().text());//источник
        $('#obj').val($('.obj').filter('.on').next().text());//объект
    });
    $(document).on("submit", "#calculator_fom", function(e) {
       e.preventDefault();
       var m_method = $(this).attr('method');
       var m_action = $(this).attr('action');
       var m_data = $(this).serialize();
       $.ajax({
    	 type: m_method,
    	 url: m_action,
    	 data: m_data,
    	 dataType: 'JSON',
    	 resetForm: 'true',
    	 success: function(response) {
    		   $('.thank_for_callback').css('display', 'flex');
    		   setTimeout(function() {
    			  $('.thank_for_callback').fadeOut('slow');
    			  $("#calculator_fom").trigger('reset');
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

     $( '.boll' ).on('input change',function() {
         if ($(this).val() == 0) {
             $(this).val(1);
           }
           if ($(this).val() == 6) {
             $(this).val(5);
           }
           console.log($(this).val())
     });
     $(document).ready(function() {
         $('.vanbas').click(function(){if($(this).hasClass('on')){$(this).removeClass('on');}else{$(this).addClass('on');}});
         $('.probsvod').click(function(){if($(this).hasClass('on')){$(this).removeClass('on');}else{$(this).addClass('on');}});
         $('.list_item , .box_list>span, .box_list>div').click(function(){$(this).prev().click();});
         $('.typekan').click(function(){$('.typekan').removeClass('on');$(this).addClass('on');});
         $('.istok').click(function(){$('.istok').removeClass('on');$(this).addClass('on');});
         $('.obj').click(function(){$('.obj').removeClass('on');$(this).addClass('on');});
         $('.pochta').click(function(){if($(this).hasClass('on')){$(this).removeClass('on');}else{$(this).addClass('on');}});
     });



</script>
