<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aqua_arsenal
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
           
                 <div class="clean_systems__item product post-<?php the_ID(); ?>" >
                 
                       <div class="clean_systems__item__img">
                           <? if (get_field('вывести_плашку_акция')):?>
                           <img class="abs_img" src="<?=get_theme_file_uri( '/images/akcia.png' );?>" alt="Акция">
                           <?endif;?>
                           <a href="<?php the_permalink(); ?>"></a>
                           <?php the_post_thumbnail('full'); ?>
                       </div>
                       <div class="clean_systems__item__description">
                       <?if (get_field('kratkoe_opisanie')!=''):?>
                               <div class="clean_systems__item__description__short__descr">
                                   <?the_field('kratkoe_opisanie')?>
                               </div>
                           <?endif;?>
                        <!--   <?if (get_field('harakteristiki')!=''):?>
                               <div class="clean_systems__item__description__attributes">
                                   <?the_field('harakteristiki')?>
                               </div>
                           <?endif;?> -->
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
                           </div>
               
                        </div>
                  </div>
                <?if (get_field('harakteristiki')!='' || get_field('harakteristiki')!=''):?>
                <div class="clean_systems__item__tabs tabs">
                    
                        <div class="tabs__nav">
							                            <?if (get_field('harakteristiki')!=''):?>
                            <div class="tabs__nav-btn  " data-tab="#tab_1">Характеристики</div>
                            <?endif;?>
                            <?if (get_field('polnoe_opisanie')!=''):?>
                            <div class="tabs__nav-btn" data-tab="#tab_2">Описание</div>
                            <?endif;?>
                        </div>
                        <div class="tabs__content">
                            <?if (get_field('polnoe_opisanie')!=''):?>
                            <div class="tabs__item" id="tab_2">
                                <div class="clean_systems__item__description__attributes">
                                    <?the_field('polnoe_opisanie')?>
                                </div>
                            </div>
                            <?endif;?>
                            <?if (get_field('harakteristiki')!=''):?>
                            <div class="tabs__item  " id="tab_1">
                                    <div class="clean_systems__item__description__attributes">
                                        <?the_field('harakteristiki')?>
                                    </div>
                            </div>
                            <?endif;?>
                          
                        </div>
                </div>
                <?endif;?>
              <div class="product__text">
                   <?the_content()?>
              </div>
              <div class="product__similiar">
                   <style media="screen">
                   .product__similiar .post-<?php the_ID(); ?>{
                       display: none!important
                   }
                   </style>
                   <div class="h2">Похожие товары</div>
                   <div class="clean_systems__list">
              <?php $category = get_the_category(get_the_ID());
                  if ( is_single() ) {
                      $cats =  get_the_category();
                      $cat = $cats[0];
                  } else {
                      $cat = get_category( get_query_var('cat') );
                  }
                  $cat_slug = $cat->slug; // ярлык рубрики
                  $cat_id = $cat->cat_ID; // ID рубрики
                  $cat_name = $cat->name; // название рубрики

                 // echo $cat_slug;
                 $mypost_Query = new WP_Query( array(
                 'post_type'        => 'post',                  # post, page, custom_post_type
                  'category_name' => $cat_slug,
                 'post_status'      => 'publish',                       # статус записи
                 'posts_per_page'   =>2                               # кол-во постов вывода/загрузки
                 ) );

                 if( $mypost_Query->have_posts() ){
                        while( $mypost_Query->have_posts() ){
                             $mypost_Query->the_post();
                             ?>
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
                             <?php
                          }
                     } else{?>
                         <style media="screen">
                              .middle_nav__podbor{
                                   display: none;
                              }
                         </style>
                      <?}
                 wp_reset_postdata();
              ?>
              <?php // AJAX загрузка постов ?>
              <?php if ( $mypost_Query->max_num_pages > 1 ) { ?>
                 <script> var this_page = 1; </script>
                 <?php
                 //Получить кол-во постов в определенной категории (типе записи)

                 $count_posts = wp_count_posts('post'); // post, page, custom_post_type
                 $published_posts_all = $count_posts->publish;  // общее кол-во записей
                 ?>
              <?php }  // по сколько записей подгружать?>
          </div>
          <div class="clean_systems__btns">
              <div class="middle_nav__podbor">

                 <a href = "javascript:void(0);" class="btn-loadmore" title="Загрузить еще"
                      data-param-posts='<?php echo serialize($mypost_Query->query_vars); ?>'
                      data-max-pages='<?php echo $mypost_Query->max_num_pages; ?>'
                      data-tpl='<?=$cat_slug;?>'
                 >
                      <i class="fas fa-redo"></i> Показать еще
                 </a>
              </div>
                 <a class="" href="/podbor-oborudovaniya/">Калькулятор подбора оборудования</a>
          </div>
              </div>
         </div>
         <div class="page__main_footer__bottom__part">
             <?get_template_part( 'template__page__parts/bottom__part-of-page' );//нижняя часть контента, относящаяся к футеру (сертификаты, преимущества)?>
         </div>

     </div>
 </div>


<script>
    'use strict';
let tabsBtn = document.querySelectorAll('.tabs__nav-btn'), //получаем все кнопки
    tabsItems = document.querySelectorAll('.tabs__item')


tabsBtn.forEach(onTabClick);

function onTabClick(item) {
    item.addEventListener('click', function(event) {
        let tabId = this.getAttribute('data-tab'),//плучаем привязку к id tabs__item
            currentTab = document.querySelector(tabId);

        if (!this.classList.contains('active')) {
            tabsBtn.forEach((item) => {
                item.classList.remove('active');
            });

            tabsItems.forEach((item) => {
                item.classList.remove('active');
            });

            this.classList.add('active');
            currentTab.classList.add('active');
        } else {
            this.classList.remove('active');
            currentTab.classList.remove('active');
            // для выключения
        }

    })
}
<?if (get_field('harakteristiki')!=''):?>
document.querySelector('.tabs__nav-btn:nth-child(1)').click();//выбираем активный таб
<?else:?>
document.querySelector('.tabs__nav-btn:nth-child(2)').click();//выбираем активный таб
<?endif;?>
</script>

 </div> <?//close <div id="page" class="site">?>

 <?php

 get_footer();
