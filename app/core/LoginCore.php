<?php

class LoginCore
{
	public static function login($username, $password)
	{
		$user = Controller::model('user');
		$users = $user->where('username', '=', $username)->get();

		if (isset($users[0]) && password_verify($password, $users[0]->pwdChecksum)) {

			$_SESSION['username'] = $username;
		}
	}

	public static function isLoggedIn()
	{
		return isset($_SESSION['username']);
	}

	public static function logout()
	{
		unset($_SESSION['username']);
	}
}
