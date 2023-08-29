<?php

if (!function_exists("get_logged_in_user")) {
	function get_logged_in_user() {
		$db = \Config\Database::connect();
		$builder = $db->table("users");
        $builder->select("users.id as id, username, auth_groups_users.group");
        $builder->join("auth_groups_users", "auth_groups_users.user_id = users.id");
		return $builder->getWhere(["users.id" => user_id()])->getRow();
	}
}

if(! function_exists('get_option')) {
	function get_option($value) {
		return service('settings')->get('App.'.$value);
	}
}

?>