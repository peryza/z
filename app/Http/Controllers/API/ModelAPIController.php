<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateModelAPIRequest;
use App\Http\Requests\API\UpdateModelAPIRequest;
use App\Models\Model;
use App\Repositories\ModelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ModelController
 * @package App\Http\Controllers\API
 */

class ModelAPIController extends AppBaseController
{
    /** @var  ModelRepository */
    private $modelRepository;

    public function __construct(ModelRepository $modelRepo)
    {
        $this->modelRepository = $modelRepo;
    }

    /**
     * Display a listing of the Model.
     * GET|HEAD /models
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $models = $this->modelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($models->toArray(), 'Models retrieved successfully');
    }

    /**
     * Store a newly created Model in storage.
     * POST /models
     *
     * @param CreateModelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateModelAPIRequest $request)
    {
        $input = $request->all();

        $model = $this->modelRepository->create($input);

        return $this->sendResponse($model->toArray(), 'Model saved successfully');
    }

    /**
     * Display the specified Model.
     * GET|HEAD /models/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Model $model */
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            return $this->sendError('Model not found');
        }

        return $this->sendResponse($model->toArray(), 'Model retrieved successfully');
    }

    /**
     * Update the specified Model in storage.
     * PUT/PATCH /models/{id}
     *
     * @param int $id
     * @param UpdateModelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModelAPIRequest $request)
    {
        $input = $request->all();

        /** @var Model $model */
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            return $this->sendError('Model not found');
        }

        $model = $this->modelRepository->update($input, $id);

        return $this->sendResponse($model->toArray(), 'Model updated successfully');
    }

    /**
     * Remove the specified Model from storage.
     * DELETE /models/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Model $model */
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            return $this->sendError('Model not found');
        }

        $model->delete();

        return $this->sendResponse($id, 'Model deleted successfully');
    }
}
