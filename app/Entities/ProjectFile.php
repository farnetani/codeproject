<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
	protected $fillable = [
		'name',
		'description',
		'extension',
		'description'
	];

	public function project()
	{
		return $this->belongsTo(Project::class);
	}
}