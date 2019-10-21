<?php

namespace App\Http\Controllers;

use App\DataTables\cskaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecskaRequest;
use App\Http\Requests\UpdatecskaRequest;
use App\Repositories\cskaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class cskaController extends AppBaseController
{
    /** @var  cskaRepository */
    private $cskaRepository;

    public function __construct(cskaRepository $cskaRepo)
    {
        $this->cskaRepository = $cskaRepo;
    }

    /**
     * Display a listing of the cska.
     *
     * @param cskaDataTable $cskaDataTable
     * @return Response
     */
    public function index(cskaDataTable $cskaDataTable)
    {
        return $cskaDataTable->render('cskas.index');
    }

    /**
     * Show the form for creating a new cska.
     *
     * @return Response
     */
    public function create()
    {
        return view('cskas.create');
    }

    /**
     * Store a newly created cska in storage.
     *
     * @param CreatecskaRequest $request
     *
     * @return Response
     */
    public function store(CreatecskaRequest $request)
    {
        $input = $request->all();

        $cska = $this->cskaRepository->create($input);

        Flash::success('Cska saved successfully.');

        return redirect(route('cskas.index'));
    }

    /**
     * Display the specified cska.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            Flash::error('Cska not found');

            return redirect(route('cskas.index'));
        }

        return view('cskas.show')->with('cska', $cska);
    }

    /**
     * Show the form for editing the specified cska.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            Flash::error('Cska not found');

            return redirect(route('cskas.index'));
        }

        return view('cskas.edit')->with('cska', $cska);
    }

    /**
     * Update the specified cska in storage.
     *
     * @param  int              $id
     * @param UpdatecskaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecskaRequest $request)
    {
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            Flash::error('Cska not found');

            return redirect(route('cskas.index'));
        }

        $cska = $this->cskaRepository->update($request->all(), $id);

        Flash::success('Cska updated successfully.');

        return redirect(route('cskas.index'));
    }

    /**
     * Remove the specified cska from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            Flash::error('Cska not found');

            return redirect(route('cskas.index'));
        }

        $this->cskaRepository->delete($id);

        Flash::success('Cska deleted successfully.');

        return redirect(route('cskas.index'));
    }
}
