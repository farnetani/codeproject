<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\Project;
use Prettus\Repository\Eloquent\BaseRepository;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{

	public function model()
	{
		//Retornando o full name da classe
		return Project::class;
	}

	public function boot()
	{
		//$this->pushCriterial(app(RequestCriteria::class));
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
}