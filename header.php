<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aqua_arsenal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/wp-content/themes/intentionally-blank/css/master.css">
    <meta name="robots" content="noindex, nofollow" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>

	<nav id="site-navigation" class="main-navigation __hide_for_mobile">
        <?php
        wp_nav_menu( array(
            'theme_location'=>'top',
            'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
            'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
            'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
            'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
        ) );
        ?>
	</nav>

    <!-- мобильное меню -->
    <nav class="__hide_for_pc for_mobile">
       <div class="menu_wrapper">
          <svg class="ham hamRotate ham8" viewBox="0 0 100 100" width="70" onclick="this.classList.toggle('active');$('.menu_list_hidden').slideToggle('slow');   $('.geo_wrapper').css('display','none');">
             <path
                class="line top"
                d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
             <path
                class="line middle"
                d="m 30,50 h 40" />
             <path
                class="line bottom"
                d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
          </svg>

       </div>
       <div class="menu_list_hidden">
           <?php
           wp_nav_menu( array(
               'theme_location'=>'top',
               'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
               'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
               'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
               'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
               'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
           ) );
           ?>
       </div>

    </nav>
    <!-- мобильное меню -->

    <div class="middle_nav container">
        <a href="/">
            <img class="logo" src="/wp-content/themes/intentionally-blank/images/logo.png" alt="Аква арсенал">
        </a>
        <div class="middle_nav__wrapper">
            <div class="middle_nav__text">
                СИСТЕМЫ ОЧИСТКИ ВОДЫ <br>
                <span>в Москве и области</span>
                <img class="leaf_png" src="/wp-content/themes/intentionally-blank/images/leafb.png" alt="">
            </div>
            <div class="middle_nav__worktime">
                <span>Режим работы</span>
                <span>пн-вс 9:00-20:00</span>
                <span><a href="mailto:email@email.ru">email@email.ru</a></span>

            </div>
            <div class="middle_nav__callme">
                <a class="call_me" href="tel:89000000000">8 900 000 00 00</a>
                <!-- <span class="call_btn head">Заказать звонок</span> -->
            </div>
            <div class="middle_nav__podbor">
                <a class="call_btn" href="javascript:void(0);">Заказать звонок</a>
            </div>
        </div>
    </div>
    <div class="bottom_nav container">
        <div class="bottom_nav__item">

            <a class="abs_href" href="/calculator/"></a>
            <img decoding="async" src="/wp-content/themes/intentionally-blank/images/calculator-PNG-transparent-images-free-download-clipart-pics-calculator1600.png" alt="">
            <a href="/calculator/">Калькулятор подбора оборудования</a>
        </div>
        <div class="bottom_nav__item">
            <a class="abs_href" href="/sistemy-ochistki/dlya-zagorodnogo-doma/"></a>
            <img decoding="async" src="/wp-content/themes/intentionally-blank/images/english-cottage.png" alt="">
            <a href="/sistemy-ochistki/dlya-zagorodnogo-doma/">Очистка воды в загородном доме</a>
        </div>
        <div class="bottom_nav__item">
            <a class="abs_href" href="/sistemy-ochistki/dlya-kvartiry/"></a>
            <!-- <img decoding="async" src="/wp-content/themes/intentionally-blank/images/apartment-house.png" alt="" style="height: auto;"> -->
            <img decoding="async" src="/wp-content/themes/intentionally-blank/images/english-cottage_2.png" alt="" style="height: auto;">
            <a href="/sistemy-ochistki/dlya-kvartiry/">Очистка воды в квартире</a>
        </div>
        <div class="bottom_nav__item">
            <a class="abs_href" href="/service/"></a>
            <img decoding="async" src="/wp-content/themes/intentionally-blank/images/gears.png" alt="">
            <a href="/service/">Сервисное обслуживание систем очистки</a>
        </div>
    </div>

</header>


<div class="overlay" style="display: none;"></div>
<!-- вывод сайдбара -->
    <!-- <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
    	<ul id="sidebar">
    		<?php dynamic_sidebar( 'left-sidebar' ); ?>
    	</ul>
    <?php endif; ?> -->


<?php wp_body_open(); ?>



<div id="page" class="site">
