<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'name',
		'description',
		'progress',
		'status',
		'due_date',
		'owner_id',
		'client_id'
	];
}
