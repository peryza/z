<?php

namespace App\Http\Controllers;

use App\DataTables\lokoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatelokoRequest;
use App\Http\Requests\UpdatelokoRequest;
use App\Repositories\lokoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class lokoController extends AppBaseController
{
    /** @var  lokoRepository */
    private $lokoRepository;

    public function __construct(lokoRepository $lokoRepo)
    {
        $this->lokoRepository = $lokoRepo;
    }

    /**
     * Display a listing of the loko.
     *
     * @param lokoDataTable $lokoDataTable
     * @return Response
     */
    public function index(lokoDataTable $lokoDataTable)
    {
        return $lokoDataTable->render('lokos.index');
    }

    /**
     * Show the form for creating a new loko.
     *
     * @return Response
     */
    public function create()
    {
        return view('lokos.create');
    }

    /**
     * Store a newly created loko in storage.
     *
     * @param CreatelokoRequest $request
     *
     * @return Response
     */
    public function store(CreatelokoRequest $request)
    {
        $input = $request->all();

        $loko = $this->lokoRepository->create($input);

        Flash::success('Loko saved successfully.');

        return redirect(route('lokos.index'));
    }

    /**
     * Display the specified loko.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            Flash::error('Loko not found');

            return redirect(route('lokos.index'));
        }

        return view('lokos.show')->with('loko', $loko);
    }

    /**
     * Show the form for editing the specified loko.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            Flash::error('Loko not found');

            return redirect(route('lokos.index'));
        }

        return view('lokos.edit')->with('loko', $loko);
    }

    /**
     * Update the specified loko in storage.
     *
     * @param  int              $id
     * @param UpdatelokoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelokoRequest $request)
    {
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            Flash::error('Loko not found');

            return redirect(route('lokos.index'));
        }

        $loko = $this->lokoRepository->update($request->all(), $id);

        Flash::success('Loko updated successfully.');

        return redirect(route('lokos.index'));
    }

    /**
     * Remove the specified loko from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            Flash::error('Loko not found');

            return redirect(route('lokos.index'));
        }

        $this->lokoRepository->delete($id);

        Flash::success('Loko deleted successfully.');

        return redirect(route('lokos.index'));
    }
}
