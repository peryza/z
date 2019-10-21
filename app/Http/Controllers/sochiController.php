<?php

namespace App\Http\Controllers;

use App\DataTables\sochiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesochiRequest;
use App\Http\Requests\UpdatesochiRequest;
use App\Repositories\sochiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class sochiController extends AppBaseController
{
    /** @var  sochiRepository */
    private $sochiRepository;

    public function __construct(sochiRepository $sochiRepo)
    {
        $this->sochiRepository = $sochiRepo;
    }

    /**
     * Display a listing of the sochi.
     *
     * @param sochiDataTable $sochiDataTable
     * @return Response
     */
    public function index(sochiDataTable $sochiDataTable)
    {
        return $sochiDataTable->render('sochis.index');
    }

    /**
     * Show the form for creating a new sochi.
     *
     * @return Response
     */
    public function create()
    {
        return view('sochis.create');
    }

    /**
     * Store a newly created sochi in storage.
     *
     * @param CreatesochiRequest $request
     *
     * @return Response
     */
    public function store(CreatesochiRequest $request)
    {
        $input = $request->all();

        $sochi = $this->sochiRepository->create($input);

        Flash::success('Sochi saved successfully.');

        return redirect(route('sochis.index'));
    }

    /**
     * Display the specified sochi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            Flash::error('Sochi not found');

            return redirect(route('sochis.index'));
        }

        return view('sochis.show')->with('sochi', $sochi);
    }

    /**
     * Show the form for editing the specified sochi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            Flash::error('Sochi not found');

            return redirect(route('sochis.index'));
        }

        return view('sochis.edit')->with('sochi', $sochi);
    }

    /**
     * Update the specified sochi in storage.
     *
     * @param  int              $id
     * @param UpdatesochiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesochiRequest $request)
    {
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            Flash::error('Sochi not found');

            return redirect(route('sochis.index'));
        }

        $sochi = $this->sochiRepository->update($request->all(), $id);

        Flash::success('Sochi updated successfully.');

        return redirect(route('sochis.index'));
    }

    /**
     * Remove the specified sochi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            Flash::error('Sochi not found');

            return redirect(route('sochis.index'));
        }

        $this->sochiRepository->delete($id);

        Flash::success('Sochi deleted successfully.');

        return redirect(route('sochis.index'));
    }
}
