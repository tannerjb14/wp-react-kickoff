<?php
/**
 * This file will create admin menu page.
 */

class GliRoles_Create_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'create_admin_menu' ] );
    }

    public function create_admin_menu() {
        $capability = 'manage_options';
        $slug = 'gli-roles-settings';

        add_menu_page(
            __( 'Gli Roles', 'gli-roles' ),
            __( 'Gli Roles', 'gli-roles' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ]
        );
    }

    public function menu_page_template() {
        echo '<div class="wrap"><div id="gli-roles-admin-app"></div></div>';
    }

}
new GliRoles_Create_Admin_Page();