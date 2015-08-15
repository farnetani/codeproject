<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 15/08/15
 * Time: 10:03
 */

namespace CodeProject\Oauth;

use Illuminate\Support\Facades\Auth;

class Verifier
{
	public function verify($username, $password)
	{
		$credentials = [
			'email'    => $username,
			'password' => $password,
		];

		if (Auth::once($credentials)) {
			return Auth::user()->id;
		}

		return false;
	}
}