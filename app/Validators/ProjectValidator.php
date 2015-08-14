<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 10/08/15
 * Time: 09:29
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
	protected $rules = [
		'name' => 'required|max:255',
		'description' => 'required|max:255',
		'status' => 'required'
	];
}