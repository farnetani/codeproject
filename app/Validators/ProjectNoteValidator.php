<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 10/08/15
 * Time: 09:29
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
	protected $rules = [
		'project_id' => 'required|integer',
		'title' => 'required',
		'note'=> 'required'
	];
}