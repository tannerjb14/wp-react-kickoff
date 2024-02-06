<?php

/**
 * Fired during plugin activation
 *
 * @link       https://golocalinteractive.com/meet-the-team/?member_search=1&department=Web
 * @since      1.0.0
 *
 * @package    Gli_Roles
 * @subpackage Gli_Roles/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Gli_Roles
 * @subpackage Gli_Roles/includes
 * @author     Go Local Interactive <development@golocalinteractive.com>
 */
class Gli_Roles_Activator
{

    /**
     * Create custom table.
     *
     * Create custom table for holding Roles.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        Gli_Roles_Activator::add_custom_roles();
    }

    static protected function add_custom_roles()
    {
        // developer role has all wordpress admin permissions
        add_role(
            'web_developer',
            __('Web Developer'),
            array(
                'switch_themes' => true,
                'edit_themes' => true,
                'activate_plugins' => true,
                'edit_plugins' => true,
                'edit_users' => true,
                'edit_files' => true,
                'manage_options' => true,
                'moderate_comments' => true,
                'manage_categories' => true,
                'manage_links' => true,
                'upload_files' => true,
                'import' => true,
                'unfiltered_html' => true,
                'edit_posts' => true,
                'edit_others_posts' => true,
                'edit_published_posts' => true,
                'publish_posts' => true,
                'edit_pages' => true,
                'read' => true,
                'level_10' => true,
                'level_9' => true,
                'level_8' => true,
                'level_7' => true,
                'level_6' => true,
                'level_5' => true,
                'level_4' => true,
                'level_3' => true,
                'level_2' => true,
                'level_1' => true,
                'level_0' => true,
                'edit_others_pages' => true,
                'edit_published_pages' => true,
                'publish_pages' => true,
                'delete_pages' => true,
                'delete_others_pages' => true,
                'delete_published_pages' => true,
                'delete_posts' => true,
                'delete_others_posts' => true,
                'delete_published_posts' => true,
                'delete_private_posts' => true,
                'edit_private_posts' => true,
                'read_private_posts' => true,
                'delete_private_pages' => true,
                'edit_private_pages' => true,
                'read_private_pages' => true,
                'delete_users' => true,
                'create_users' => true,
                'unfiltered_upload' => true,
                'edit_dashboard' => true,
                'update_plugins' => true,
                'delete_plugins' => true,
                'install_plugins' => true,
                'update_themes' => true,
                'install_themes' => true,
                'update_core' => true,
                'list_users' => true,
                'remove_users' => true,
                'promote_users' => true,
                'edit_theme_options' => true,
                'delete_themes' => true,
                'export' => true,
                'read_facility' => true,
                'read_private_facilities' => true,
                'edit_facility' => true,
                'edit_facilities' => true,
                'edit_others_facilities' => true,
                'edit_published_facilities' => true,
                'publish_facilities' => true,
                'delete_facility' => true,
                'delete_facilities' => true,
                'delete_others_facilities' => true,
                'delete_private_facilities' => true,
                'delete_published_facilities' => true,
                'wf2fa_activate_2fa_self' => true,
                'wf2fa_activate_2fa_others' => true,
                'wf2fa_manage_settings' => true,
                'view_all_aryo_activity_log' => true,
                'wpseo_manage_options' => true
            )
        );

        // paid media needs no WP access
        add_role(
            'paid_media',
            __('Paid Media'),
            array(
                'read' => true
            )
        );
    }
}
