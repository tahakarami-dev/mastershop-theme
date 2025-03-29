<?php

define('MASTER_THEMEDIR', get_theme_file_path() . '/');
define('MASTER_THEMEURL', get_theme_file_uri() . '/');

require_once ( MASTER_THEMEDIR . 'inc/codestar/codestar-framework.php');
require_once ( MASTER_THEMEDIR . 'inc/master-settings.php');
require_once ( MASTER_THEMEDIR . 'inc/post-types/header.php');
require_once ( MASTER_THEMEDIR . 'inc/post-types/footer.php');
require_once ( MASTER_THEMEDIR . 'inc/post-types/mega-menu.php');
require_once ( MASTER_THEMEDIR . 'inc/elementor/master-elemntor.php');
require_once ( MASTER_THEMEDIR . 'inc/master-actions.php');
require_once ( MASTER_THEMEDIR . 'inc/megamenu/mega-menu.php');
require_once ( MASTER_THEMEDIR . 'inc/megamenu/mega_menu_custom_walker.php');
require_once ( MASTER_THEMEDIR . 'inc/master-metaboxes.php');








require MASTER_THEMEDIR . 'inc/master-assets.php';



