<?php

namespace App\Http\Controllers;

use App\DataTables\Cska2DataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCska2Request;
use App\Http\Requests\UpdateCska2Request;
use App\Repositories\Cska2Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Quotation;
use DB;
class Cska2Controller extends AppBaseController
{
    /** @var  Cska2Repository */
    private $cska2Repository;

    public function __construct(Cska2Repository $cska2Repo)
    {
        $this->cska2Repository = $cska2Repo;
    }

    /**
     * Display a listing of the Cska2.
     *
     * @param Cska2DataTable $cska2DataTable
     * @return Response
     */
    public function index()
    {
        return view('cska2s.index');
    }
    public function clientsList()
    {
        $cska2s = DB::table('cska2')->select('*');
        return datatables()->of(cska2s)
            ->make(true);
    }

    /**
     * Show the form for creating a new Cska2.
     *
     * @return Response
     */
    public function create()
    {
        return view('cska2s.create');
    }

    /**
     * Store a newly created Cska2 in storage.
     *
     * @param CreateCska2Request $request
     *
     * @return Response
     */
    public function store(CreateCska2Request $request)
    {
        $input = $request->all();

        $cska2 = $this->cska2Repository->create($input);

        Flash::success('Cska2 saved successfully.');

        return redirect(route('cska2s.index'));
    }

    /**
     * Display the specified Cska2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            Flash::error('Cska2 not found');

            return redirect(route('cska2s.index'));
        }

        return view('cska2s.show')->with('cska2', $cska2);
    }

    /**
     * Show the form for editing the specified Cska2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            Flash::error('Cska2 not found');

            return redirect(route('cska2s.index'));
        }

        return view('cska2s.edit')->with('cska2', $cska2);
    }

    /**
     * Update the specified Cska2 in storage.
     *
     * @param  int              $id
     * @param UpdateCska2Request $request
     *
     * @return Response
     */
    public function update($id, UpdateCska2Request $request)
    {
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            Flash::error('Cska2 not found');

            return redirect(route('cska2s.index'));
        }

        $cska2 = $this->cska2Repository->update($request->all(), $id);

        Flash::success('Cska2 updated successfully.');

        return redirect(route('cska2s.index'));
    }

    /**
     * Remove the specified Cska2 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            Flash::error('Cska2 not found');

            return redirect(route('cska2s.index'));
        }

        $this->cska2Repository->delete($id);

        Flash::success('Cska2 deleted successfully.');

        return redirect(route('cska2s.index'));
    }
}
