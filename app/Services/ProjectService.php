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

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class ProjectService
{

	protected $repository;
	protected $validator;
	/**
	 * @var Filesystem
	 */
	private $filesystem;
	/**
	 * @var \CodeProject\Services\Storage
	 */
	private $storage;

	public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage)
	{
		$this->repository = $repository;
		$this->validator = $validator;
		$this->filesystem = $filesystem;
		$this->storage = $storage;
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
		//Se eu deixar assim ela vai resultar na forma que foi definida no Presenter,
		//porém não queremos
		//$project = $this->repository->find($data['project_id']);
		$project = $this->repository->skipPresenter()->find($data['project_id']);
		$projectFile = $project->files()->create($data);

		//Storage::put($data['name'].".".$data['extension'], File::get($data['file']));
		//Refatorando (deixando o acoplamento fraco)
		//$this->storage->put($data['name'].".".$data['extension'], $this->filesystem->get($data['file']));
		$this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));
	}
}