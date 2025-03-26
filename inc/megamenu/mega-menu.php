<?php

class Master_Megamenu
{


    public function __construct()
    {
        add_action('wp_nav_menu_item_custom_fields', [$this, 'master_mega_menu_add_custom_fields'], 10, 5);
        add_action('wp_update_nav_menu_item', [$this, 'master_mega_menu_update_castum_fields'], 10, 2);
        add_filter('wp_setup_nav_menu_item', [$this, 'master_mega_menu_setup_nav_fields']);
    }

    public function master_mega_menu_setup_nav_fields($menu_item)
    {
        $menu_item->megamenu = get_post_meta($menu_item->ID, '_menu_megamenu', true);
        $menu_item->submegamenu = get_post_meta($menu_item->ID, '_menu_submegamenu', true);
        $menu_item->isfullwidth = get_post_meta($menu_item->ID, '_menu_is_fullwidth', true);

        return $menu_item;
    }

    public function master_mega_menu_update_castum_fields($menu_id, $menu_item_db_id)
    {

        if (isset($_REQUEST['menu-megamenu'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_megamenu', 1);
        } else {
            update_post_meta($menu_item_db_id, '_menu_megamenu', 0);
        }

        if (isset($_REQUEST['menu-submegamenu'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_submegamenu', $_REQUEST['menu-submegamenu'][$menu_item_db_id]);
        }


        if (isset($_REQUEST['menu-is-fullwidth'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_is_fullwidth', 1);
        } else {
            update_post_meta($menu_item_db_id, '_menu_is_fullwidth', 0);
        }
    }


    public function master_mega_menu_add_custom_fields($item_id, $item, $depth)
    {

?>


        <div class="menu-options">
            <?php if ($depth == 0) : ?>

                <h4>تنظیمات مگامنو</h4>
                <p>
                    <label for="edit-menu-megamenu-<?php echo $item_id ?>">فعالسازی مگامنو</label>
                    <input <?php echo checked(!empty($item->megamenu), 1, false) ?> type="checkbox" id="edit-menu-megamenu-<?php echo $item_id ?>" class="edit-menu-item-custom" name="menu-megamenu[<?php echo $item_id ?>]" value="1">
                </p>

                <?php $mega_menu_lists = $this->get_megamenus(); ?>
                <p>
                    <label for="">انتخاب مگامنو</label>
                    <select name="menu-submegamenu[<?php echo $item_id ?>]" id="edit-menu-submegamenu-<?php echo $item_id ?>">
                        <?php foreach ($mega_menu_lists as $key => $menu) : ?>

                            <?php if ($key == $item->submegamenu) : ?>

                                <option selected value="<?php echo $key ?>"><?php echo $menu ?></option>

                            <?php else : ?>

                                <option value="<?php echo $key ?>"><?php echo $menu ?></option>

                            <?php endif; ?>




                        <?php endforeach; ?>
                    </select>
                </p>

                <p>
                    <label for="edit-menu-is-fullwidth-<?php echo $item_id ?>">مگامنو تمام عرض</label>
                    <input <?php echo checked(!empty($item->isfullwidth), 1, false) ?> type="checkbox" id="edit-menu-is-fullwidth-<?php echo $item_id ?>" class="edit-menu-item-custom" name="menu-is-fullwidth[<?php echo $item_id ?>]" value="1">
                </p>

            <?php endif; ?>
        </div>

<?php

    }

    public function get_megamenus()
    {

        $menus = [];
        $lists = get_posts(['posts_per_page' => -1, 'post_type' => 'mastermega']);

        foreach ($lists as $menu) {
            $menus[$menu->ID] = $menu->post_title;
        }

        return $menus;
    }
}

new Master_Megamenu();
