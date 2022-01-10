<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package aqua_arsenal
 */
?>

<div class="container bottom__callback">

      <div class="bottom__callback__contacts">
         <div class="bottom__callback__contacts__title">
            Контакты
         </div>
         <span>Город: </span> Москва <br>
         <span>График работы: </span><br>
         <span>Телефон: <a class="call_me" href="tel:89000000000">8 900 000 00 00</a></span><br>
         <span>Email: </span><a class="mail_href" href="mailto:email@email.ru">email@email.ru</a>
         <div class="call_btn footer">Заказать звонок</div>
      </div>
      <div class="bottom__callback__form">
         <div class="call_form">
            <div class="h3">оставьте заявку, и наш менеджер свяжется с вами в течение 10 минут</div>
              <form action="/mail.php?op=call-request-form" method="POST"  id="form_zakaz_zvonka2" >
                  <div style="display:none"><input name="surname" size="30" type="text" value=""></div>
                  <div class="form_inputs">
                      <div class="p-floating-container">
                          <!-- The input -->
                          <input class="overflow_index input__control textfield phone-input" name="tel"  type="text"  value="" autocomplete="off" placeholder="Номер телефона" required="">
                          <!-- The label -->
                          <label>Номер телефона</label>
                      </div>
                      <div class="p-floating-container">
                          <!-- The input -->
                          <input placeholder="Имя" class="input__control" required="" type="text" name="name" autocomplete="off" pattern="^[А-Яа-яЁё\s]+$" value="">
                          <!-- The label -->
                          <label>Имя</label>
                      </div>
                  </div>
                  <div class="btns"><input type="submit" value="ОСТАВИТЬ ЗАЯВКУ" class="btn_reg"></div>
                  <div class="licence__agree">
                     Заполняя форму, я даю согласие на обработку <a href="/about/privacy-policy/" target="_blank">персональных данных</a>
                  </div>
              </form>
          </div>
      </div>

</div>


<footer >
   <div class="black__background">
      <div class="footer__top container">
         <?php
         wp_nav_menu( array(
             'theme_location'=>'bottom',
             'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
             'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
             'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
             'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
             'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
         ) );
         ?>
      </div>
   </div>
   <div class="background__333">
      <div class="footer_bottom container">
         <div class="footer_bottom__col ds_none_lower_600px">
            <ul>
                 <li class="menu__item__title">ОЧИСТКА ВОДЫ</li>
             </ul>
            <?php
            wp_nav_menu( array(
                'theme_location'=>'bottom_col1',
                'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                'link_before'     => '<span>',
               'link_after'      => '</span>',
                'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
                'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
            ) );
            ?>
         </div>
         <div class="footer_bottom__col ds_none_lower_600px">
            <ul>
                 <li class="menu__item__title">ПО ТИПУ ФИЛЬТРАЦИИ</li>
            </ul>
            <?php
            wp_nav_menu( array(
               'theme_location'=>'bottom_col2',
               'link_before'     => '<span>',
              'link_after'      => '</span>',
               'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
               'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
               'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
               'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
               'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
            ) );
            ?>
         </div>
         <div class="footer_bottom__col ds_none_lower_600px">
            <ul>
                 <li class="menu__item__title"> <a href="/services/">УСЛУГИ</a> </li>
            </ul>
            <?php
            wp_nav_menu( array(
               'theme_location'=>'bottom_col3',
               'link_before'     => '<span>',
              'link_after'      => '</span>',
               'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
               'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
               'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
               'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
               'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
            ) );
            ?>
         </div>
         <div class="footer_bottom__col">
            <div class="social__wrapper">
               <div class="yandex__bage">
                  <img decoding="async" src="/wp-content/themes/intentionally-blank/images/orig.png" alt="">
               </div>
            </div>
            <div class="social__links">
               <a href=""><img decoding="async" src="/wp-content/themes/intentionally-blank/images/vk.png" alt=""></a>
               <a href=""><img decoding="async" src="/wp-content/themes/intentionally-blank/images/facebook.png" alt=""></a>
               <a href=""><img decoding="async" src="/wp-content/themes/intentionally-blank/images/inss.png" alt=""></a>
            </div>

         </div>
         <div class="footer_bottom__col last_col">
            <div class="middle_nav__callme">
                <a class="call_me" href="tel:89000000000">8 900 000 00 00</a>
                <span class="call_btn head">Заказать звонок</span>

            </div>
            <a href="mailto:email@email.ru">email@email.ru</a>
            <a class="policy_href" href="/about/privacy-policy/">Политика <br> конфидициальности</a>
         </div>
      </div>
   </div>


</footer>


<div  id="call_back">
   <div id="call">
           <div class="h3">Заказать обратный звонок</div>

           <form action="/mail.php?op=call-request-form" method="POST"  id="form_zakaz_zvonka" >
               <div style="display:none"><input name="surname" size="30" type="text" value=""></div>
               <div class="form_inputs">

                   <div class="p-floating-container">
                       <!-- The input -->
                       <input class="overflow_index input__control textfield phone-input" name="tel"  type="text"  value="" autocomplete="off" placeholder="Номер телефона" required="">
                       <!-- The label -->
                       <label>Номер телефона</label>
                   </div>
                   <div class="p-floating-container">
                       <!-- The input -->
                       <input placeholder="Имя" class="input__control" required="" type="text" name="name" autocomplete="off" pattern="^[А-Яа-яЁё\s]+$" value="">
                       <!-- The label -->
                       <label>Имя</label>
                   </div>
               </div>
               <div class="btns"><input type="submit" value="Отправить" class="btn_reg"></div>
               <div class="licence__agree">
                  Заполняя форму, я даю согласие на обработку <a href="/about/privacy-policy/" target="_blank">персональных данных</a>
               </div>
           </form>
       </div>
</div>
<div  id="call_back_product">
   <div id="call_product">
           <div class="h3">Оставить заявку</div>

           <form action="/mail.php?op=call-request-form-product" method="POST"  id="form_zakaz_zvonka__product" >
               <div style="display:none"><input name="surname" size="30" type="text" value=""></div>
               <div class="form_inputs">

                   <div class="p-floating-container">
                       <!-- The input -->
                       <input class="overflow_index input__control textfield phone-input" name="tel"  type="text"  value="" autocomplete="off" placeholder="Номер телефона" required="">
                       <!-- The label -->
                       <label>Номер телефона</label>
                   </div>
                   <div class="p-floating-container">
                       <!-- The input -->
                       <input placeholder="Имя" class="input__control" required="" type="text" name="name" autocomplete="off" pattern="^[А-Яа-яЁё\s]+$" value="">
                       <!-- The label -->
                       <label>Имя</label>
                   </div>
                   <input type="text" name="product_name" value="" style="display:none" >
               </div>
               <div class="btns"><input type="submit" value="Отправить" class="btn_reg"></div>
               <div class="licence__agree">
                  Заполняя форму, я даю согласие на обработку <a href="/about/privacy-policy/" target="_blank">персональных данных</a>
               </div>
           </form>
       </div>
</div>
<div class="thank_for_callback">

    <div class="thank_for_callback__text">
        Запрос успешно отправлен!
    </div>

</div>
<img src="<?=get_template_directory_uri()?>/images/arrow.png" id="toTop" alt=""/>

<script src="<?=get_theme_file_uri( '/js/jquery-3.5.1.min.js' );?>"></script>
<script src="<?=get_theme_file_uri( '/js/jquery.maskedinput.min.js' );?>"></script>
<script src="<?=get_theme_file_uri( '/js/slick_slider/slick.min.js' );?>"></script>
<link rel="stylesheet" href="<?=get_theme_file_uri( '/js/slick_slider/slick.css' );?>">
<!-- <link rel="stylesheet" href="<?=get_theme_file_uri( '/js/slick_slider/slick-theme.css' );?>">  -->

<!-- Add fancyBox -->
<link rel="stylesheet" href="<?=get_theme_file_uri( '/js/fancybox/jquery.fancybox.css' );?>" type="text/css" media="screen" />
<script src="<?=get_theme_file_uri( '/js/fancybox/jquery.fancybox.pack.js' );?>"></script>


<link rel="stylesheet" type="text/css" href="/wp-content/themes/intentionally-blank/js/slick_slider/slick-theme.css"/>




<script src="<?=get_theme_file_uri( '/js/common.js' );?>"></script>
<script>
// $(document).ready(function() {
//     $('.banner__slides').slick({
//              dots: false,
//              infinite: true,
//              fade:true,
//              // autoplay:true,
//              autoplaySpeed: 4000,
//              speed: 1600,
//              slidesToShow: 1,
//              draggable: true,
//           touchMove: true,
//              arrows:false,
//              adaptiveHeight: true,
//              slidesToScroll: 1,

//          })
//          $('.clean_systems__list').slick({
//                   dots: true,
//                   infinite: true,
//                   fade:true,
//                   autoplay:true,
//                   autoplaySpeed: 5000,
//                   speed: 1600,
//                   slidesToShow: 1,
//                   rows:2,
//                   arrows:false,
//                   slidesToScroll: 1,

//               })
// });
</script>
</body>

</html>
