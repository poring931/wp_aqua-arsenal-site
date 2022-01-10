<?php
/*
Template Name: Шаблон акции(главная)
*/


function preview_text($value, $limit = 300)
{
	$value = stripslashes($value);
	$value = htmlspecialchars_decode($value, ENT_QUOTES);
	$value = str_ireplace(array('<br>', '<br />', '<br/>'), ' ', $value);
	$value = strip_tags($value);
	$value = trim($value);

	if (mb_strlen($value) < $limit) {
		return $value;
	} else {
		$value   = mb_substr($value, 0, $limit);
		$length  = mb_strripos($value, ' ');
		$end     = mb_substr($value, $length - 1, 1);

		if (empty($length)) {
			return $value;
		} elseif (in_array($end, array('.', '!', '?'))) {
			return mb_substr($value, 0, $length);
		} elseif (in_array($end, array(',', ':', ';', '«', '»', '…', '(', ')', '—', '–', '-'))) {
			return trim(mb_substr($value, 0, $length - 1)) . '...';
		} else {
			return trim(mb_substr($value, 0, $length)) . '...';
		}

		return trim();
	}
}
?>
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

                    <div class="article__item">
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
                            <?echo '<a class="article_see_more" href="'.get_the_permalink($stati_children->ID).'">Читать далее</a>';?>
                        </div>
                         <?echo '<a class="abs_href" href="'.get_the_permalink($stati_children->ID).'"></a>';?>
                    </div>
                    <?
                  endwhile;
                endif;
             wp_reset_query();?>
            </div>
            <?get_template_part( 'template__page__parts/how_we_work' );?>
        </div>
        <div class="page__main_footer__bottom__part">
            <?get_template_part( 'template__page__parts/bottom__part-of-page' );//нижняя часть контента, относящаяся к футеру (сертификаты, преимущества)?>
            <?//get_template_part( 'template__page__parts/why_us.php' );//нижняя часть контента, относящаяся к футеру (сертификаты, преимущества)?>
        </div>
    </div>
</div>
</div> <?//close <div id="page" class="site">?>
<?php
    get_footer();
    ?>
