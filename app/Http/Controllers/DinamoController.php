<?php

namespace App\Http\Controllers;

use App\DataTables\DinamoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDinamoRequest;
use App\Http\Requests\UpdateDinamoRequest;
use App\Repositories\DinamoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DinamoController extends AppBaseController
{
    /** @var  DinamoRepository */
    private $dinamoRepository;

    public function __construct(DinamoRepository $dinamoRepo)
    {
        $this->dinamoRepository = $dinamoRepo;
    }

    /**
     * Display a listing of the Dinamo.
     *
     * @param DinamoDataTable $dinamoDataTable
     * @return Response
     */
    public function index(DinamoDataTable $dinamoDataTable)
    {
        return $dinamoDataTable->render('dinamos.index');
    }

    /**
     * Show the form for creating a new Dinamo.
     *
     * @return Response
     */
    public function create()
    {
        return view('dinamos.create');
    }

    /**
     * Store a newly created Dinamo in storage.
     *
     * @param CreateDinamoRequest $request
     *
     * @return Response
     */
    public function store(CreateDinamoRequest $request)
    {
        $input = $request->all();

        $dinamo = $this->dinamoRepository->create($input);

        Flash::success('Dinamo saved successfully.');

        return redirect(route('dinamos.index'));
    }

    /**
     * Display the specified Dinamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            Flash::error('Dinamo not found');

            return redirect(route('dinamos.index'));
        }

        return view('dinamos.show')->with('dinamo', $dinamo);
    }

    /**
     * Show the form for editing the specified Dinamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            Flash::error('Dinamo not found');

            return redirect(route('dinamos.index'));
        }

        return view('dinamos.edit')->with('dinamo', $dinamo);
    }

    /**
     * Update the specified Dinamo in storage.
     *
     * @param  int              $id
     * @param UpdateDinamoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDinamoRequest $request)
    {
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            Flash::error('Dinamo not found');

            return redirect(route('dinamos.index'));
        }

        $dinamo = $this->dinamoRepository->update($request->all(), $id);

        Flash::success('Dinamo updated successfully.');

        return redirect(route('dinamos.index'));
    }

    /**
     * Remove the specified Dinamo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            Flash::error('Dinamo not found');

            return redirect(route('dinamos.index'));
        }

        $this->dinamoRepository->delete($id);

        Flash::success('Dinamo deleted successfully.');

        return redirect(route('dinamos.index'));
    }
}
