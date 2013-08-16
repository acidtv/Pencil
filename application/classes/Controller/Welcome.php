<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public function action_index()
	{
		$view = new View('welcome');
		$view->errors = array();

		if ($this->request->post('login'))
		{
			$this->login();
		}

		if ($this->request->post('signup'))
		{
			$this->signup($view);
		}

		$this->template->content = $view;
	}

	private function login()
	{
		$user = $this->request->post('user');
		$pass = $this->request->post('pass');
		$remember = (bool)$this->request->post('remember');

		if ( ! Auth::instance()->login($user, $pass, $remember))
		{
			Notification::instance()->add('Login failed');
			return;
		}

		$this->redirect('/notes');
	}

	private function signup($view)
	{
		try
		{
			// create new user
			$user = ORM::factory('User')->create_user($_POST, array(
				'username',
				'password',
				'email',
			));
		}
		catch (ORM_Validation_Exception $e)
		{
			// display errors
			$errors = $e->errors('validation');

			// what the hell?
			$errors = array_merge($errors, (isset($errors['_external']) ? $errors['_external'] : array()));
			unset($errors['_external']);

			$view->errors = $errors;
			return;
		}

		// add login role
		$role = ORM::factory('Role')->where('name', '=', 'login')->find();
		$user->add('roles', $role);

		// login
		Auth::instance()->login(
			$this->request->post('username'),
			$this->request->post('password')
		);

		$this->redirect('/notes');
	}

}
