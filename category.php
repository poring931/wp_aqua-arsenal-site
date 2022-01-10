<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
              <div class="page__main-part__content__innertext">
                  <div class="page__main-part__content__innertext__descr">
                      <?php echo category_description();
                      if (category_description() == ''){
                           echo 'Скоро тут появится текст.';
                      }

                      ?>
                  </div>

                 <?get_template_part( 'template__page__parts/how_we_work' );?>
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
                    'posts_per_page'   =>100                               # кол-во постов вывода/загрузки
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
                                         <!--<?if (get_field('harakteristiki')!=''):?>
                                             <div class="clean_systems__item__description__attributes">
                                                 <?the_field('harakteristiki')?>
                                             </div>
                                         <?endif;?>-->
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
                                 .page__main-part__content__innertext .middle_nav__podbor{
                                      display: none;
                                 }
                            </style>
                         <?}
                    wp_reset_postdata();
                 ?>
                 <?php //var_dump($mypost_Query->max_num_pages);// AJAX загрузка постов ?>
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

                  <!--  <a href = "javascript:void(0);" class="btn-loadmore" title="Загрузить еще"
                         data-param-posts='<?php echo serialize($mypost_Query->query_vars); ?>'
                         data-max-pages='<?php echo $mypost_Query->max_num_pages; ?>'
                         data-tpl='<?=$cat_slug;?>'
                    >
                         <i class="fas fa-redo"></i> Показать еще
                    </a>-->
                 </div>
                 <a href="/calculator/">Калькулятор подбора оборудования</a>
             </div>
               </div>
         </div>
         <div class="os_form_main_page">
             <div class="call_form">
                 <div class="h3">остались вопросы? не смогли подобрать систему самостоятельно? оставьте заявку и наш менеджер поможем вам</div>
                 <form action="/mail.php?op=call-request-form" method="POST" id="form_zakaz_zvonka3">
                     <div style="display:none"><input name="surname" size="30" type="text" value=""></div>
                     <div class="form_inputs">
                         <div class="p-floating-container">
                             <!-- The input -->
                             <input class="overflow_index input__control textfield phone-input" name="tel" type="text" value="" autocomplete="off" placeholder="Номер телефона" required="">

                         </div>
                         <div class="p-floating-container">
                             <!-- The input -->
                             <input placeholder="Имя" class="input__control" required="" type="text" name="name" autocomplete="off" pattern="^[А-Яа-яЁё\s]+$" value="">

                         </div>
                     </div>
                     <div class="btns"><input type="submit" value="ОСТАВИТЬ ЗАЯВКУ" class="btn_reg"></div>

                 </form>
             </div>
         </div>
        <?php $queried_object = get_queried_object(); $taxonomy = $queried_object->taxonomy;$term_id = $queried_object->term_id; if( get_field('текст_под_товарами', $taxonomy . '_' .$term_id) ): ?>
            <div class="page__main_footer__bottom__part">
            <?php $queried_object = get_queried_object(); $taxonomy = $queried_object->taxonomy;$term_id = $queried_object->term_id; the_field('текст_под_товарами', $taxonomy . '_' .$term_id); ?>

                
            </div>
        <?php endif; ?>
        
 
	

         <div class="page__main_footer__bottom__part">
             <?get_template_part( 'template__page__parts/bottom__part-of-page' );//нижняя часть контента, относящаяся к футеру (сертификаты, преимущества)?>
         </div>

     </div>
 </div>




 </div> <?//close <div id="page" class="site">?>

 <?php

 get_footer();
