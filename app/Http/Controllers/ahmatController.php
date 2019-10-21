<?php

namespace App\Http\Controllers;

use App\DataTables\ahmatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateahmatRequest;
use App\Http\Requests\UpdateahmatRequest;
use App\Repositories\ahmatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use App\Quotation;

class ahmatController extends AppBaseController
{
    /** @var  ahmatRepository */
    private $ahmatRepository;

    public function __construct(ahmatRepository $ahmatRepo)
    {
        $this->ahmatRepository = $ahmatRepo;
    }

    /**
     * Display a listing of the ahmat.
     *
     * @param ahmatDataTable $ahmatDataTable
     * @return Response
     */
    public function index(ahmatDataTable $ahmatDataTable)
    {
        return $ahmatDataTable->render('ahmats.index');
    }

    /**
     * Show the form for creating a new ahmat.
     *
     * @return Response
     */
    public function create()
    {
        return view('ahmats.create');
    }

    /**
     * Store a newly created ahmat in storage.
     *
     * @param CreateahmatRequest $request
     *
     * @return Response
     */
    public function store(CreateahmatRequest $request)
    {
        $input = $request->all();

        $ahmat = $this->ahmatRepository->create($input);

        Flash::success('Ahmat saved successfully.');

        return redirect(route('ahmats.index'));
    }

    /**
     * Display the specified ahmat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            Flash::error('Ahmat not found');

            return redirect(route('ahmats.index'));
        }

        return view('ahmats.show')->with('ahmat', $ahmat);
    }

    /**
     * Show the form for editing the specified ahmat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            Flash::error('Ahmat not found');

            return redirect(route('ahmats.index'));
        }

        return view('ahmats.edit')->with('ahmat', $ahmat);
    }

    /**
     * Update the specified ahmat in storage.
     *
     * @param  int              $id
     * @param UpdateahmatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateahmatRequest $request)
    {
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            Flash::error('Ahmat not found');

            return redirect(route('ahmats.index'));
        }

        $ahmat = $this->ahmatRepository->update($request->all(), $id);

        Flash::success('Ahmat updated successfully.');

        return redirect(route('ahmats.index'));
    }

    /**
     * Remove the specified ahmat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            Flash::error('Ahmat not found');

            return redirect(route('ahmats.index'));
        }

        $this->ahmatRepository->delete($id);

        Flash::success('Ahmat deleted successfully.');

        return redirect(route('ahmats.index'));
    }
}
