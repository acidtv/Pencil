<?

class Model_User extends Model_Auth_User {

	protected $_has_many = array(
		//'notes' => array('model' => 'Note'),

		// inherited from model auth
		'user_tokens' => array('model' => 'User_Token'),
		'roles'       => array('model' => 'Role', 'through' => 'roles_users'),
	);
}
