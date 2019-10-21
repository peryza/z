<?php

namespace App\Http\Controllers;

use App\DataTables\Dinamo2DataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDinamo2Request;
use App\Http\Requests\UpdateDinamo2Request;
use App\Repositories\Dinamo2Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Dinamo2Controller extends AppBaseController
{
    /** @var  Dinamo2Repository */
    private $dinamo2Repository;

    public function __construct(Dinamo2Repository $dinamo2Repo)
    {
        $this->dinamo2Repository = $dinamo2Repo;
    }

    /**
     * Display a listing of the Dinamo2.
     *
     * @param Dinamo2DataTable $dinamo2DataTable
     * @return Response
     */
    public function index(Dinamo2DataTable $dinamo2DataTable)
    {
        return $dinamo2DataTable->render('dinamo2s.index');
    }

    /**
     * Show the form for creating a new Dinamo2.
     *
     * @return Response
     */
    public function create()
    {
        return view('dinamo2s.create');
    }

    /**
     * Store a newly created Dinamo2 in storage.
     *
     * @param CreateDinamo2Request $request
     *
     * @return Response
     */
    public function store(CreateDinamo2Request $request)
    {
        $input = $request->all();

        $dinamo2 = $this->dinamo2Repository->create($input);

        Flash::success('Dinamo2 saved successfully.');

        return redirect(route('dinamo2s.index'));
    }

    /**
     * Display the specified Dinamo2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            Flash::error('Dinamo2 not found');

            return redirect(route('dinamo2s.index'));
        }

        return view('dinamo2s.show')->with('dinamo2', $dinamo2);
    }

    /**
     * Show the form for editing the specified Dinamo2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            Flash::error('Dinamo2 not found');

            return redirect(route('dinamo2s.index'));
        }

        return view('dinamo2s.edit')->with('dinamo2', $dinamo2);
    }

    /**
     * Update the specified Dinamo2 in storage.
     *
     * @param  int              $id
     * @param UpdateDinamo2Request $request
     *
     * @return Response
     */
    public function update($id, UpdateDinamo2Request $request)
    {
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            Flash::error('Dinamo2 not found');

            return redirect(route('dinamo2s.index'));
        }

        $dinamo2 = $this->dinamo2Repository->update($request->all(), $id);

        Flash::success('Dinamo2 updated successfully.');

        return redirect(route('dinamo2s.index'));
    }

    /**
     * Remove the specified Dinamo2 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            Flash::error('Dinamo2 not found');

            return redirect(route('dinamo2s.index'));
        }

        $this->dinamo2Repository->delete($id);

        Flash::success('Dinamo2 deleted successfully.');

        return redirect(route('dinamo2s.index'));
    }
}
