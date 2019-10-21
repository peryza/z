<?php

namespace App\Http\Controllers;

use App\DataTables\TombovDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTombovRequest;
use App\Http\Requests\UpdateTombovRequest;
use App\Repositories\TombovRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use DB;
use App\Quotation;

class TombovController extends AppBaseController
{
    /** @var  TombovRepository */
    private $tombovRepository;

    public function __construct(TombovRepository $tombovRepo)
    {
        $this->tombovRepository = $tombovRepo;
    }

    /**
     * Display a listing of the Tombov.
     *
     * @param TombovDataTable $tombovDataTable
     * @return Response
     */

    public function tombovsList()
    {
        $tombovs = DB::table('tombov')->select('*');
        return datatables()->of($tombovs)
            ->make(true);
    }
    public function index()
    {
        return view('tombovs.index');
    }
    /**
     * Show the form for creating a new Tombov.
     *
     * @return Response
     */
    public function create()
    {
        return view('tombovs.create');
    }

    /**
     * Store a newly created Tombov in storage.
     *
     * @param CreateTombovRequest $request
     *
     * @return Response
     */
    public function store(CreateTombovRequest $request)
    {
        $input = $request->all();

        $tombov = $this->tombovRepository->create($input);

        Flash::success('Tombov saved successfully.');

        return redirect(route('tombovs.index'));
    }

    /**
     * Display the specified Tombov.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            Flash::error('Tombov not found');

            return redirect(route('tombovs.index'));
        }

        return view('tombovs.show')->with('tombov', $tombov);
    }

    /**
     * Show the form for editing the specified Tombov.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            Flash::error('Tombov not found');

            return redirect(route('tombovs.index'));
        }

        return view('tombovs.edit')->with('tombov', $tombov);
    }

    /**
     * Update the specified Tombov in storage.
     *
     * @param  int              $id
     * @param UpdateTombovRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTombovRequest $request)
    {
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            Flash::error('Tombov not found');

            return redirect(route('tombovs.index'));
        }

        $tombov = $this->tombovRepository->update($request->all(), $id);

        Flash::success('Tombov updated successfully.');

        return redirect(route('tombovs.index'));
    }

    /**
     * Remove the specified Tombov from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            Flash::error('Tombov not found');

            return redirect(route('tombovs.index'));
        }

        $this->tombovRepository->delete($id);

        Flash::success('Tombov deleted successfully.');

        return redirect(route('tombovs.index'));
    }
}
