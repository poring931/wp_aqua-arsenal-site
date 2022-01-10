<?php
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
            <div class="page__main-part__content__innertext">
                <?the_content();?>
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
