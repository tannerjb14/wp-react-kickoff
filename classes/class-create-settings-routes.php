<?php

/**
 * This file will create Custom Rest API End Points.
 */
class WP_React_Settings_Rest_Route
{

    public function __construct()
    {
        add_action('rest_api_init', [$this, 'create_rest_routes']);
    }

    public function create_rest_routes()
    {
        register_rest_route('gliroles/v1', '/get_roles', [
            'methods' => 'GET',
            'callback' => [$this, 'get_roles_callback']
        ]);
    }

    function get_roles_callback() {
        $roles = wp_roles()->get_names();
        $role_data = array();
    
        foreach ($roles as $role => $name) {
            $role_object = get_role($role);
    
            // Get capabilities for the role
            $capabilities = $role_object->capabilities;
    
            // Add role data to the response
            $role_data[] = array(
                'name'          => $role,
                'display_name'  => $name,
                'capabilities'  => $capabilities,
            );
        }
    
        return rest_ensure_response($role_data);
    }
}
new WP_React_Settings_Rest_Route();
