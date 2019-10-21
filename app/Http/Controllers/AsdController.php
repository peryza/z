<?php

namespace App\Http\Controllers;

use App\DataTables\AsdDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAsdRequest;
use App\Http\Requests\UpdateAsdRequest;
use App\Repositories\AsdRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AsdController extends AppBaseController
{
    /** @var  AsdRepository */
    private $asdRepository;

    public function __construct(AsdRepository $asdRepo)
    {
        $this->asdRepository = $asdRepo;
    }

    /**
     * Display a listing of the Asd.
     *
     * @param AsdDataTable $asdDataTable
     * @return Response
     */
    public function index(AsdDataTable $asdDataTable)
    {
        return $asdDataTable->render('asds.index');
    }

    /**
     * Show the form for creating a new Asd.
     *
     * @return Response
     */
    public function create()
    {
        return view('asds.create');
    }

    /**
     * Store a newly created Asd in storage.
     *
     * @param CreateAsdRequest $request
     *
     * @return Response
     */
    public function store(CreateAsdRequest $request)
    {
        $input = $request->all();

        $asd = $this->asdRepository->create($input);

        Flash::success('Asd saved successfully.');

        return redirect(route('asds.index'));
    }

    /**
     * Display the specified Asd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            Flash::error('Asd not found');

            return redirect(route('asds.index'));
        }

        return view('asds.show')->with('asd', $asd);
    }

    /**
     * Show the form for editing the specified Asd.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            Flash::error('Asd not found');

            return redirect(route('asds.index'));
        }

        return view('asds.edit')->with('asd', $asd);
    }

    /**
     * Update the specified Asd in storage.
     *
     * @param  int              $id
     * @param UpdateAsdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsdRequest $request)
    {
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            Flash::error('Asd not found');

            return redirect(route('asds.index'));
        }

        $asd = $this->asdRepository->update($request->all(), $id);

        Flash::success('Asd updated successfully.');

        return redirect(route('asds.index'));
    }

    /**
     * Remove the specified Asd from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            Flash::error('Asd not found');

            return redirect(route('asds.index'));
        }

        $this->asdRepository->delete($id);

        Flash::success('Asd deleted successfully.');

        return redirect(route('asds.index'));
    }
}
