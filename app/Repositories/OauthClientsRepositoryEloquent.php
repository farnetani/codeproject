<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Entities\OauthClients;

/**
 * Class OauthClientsRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class OauthClientsRepositoryEloquent extends BaseRepository implements OauthClientsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OauthClients::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}