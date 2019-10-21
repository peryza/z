<?php

namespace App\Http\Controllers;

use App\DataTables\UFADataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUFARequest;
use App\Http\Requests\UpdateUFARequest;
use App\Repositories\UFARepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UFAController extends AppBaseController
{
    /** @var  UFARepository */
    private $uFARepository;

    public function __construct(UFARepository $uFARepo)
    {
        $this->uFARepository = $uFARepo;
    }

    /**
     * Display a listing of the UFA.
     *
     * @param UFADataTable $uFADataTable
     * @return Response
     */
    public function index()
    {
        return view('u_f_a_s.index');
    }
    public function usersList()
    {
        $ufas = DB::table('ufa_fc')->select('*');
        return datatables()->of($ufas)
            ->make(true);
    }

    /**
     * Show the form for creating a new UFA.
     *
     * @return Response
     */
    public function create()
    {
        return view('u_f_a_s.create');
    }

    /**
     * Store a newly created UFA in storage.
     *
     * @param CreateUFARequest $request
     *
     * @return Response
     */
    public function store(CreateUFARequest $request)
    {
        $input = $request->all();

        $uFA = $this->uFARepository->create($input);

        Flash::success('U F A saved successfully.');

        return redirect(route('uFAS.index'));
    }

    /**
     * Display the specified UFA.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            Flash::error('U F A not found');

            return redirect(route('uFAS.index'));
        }

        return view('u_f_a_s.show')->with('uFA', $uFA);
    }

    /**
     * Show the form for editing the specified UFA.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            Flash::error('U F A not found');

            return redirect(route('uFAS.index'));
        }

        return view('u_f_a_s.edit')->with('uFA', $uFA);
    }

    /**
     * Update the specified UFA in storage.
     *
     * @param  int              $id
     * @param UpdateUFARequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUFARequest $request)
    {
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            Flash::error('U F A not found');

            return redirect(route('uFAS.index'));
        }

        $uFA = $this->uFARepository->update($request->all(), $id);

        Flash::success('U F A updated successfully.');

        return redirect(route('uFAS.index'));
    }

    /**
     * Remove the specified UFA from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            Flash::error('U F A not found');

            return redirect(route('uFAS.index'));
        }

        $this->uFARepository->delete($id);

        Flash::success('U F A deleted successfully.');

        return redirect(route('uFAS.index'));
    }
}
