<?php

namespace App\Http\Controllers;

use App\DataTables\torpedoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetorpedoRequest;
use App\Http\Requests\UpdatetorpedoRequest;
use App\Repositories\torpedoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use App\Quotation;

class torpedoController extends AppBaseController
{
    /** @var  torpedoRepository */
    private $torpedoRepository;

    public function __construct(torpedoRepository $torpedoRepo)
    {
        $this->torpedoRepository = $torpedoRepo;
    }

    /**
     * Display a listing of the torpedo.
     *
     * @param torpedoDataTable $torpedoDataTable
     * @return Response
     */
    public function index()
    {
        return view('torpedos.index');
    }
    public function torpedosList()
    {
        $torpedos = DB::table('torpedo_fc')->select('*');
        return datatables()->of($torpedos)
            ->make(true);
    }

    /**
     * Show the form for creating a new torpedo.
     *
     * @return Response
     */
    public function create()
    {
        return view('torpedos.create');
    }

    /**
     * Store a newly created torpedo in storage.
     *
     * @param CreatetorpedoRequest $request
     *
     * @return Response
     */
    public function store(CreatetorpedoRequest $request)
    {
        $input = $request->all();

        $torpedo = $this->torpedoRepository->create($input);

        Flash::success('Torpedo saved successfully.');

        return redirect(route('torpedos.index'));
    }

    /**
     * Display the specified torpedo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            Flash::error('Torpedo not found');

            return redirect(route('torpedos.index'));
        }

        return view('torpedos.show')->with('torpedo', $torpedo);
    }

    /**
     * Show the form for editing the specified torpedo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            Flash::error('Torpedo not found');

            return redirect(route('torpedos.index'));
        }

        return view('torpedos.edit')->with('torpedo', $torpedo);
    }

    /**
     * Update the specified torpedo in storage.
     *
     * @param  int              $id
     * @param UpdatetorpedoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetorpedoRequest $request)
    {
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            Flash::error('Torpedo not found');

            return redirect(route('torpedos.index'));
        }

        $torpedo = $this->torpedoRepository->update($request->all(), $id);

        Flash::success('Torpedo updated successfully.');

        return redirect(route('torpedos.index'));
    }

    /**
     * Remove the specified torpedo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            Flash::error('Torpedo not found');

            return redirect(route('torpedos.index'));
        }

        $this->torpedoRepository->delete($id);

        Flash::success('Torpedo deleted successfully.');

        return redirect(route('torpedos.index'));
    }
}
