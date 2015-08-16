<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\Client;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
	public function boot()
	{
		$this->pushCriteria( app(RequestCriteria::class) );
	}

	public function model()
	{
		//Retornando o full name da classe
		return Client::class;
	}
}