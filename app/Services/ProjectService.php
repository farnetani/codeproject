<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 09/08/15
 * Time: 18:18
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectService
{

	protected $repository;
	protected $validator;
	public function __construct(ProjectRepository $repository, ProjectValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function create(array $data)
	{
		try {
			$this->validator->with($data)->passesOrFail();
			return $this->repository->create($data);
		} catch(ValidatorException $e) {
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}
	}

	public function update(array $data, $id)  {
		try {
			$this->validator->with($data)->passesOrFail();
			return $this->repository->update($data, $id);
		} catch(ValidatorException $e) {
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}
	}

	public function createFile(array $data)
	{
		Storage::put($data['name'].".".$data['extension'], File::get($data['file']));
	}
}