<div class="aside__menu">
    <div class="aside__menu__item">
        <div class="aside__menu__item__parent aside__menu__item__parent__with__child">
            ОЧИСТКА ВОДЫ
            <img class="abs_img" src="/wp-content/themes/intentionally-blank/images/expand_arrow.png" alt="">
        </div>
        <div class="aside__menu__item__inner">
            <?php
            wp_nav_menu( array(
                'theme_location'=>'aside_clean_water',

                'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                'menu_class'      => 'aside__menu__item__child',          // (string) class самого меню (ul тега)
                'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)

            ) );
            ?>
        </div>
    </div>
    <div class="aside__menu__item">
        <div class="aside__menu__item__parent aside__menu__item__parent__with__child">
            ПО ТИПУ ФИЛЬТРАЦИИ
            <img class="abs_img" src="/wp-content/themes/intentionally-blank/images/expand_arrow.png" alt="">
        </div>
        <div class="aside__menu__item__inner">
            <?php
            wp_nav_menu( array(
                'theme_location'=>'aside_filter',

                'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                'menu_class'      => 'aside__menu__item__child',          // (string) class самого меню (ul тега)
                'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)

            ) );
            ?>
        </div>
    </div>

    <div class="aside__menu__item">
        <?php
        wp_nav_menu( array(
            'theme_location'=>'aside_otherpart',
            'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
            'menu_class'      => 'aside__menu__item__parent',          // (string) class самого меню (ul тега)
            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
            'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
            'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)

        ) );
        ?>
    </div>

</div>

<div class="aside__sales">
    <?//вывод акций
    $stati_children = new WP_Query(array(
      'post_type' => 'page',
      'post_parent' => '16',
      'posts_per_page' => '3',
      'order' => 'desc'
      )
    );

    if($stati_children->have_posts()) :
      while($stati_children->have_posts()): $stati_children->the_post();


          echo '<a href="'.get_the_permalink().'">';
          the_post_thumbnail();
          echo '</a>';
      endwhile;
    endif;
     wp_reset_query();?>

</div>


<div class="aside__articles">
    <div class="aside__articles__title">
        СТАТЬИ
    </div>

    <div class="aside__articles__list">
        <?//вывод статей
        $stati_children = new WP_Query(array(
          'post_type' => 'page',
          'post_parent' => '14',
          'posts_per_page' => '2',
          'order' => 'desc'
          )
        );

        if($stati_children->have_posts()) :
          while($stati_children->have_posts()): $stati_children->the_post();
              echo '<a class="aside__articles__item" href="'.get_the_permalink().'">';
               the_post_thumbnail( 'thumbnail' );
               echo '<div><span class="aside__articles__item__title">'.
              get_the_title().
               '</span><span> Дата: '.get_the_date('j F Y').'</span></div>';
              echo '</a>';
          endwhile;
        endif;
         wp_reset_query();?>
    </div>
</div>



<?php
?>
