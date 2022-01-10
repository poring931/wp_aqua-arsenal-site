<?php
/**
 * Intentionally Blank Theme functions
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */


function add_favicon() {
	echo '<link rel=»shortcut icon» type=»image/png» href=»/favicon.ico />';
   }
add_action('wp_head', 'add_favicon');


register_nav_menus(array(
	'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
	'bottom' => 'Футер__верхняя часть',      //Название другого месторасположения меню в шаблоне
	'bottom_col1' => 'Футер__нижняя часть - столбец 1',      //Название другого месторасположения меню в шаблоне
	'bottom_col2' => 'Футер__нижняя часть - столбец 2',      //Название другого месторасположения меню в шаблоне
	'bottom_col3' => 'Футер__нижняя часть - столбец 3',
    'aside_filter' => 'Сайдбар - по типу фильтрации',      //Название другого месторасположения меню в шаблоне
    'aside_clean_water' => 'Сайдбар - очистка воды',      //Название другого месторасположения меню в шаблоне
    'aside_otherpart' => 'Сайдбар - оставшаяся часть'      //Название другого месторасположения меню в шаблоне
));

add_filter('wp_nav_menu_objects', 'css_for_nav_parrent');
function css_for_nav_parrent( $items ){
	foreach( $items as $item ){
		if( __nav_hasSub( $item->ID, $items ) )
			$item->classes[] = 'menu-parent-item'; // все элементы поля "classes" меню, будут совмещены и выведены в атрибут class HTML тега <li>
	}

	return $items;
}
function __nav_hasSub( $item_id, $items ){
	foreach( $items as $item ){
		if( $item->menu_item_parent && $item->menu_item_parent == $item_id )
			return true;
	}

	return false;
}


add_theme_support( 'post-thumbnails' ); // для всех типов постов




$text_domain='test';
register_sidebar( array(
	'id'          => 'footer-menu1',
	'name'        => __( 'Footer part 1', $text_domain ),
	'description' => __( 'Очистка воды', $text_domain ),
) );
register_sidebar( array(
	'id'          => 'footer-menu2',
	'name'        => __( 'Footer part 2', $text_domain ),
	'description' => __( 'По типу фильтрации', $text_domain ),
) );
register_sidebar( array(
	'id'          => 'footer-menu3',
	'name'        => __( 'Footer part 3', $text_domain ),
	'description' => __( 'Услуги', $text_domain ),
) );

register_sidebar( array(
	'id'          => 'left-sidebar',
	'name'        => __( 'Сайдбар основной', $text_domain ),
	'description' => __( 'Сайдбар основной', $text_domain ),
) );











// AJAX загрузка постов
function load_posts () {
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница

    query_posts( $args );
    if ( have_posts() ) {
        while ( have_posts() ) { the_post();

            if ($_POST['tpl'] ) {?>
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
            <?}



        }
        die();
    }
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
