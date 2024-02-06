<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://golocalinteractive.com/meet-the-team/?member_search=1&department=Web
 * @since      1.0.0
 *
 * @package    Gli_Roles
 * @subpackage Gli_Roles/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Gli_Roles
 * @subpackage Gli_Roles/includes
 * @author     Go Local Interactive <development@golocalinteractive.com>
 */
class Gli_Roles_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		Gli_Roles_Deactivator::remap_roles();
		Gli_Roles_Deactivator::remove_roles();
	}

	static protected function remap_roles()
	{
		$role_mapping = array(
			'web_developer' => 'administrator',
			'paid_media' => 'administrator'
			// Add more role mappings as needed
		);

		$users = get_users(array(
			'role__in' => array('web_developer', 'paid_media'),
		));

		foreach ($users as $user) {
			$old_role = $user->roles[0]; // Assuming each user has only one role
			$new_role = isset($role_mapping[$old_role]) ? $role_mapping[$old_role] : ''; // Get corresponding new role

			// If the new role is defined and exists, update user role
			if ($new_role && get_role($new_role)) {
				$user->set_role($new_role);
			}
		}
	}

	static protected function remove_roles()
	{
		$roles_to_remove = array('web_developer', 'paid_media');

		foreach ($roles_to_remove as $role_slug) {
			remove_role($role_slug);
		}
	}
}
