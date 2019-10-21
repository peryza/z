<?php

namespace App\Http\Controllers;

use App\DataTables\orenburgDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateorenburgRequest;
use App\Http\Requests\UpdateorenburgRequest;
use App\Repositories\orenburgRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class orenburgController extends AppBaseController
{
    /** @var  orenburgRepository */
    private $orenburgRepository;

    public function __construct(orenburgRepository $orenburgRepo)
    {
        $this->orenburgRepository = $orenburgRepo;
    }

    /**
     * Display a listing of the orenburg.
     *
     * @param orenburgDataTable $orenburgDataTable
     * @return Response
     */
    public function index(orenburgDataTable $orenburgDataTable)
    {
        return $orenburgDataTable->render('orenburgs.index');
    }

    /**
     * Show the form for creating a new orenburg.
     *
     * @return Response
     */
    public function create()
    {
        return view('orenburgs.create');
    }

    /**
     * Store a newly created orenburg in storage.
     *
     * @param CreateorenburgRequest $request
     *
     * @return Response
     */
    public function store(CreateorenburgRequest $request)
    {
        $input = $request->all();

        $orenburg = $this->orenburgRepository->create($input);

        Flash::success('Orenburg saved successfully.');

        return redirect(route('orenburgs.index'));
    }

    /**
     * Display the specified orenburg.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            Flash::error('Orenburg not found');

            return redirect(route('orenburgs.index'));
        }

        return view('orenburgs.show')->with('orenburg', $orenburg);
    }

    /**
     * Show the form for editing the specified orenburg.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            Flash::error('Orenburg not found');

            return redirect(route('orenburgs.index'));
        }

        return view('orenburgs.edit')->with('orenburg', $orenburg);
    }

    /**
     * Update the specified orenburg in storage.
     *
     * @param  int              $id
     * @param UpdateorenburgRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateorenburgRequest $request)
    {
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            Flash::error('Orenburg not found');

            return redirect(route('orenburgs.index'));
        }

        $orenburg = $this->orenburgRepository->update($request->all(), $id);

        Flash::success('Orenburg updated successfully.');

        return redirect(route('orenburgs.index'));
    }

    /**
     * Remove the specified orenburg from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            Flash::error('Orenburg not found');

            return redirect(route('orenburgs.index'));
        }

        $this->orenburgRepository->delete($id);

        Flash::success('Orenburg deleted successfully.');

        return redirect(route('orenburgs.index'));
    }
}
