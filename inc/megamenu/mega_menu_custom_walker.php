<?php
/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
class master_mega_menu_walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
    {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = $full_width = $mega_menu_cols = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);
        $megamenu = empty($item->megamenu) ? "std-menu" : "mega-menu";
        $menu_has_children = '';
        if (! empty($item->megamenu)) {
            $full_width = empty($item->isfullwidth) ? "" : "mega-menu-fw";
            $menu_has_children = 'menu-item-has-children';
        }

        $menu_width      = empty($item->menuwidth) ? "" : 'style="width: ' . esc_attr($item->menuwidth) . 'px;"';
        $hashtmlcontent  = empty($item->htmlcontent) ? "" : "menu-item-html";
        $hidetitle  = empty($item->hidetitle) ? "" : "menu-hide-title";
  
        $class_cols = "";
        if (! empty($item->menucol)  && $item->menucol != 0) {
            $class_cols = 'col-md-'.esc_attr($item->menucol).' col-sm-12 col-xs-12';
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="level-'.esc_attr($depth).' menu-item-' . esc_attr($item->ID) . '  ' . esc_attr($menu_has_children) . ' '.esc_attr($hidetitle).' ' . esc_attr($class_names) . ' '. esc_attr($class_cols) .' ' . esc_attr($megamenu) . ' ' . esc_attr($full_width) . ' ' . esc_attr($hashtmlcontent) . '" ' . esc_attr($menu_width);
        $output .= $indent . '<li ' . wp_kses($value.$class_names, 'social') . '>';
        $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
        $prepend = '<span class="menu-item-text">';
        $append  = '</span>';
        $description = ! empty($item->description) ? '<span class="menu-item-desc">' . esc_attr($item->description) . '</span>' : '';
        if ($depth != 0) {
            $append = $prepend = "";
        }
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $prepend;
       

        $item_output .= apply_filters('the_title', $item->title, $item->ID) . $append;
        $item_output .= $description . $args->link_after;

        if($menu_has_children != '' || $args->walker->has_children) {
            $item_output .= '<i class="fa fa-angle-down"></i>';
        }

        $item_output .= '</a>';
        if (! empty($item->megamenu) && ! empty($item->submegamenu) && in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $elementor_instance = Elementor\Plugin::instance();
            $item_output .= '<div class="sub-menu sub-menu-elementor">';
            $item_output .= $elementor_instance->frontend->get_builder_content_for_display($item->submegamenu);
            $item_output .= '</div>';
        }
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

?>