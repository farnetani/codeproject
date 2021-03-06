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
		'owner_id' => 'required|integer',
		'client_id' => 'required|integer',
		'name' => 'required|max:255',
		'progress'=> 'required',
		'status' => 'required',
		'due_date' => 'required|date'
	];
}