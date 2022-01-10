<?php
/*
Template Name: Страница услуг
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
        <div class="page__main-part__content__previews">
            <?


            $stati_children = new WP_Query(array(
              'post_type' => 'page',
              'post_parent' => get_the_ID(),
              'order' => 'desc'
              )
            );

            if($stati_children->have_posts()) :
              while($stati_children->have_posts()): $stati_children->the_post();
            ?>

                <div class="article__item service_page">
                    <div class="article__img">
                        <?echo '<a href="'.get_the_permalink($stati_children->ID).'">';the_post_thumbnail();?>

                        <?echo '</a>';?>
                    </div>
                    <div class="article__content">
                        <div class="article__title">
                            <?echo '<a href="'.get_the_permalink($stati_children->ID).'">';?>
                            <?echo '<span>'.get_the_title($stati_children->ID).'</span>';?>
                            <?echo '</a>';?>
                        </div>
                        <div class="article__preview">
                            <?
                                the_excerpt();
                        //echo preview_text($stati_children->post_content, 400); //придется через ACF заводить поле для анонса и выводить его?>
                        </div>
                    <div class="price_seemore_block">
                        <span class="price_service"><?the_field('цена');?></span>
                        <?echo '<a class="services_see_more" href="'.get_the_permalink($stati_children->ID).'">Подробнее</a>';?>
                    </div>

                    </div>

                     <?echo '<a class="abs_href" href="'.get_the_permalink($stati_children->ID).'"></a>';?>
                </div>
                <?
              endwhile;
            endif;
         wp_reset_query();?>
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
