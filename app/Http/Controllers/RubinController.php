<?php

namespace App\Http\Controllers;

use App\DataTables\RubinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRubinRequest;
use App\Http\Requests\UpdateRubinRequest;
use App\Repositories\RubinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RubinController extends AppBaseController
{
    /** @var  RubinRepository */
    private $rubinRepository;

    public function __construct(RubinRepository $rubinRepo)
    {
        $this->rubinRepository = $rubinRepo;
    }

    /**
     * Display a listing of the Rubin.
     *
     * @param RubinDataTable $rubinDataTable
     * @return Response
     */
    public function index(RubinDataTable $rubinDataTable)
    {
        return $rubinDataTable->render('rubins.index');
    }

    /**
     * Show the form for creating a new Rubin.
     *
     * @return Response
     */
    public function create()
    {
        return view('rubins.create');
    }

    /**
     * Store a newly created Rubin in storage.
     *
     * @param CreateRubinRequest $request
     *
     * @return Response
     */
    public function store(CreateRubinRequest $request)
    {
        $input = $request->all();

        $rubin = $this->rubinRepository->create($input);

        Flash::success('Rubin saved successfully.');

        return redirect(route('rubins.index'));
    }

    /**
     * Display the specified Rubin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            Flash::error('Rubin not found');

            return redirect(route('rubins.index'));
        }

        return view('rubins.show')->with('rubin', $rubin);
    }

    /**
     * Show the form for editing the specified Rubin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            Flash::error('Rubin not found');

            return redirect(route('rubins.index'));
        }

        return view('rubins.edit')->with('rubin', $rubin);
    }

    /**
     * Update the specified Rubin in storage.
     *
     * @param  int              $id
     * @param UpdateRubinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRubinRequest $request)
    {
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            Flash::error('Rubin not found');

            return redirect(route('rubins.index'));
        }

        $rubin = $this->rubinRepository->update($request->all(), $id);

        Flash::success('Rubin updated successfully.');

        return redirect(route('rubins.index'));
    }

    /**
     * Remove the specified Rubin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            Flash::error('Rubin not found');

            return redirect(route('rubins.index'));
        }

        $this->rubinRepository->delete($id);

        Flash::success('Rubin deleted successfully.');

        return redirect(route('rubins.index'));
    }
}
