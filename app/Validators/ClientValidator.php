<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 10/08/15
 * Time: 09:29
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
	protected $rules = [
		'name' => 'required|max:255',
		'responsible' => 'required|max:255',
		'email' => 'required|email',
		'phone' => 'required',
		'address' => 'required'
	];
}