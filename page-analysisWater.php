<?php
/*
Template Name: Страница Анализ воды
*/
get_header();
?>


<div class="container page__content">
    <aside class="page__aside">
        <?get_template_part( 'template__page__parts/sidebar' );//левый главный сайдбар?>
    </aside>
    <div class="page__main-part">
        <div class="page__main-part__content">
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
        </div>
        <div class="page__main-part__content__innertext">
            <?the_content();?>
        </div>
        <div class="clean_systems__item__btns__block" style="    justify-content: center;">
                <a class="clean_systems__item__callme" style="min-width:250px;margin-right:0;" href="javascript:void(0);">Оставить заявку</a>

        </div>
        <?get_template_part( 'template__page__parts/how_we_work' );?>
        <div class="page__main_footer__bottom__part">
            <?get_template_part( 'template__page__parts/bottom__part-of-page' );//нижняя часть контента, относящаяся к футеру (сертификаты, преимущества)?>
        </div>

    </div>
</div>




</div> <?//close <div id="page" class="site">?>

<?php

get_footer();
