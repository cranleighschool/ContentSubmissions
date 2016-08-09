<?php
return [
	'connection' 			=> env('ADLDAP_CONNECTION', 'default'),
	'username_attribute' 	=> ['email' => 'samaccountname'],
	'limitation_filter' 	=> env('ADLDAP_LIMITATION_FILTER', '(CN=*)'),
	'login_fallback' 		=> env('ADLDAP_LOGIN_FALLBACK', false), // if this is set to true the limitation filter set above will not work if a user already exists in our users table
	'password_key' 			=> env('ADLDAP_PASSWORD_KEY', 'password'),
	'password_sync' 		=> env('ADLDAP_PASSWORD_SYNC', false),
	'login_attribute' 		=> env('ADLDAP_LOGIN_ATTRIBUTE', 'samaccountname'),
	'bind_user_to_model' 	=> env('ADLDAP_BIND_USER_TO_MODEL', false),
	'sync_attributes' 		=> [
		'name' => 'displayname',
	],
	'select_attributes' 	=> [
	],
];
