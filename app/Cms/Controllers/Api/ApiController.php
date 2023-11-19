<?php

declare(strict_types=1);

namespace App\Cms\Controllers\Api;

use App\Cms\Traits\ApiTrait;
use App\Cms\Traits\CmsMainTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Validator;

abstract class ApiController extends Controller
{
	use ApiTrait;
	use CmsMainTrait;

	final public function index(): JsonResponse
	{
		$this->authorize('index', $this->modelNamespace);
		$list = $this->modelRepository
			->orderBy('updated_at', 'desc')
			->get();

		return $this->setSuccessStatus()
			->setMessage($this->modelNameTranslate . __('list_successfully'))
			->setData($list->toArray())
			->prepareJsonResponse();
	}

	final public function show(string $url): JsonResponse
	{
		$showedModel = $this->modelRepository
			->where('url', $url)
			->first();

		return $this->prepareViewResponse($showedModel);
	}

	final public function getById(int $id): JsonResponse
	{
		$showedModel = $this->modelRepository
			->find($id);

		return $this->prepareViewResponse($showedModel);
	}

	final public function create(): void
	{
		abort(404);
	}

	final public function store()
	{
		$this->authorize('create', $this->modelNamespace);
		$mainData = $this->httpRequest->all();
		$modelRules = $this->modelRepository->getRules();
		$validator = Validator::make($mainData, $modelRules);
		if ($validator->fails()) {
			return $this->setMessage(__('validation_failed'))
				->setData($validator->messages())
				->prepareJsonResponse();
		}
		$storedModel = $this->modelRepository->saveWithRelations($mainData);

		return $this->setSuccessStatus()
			->setMessage($this->modelNameTranslate . __('created_successfully'))
			->setData($storedModel->appendData())
			->prepareJsonResponse();
	}

	final public function edit(): void
	{
		abort(404);
	}

	final public function update(string $url)
	{
		$updatedModel = $this->modelRepository
			->where('url', $url)
			->first();

		if (!$updatedModel) {
			return $this->prepareJsonResponse();
		}
		$this->authorize('update', $updatedModel);

		$mainData = $this->httpRequest->all();
		$modelRules = $updatedModel->getRules();
		$validator = Validator::make($mainData, $modelRules);
		if ($validator->fails()) {
			$errorString = implode(',', $validator->messages()->all());

			return $this->setMessage($errorString)
				->prepareJsonResponse();
		}

		$updatedModel->saveWithRelations($mainData);

		return $this->setSuccessStatus()
			->setMessage(__('updated_successfully'))
			->setData($updatedModel->appendData())
			->prepareJsonResponse();
	}

	final public function updateById(int $id): JsonResponse
	{
		$updatedModel = $this->modelRepository
			->where('id', $id)
			->first();

		if (!$updatedModel) {
			return $this->prepareJsonResponse();
		}
		$this->authorize('update', $updatedModel);

		$mainData = $this->httpRequest->all();
		$modelRules = $updatedModel->getRules();
		$validator = Validator::make($mainData, $modelRules);
		if ($validator->fails()) {
			$errorString = implode(',', $validator->messages()->all());

			return $this->setMessage($errorString)
				->prepareJsonResponse();
		}

		$updatedModel->saveWithRelations($mainData);

		return $this->setSuccessStatus()
			->setMessage(__('updated_successfully'))
			->setData($updatedModel->appendData())
			->prepareJsonResponse();
	}

	final public function destroy(string $url): JsonResponse
	{
		$deletedModel = $this->modelRepository->where('url', $url)->first();
		if (!$deletedModel) {
			return $this->prepareJsonResponse();
		}
		$this->authorize('delete', $deletedModel);

		$deletedModel->delete();

		return $this->setSuccessStatus()
			->setMessage(__('deleted_successfully'))
			->setData($deletedModel)
			->prepareJsonResponse();
	}

	final public function destroyById(int $id): JsonResponse
	{
		$deletedModel = $this->modelRepository->where('id', $id)->first();
		if (!$deletedModel) {
			return $this->prepareJsonResponse();
		}
		$this->authorize('delete', $deletedModel);

		$deletedModel->delete();

		return $this->setSuccessStatus()
			->setMessage(__('deleted_successfully'))
			->setData($deletedModel)
			->prepareJsonResponse();
	}

	private function prepareViewResponse($showedModel)
	{
		if (!$showedModel) {
			return $this->prepareJsonResponse();
		}
		$this->authorize('view', $showedModel);

		return $this->setSuccessStatus()
			->setMessage(__('show_successfully'))
			->setData($showedModel->appendData())
			->prepareJsonResponse();
	}
}
