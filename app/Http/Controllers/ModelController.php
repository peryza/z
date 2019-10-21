<?php

namespace App\Http\Controllers;

use App\DataTables\ModelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModelRequest;
use App\Http\Requests\UpdateModelRequest;
use App\Repositories\ModelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ModelController extends AppBaseController
{
    /** @var  ModelRepository */
    private $modelRepository;

    public function __construct(ModelRepository $modelRepo)
    {
        $this->modelRepository = $modelRepo;
    }

    /**
     * Display a listing of the Model.
     *
     * @param ModelDataTable $modelDataTable
     * @return Response
     */
    public function index(ModelDataTable $modelDataTable)
    {
        return $modelDataTable->render('models.index');
    }

    /**
     * Show the form for creating a new Model.
     *
     * @return Response
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created Model in storage.
     *
     * @param CreateModelRequest $request
     *
     * @return Response
     */
    public function store(CreateModelRequest $request)
    {
        $input = $request->all();

        $model = $this->modelRepository->create($input);

        Flash::success('Model saved successfully.');

        return redirect(route('models.index'));
    }

    /**
     * Display the specified Model.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            Flash::error('Model not found');

            return redirect(route('models.index'));
        }

        return view('models.show')->with('model', $model);
    }

    /**
     * Show the form for editing the specified Model.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            Flash::error('Model not found');

            return redirect(route('models.index'));
        }

        return view('models.edit')->with('model', $model);
    }

    /**
     * Update the specified Model in storage.
     *
     * @param  int              $id
     * @param UpdateModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModelRequest $request)
    {
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            Flash::error('Model not found');

            return redirect(route('models.index'));
        }

        $model = $this->modelRepository->update($request->all(), $id);

        Flash::success('Model updated successfully.');

        return redirect(route('models.index'));
    }

    /**
     * Remove the specified Model from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $model = $this->modelRepository->find($id);

        if (empty($model)) {
            Flash::error('Model not found');

            return redirect(route('models.index'));
        }

        $this->modelRepository->delete($id);

        Flash::success('Model deleted successfully.');

        return redirect(route('models.index'));
    }
}
