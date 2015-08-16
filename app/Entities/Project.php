<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'owner_id',
		'client_id',
		'name',
		'description',
		'progress',
		'status',
		'due_date'
	];

	public function notes()
	{
		return $this->hasMany(projectNote::class);
	}

	public function members()
	{
		return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
	}

}
