<?php
/*
Template Name: Товар
Template Post Type: post
*/

// … остальной код шаблона

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
            <div class="clean_systems__list">
                <div class="clean_systems__item post-<?php the_ID(); ?>" >
                      <div class="clean_systems__item__img">
                          <? if (get_field('вывести_плашку_акция')):?>
                          <img class="abs_img" src="<?=get_theme_file_uri( '/images/akcia.png' );?>" alt="Акция">
                          <?endif;?>
                          <a href="<?php the_permalink(); ?>"></a>
                          <?php the_post_thumbnail(); ?>

                      </div>
                      <div class="clean_systems__item__description">
                          <div class="clean_systems__item__description__title">
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </div>
                          <?if (get_field('kratkoe_opisanie')!=''):?>
                              <div class="clean_systems__item__description__short__descr">
                                  <?the_field('kratkoe_opisanie')?>
                              </div>
                          <?endif;?>
                          <?if (get_field('harakteristiki')!=''):?>
                              <div class="clean_systems__item__description__attributes">
                                  <?the_field('harakteristiki')?>
                              </div>
                          <?endif;?>
                          <div class="clean_systems__item__price__block">
                              <?if (get_field('tekushhaya_cena')!=''):?>
                                  <div class="clean_systems__item__price__block__current" <?if (get_field('novaya_cena')!='') echo 'style="text-decoration:line-through;"';?>>
                                      <?the_field('tekushhaya_cena')?> руб.
                                  </div>
                              <?endif;?>
                              <?if (get_field('novaya_cena')!=''):?>
                                  <div class="clean_systems__item__price__block__new">
                                      <?the_field('novaya_cena')?> руб.
                                  </div>
                              <?endif;?>
                          </div>
                          <div class="clean_systems__item__btns__block">
                                  <a class="clean_systems__item__callme" href="javascript:void(0);">Заказать</a>
                                  <a class="seemore" href="<?php the_permalink(); ?>">Подробнее</a>
                          </div>
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
