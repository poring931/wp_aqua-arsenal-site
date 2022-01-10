<?php
/*
Template Name: Стандрартный шаблон поста
Template Post Type: post
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
                     <?php echo category_description(); ?>
                 </div>

                <?get_template_part( 'template__page__parts/how_we_work' );?>

                <div class="use_type">
                    <div class="title">
                        по месту применения
                    </div>
                    <div class="use_type__list">
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/011-house-1.png' );?>" alt="">
                            <a href="/sistemy-ochistki/dlya-kottedzha/">для коттеджа</a>
                            <a class="abs_href" href="/sistemy-ochistki/dlya-kottedzha/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/010-appartment.png' );?>" alt="">
                            <a href="/sistemy-ochistki/dlya-kvartiry/">для квартиры</a>
                            <a class="abs_href" href="/sistemy-ochistki/dlya-kvartiry/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/015-pipe-1.png' );?>" alt="">
                            <a href="/sistemy-ochistki/dlya-skvazhiny/">для скважины</a>
                            <a class="abs_href" href="/sistemy-ochistki/dlya-skvazhiny/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/009-home.png' );?>" alt="">
                            <a href="/sistemy-ochistki/dlya-dachi/">на дачу</a>
                            <a class="abs_href" href="/sistemy-ochistki/dlya-dachi/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/013-tap.png' );?>" alt="">
                            <a href="/sistemy-ochistki/pod-mojku/">под мойку</a>
                            <a class="abs_href" href="/sistemy-ochistki/pod-mojku/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/005-factory.png' );?>" alt="">
                            <a href="/sistemy-ochistki/dlya-promyshlennogo-primeneniya/">для промышленного применения</a>
                            <a class="abs_href" href="/sistemy-ochistki/dlya-promyshlennogo-primeneniya/"></a>
                        </div>
                    </div>

                    <div class="title">
                        по типу применения
                    </div>
                    <div class="use_type__list">
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/018-oxygen.png' );?>" alt="">
                            <a href="/sistemy-ochistki/aeraciya/">аэрация</a>
                            <a class="abs_href" href="/sistemy-ochistki/aeraciya/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/003-magnet.png' );?>" alt="">
                            <a href="/sistemy-ochistki/udalenie-zheleza/">удаление железа</a>
                            <a class="abs_href" href="/sistemy-ochistki/udalenie-zheleza/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/001-feather.png' );?>" alt="">
                            <a href="/sistemy-ochistki/umyagchenie-vody/">умягчение</a>
                            <a class="abs_href" href="/sistemy-ochistki/umyagchenie-vody/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/006-water-drop.png' );?>" alt="">
                            <a href="/sistemy-ochistki/obezzarazhivanie/">обеззараживание</a>
                            <a class="abs_href" href="/sistemy-ochistki/obezzarazhivanie/"></a>
                        </div>
                        <div class="use_type__item">
                            <img src="<?=get_theme_file_uri( '/images/cleaning_systems/012-house.png' );?>" alt="">
                            <a href="/sistemy-ochistki/kompleksnye-sistemy/">комплексные системы</a>
                            <a class="abs_href" href="/sistemy-ochistki/kompleksnye-sistemy/"></a>
                        </div>
                    </div>
                </div>


                <div class="clean_systems__list">
                    <?php
                        $mypost_Query = new WP_Query( array(
                        'post_type'        => 'post',                  # post, page, custom_post_type
                        'post_status'      => 'publish',                       # статус записи
                        'posts_per_page'   => 100                                # кол-во постов вывода/загрузки
                        ) );
                         //query_posts( $query_string .'&order=DESC&posts_per_page=2' );
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
                            }
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

                        <!--<a href = "javascript:void(0);" class="btn-loadmore" title="Загрузить еще"
                             data-param-posts='<?php echo serialize($mypost_Query->query_vars); ?>'
                             data-max-pages='<?php echo $mypost_Query->max_num_pages; ?>'
                             data-tpl='sistemy-ochistki'
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
