<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\Project;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Presenters\ProjectPresenter;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{

	public function model()
	{
		//Retornando o full name da classe
		return Project::class;
	}

	public function boot()
	{
		$this->pushCriteria( app(RequestCriteria::class) );
	}

	public function isOwner($projectId, $userId)
	{
		//Pelo fato de ser uma consulta, ela sempre iria resultar verdadeiro, por
		//isso coloca-se o count
		if (count($this->findWhere(['id'=>$projectId, 'owner_id' => $userId]))) {
			return true;
		}
		return false;
	}

	public function hasMember($projectId, $memberId) {
		$project = $this->find($projectId);

		foreach($project->members as $member) {
			if($member->id == $memberId) {
				return true;
			}
		}
		return false;
	}

	public function presenter()
	{
		return ProjectPresenter::class;
	}
}