<?php

namespace App\Http\Controllers;

use App\DataTables\AutoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\UpdateAutoRequest;
use App\Repositories\AutoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
class AutoController extends AppBaseController
{
    /** @var  AutoRepository */
    private $autoRepository;

    public function __construct(AutoRepository $autoRepo)
    {
        $this->autoRepository = $autoRepo;
    }

    /**
     * Display a listing of the Auto.
     *
     * @param AutoDataTable $autoDataTable
     * @return Response
     */
    public function index()
    {
        return view('autos.index');
    }
    public function autosList()
    {
        $auto = DB::table('auto')
            ->join('firm','auto.model', '=', 'firm.id')
            ->select('auto.id','auto.aaa','firm.name','auto.created_at')
            ->get();
        return datatables()->of($auto)
            ->make(true);
    }



    /**
     * Show the form for creating a new Auto.
     *
     * @return Response
     */
    public function create()
    {
        return view('autos.create');
    }

    /**
     * Store a newly created Auto in storage.
     *
     * @param CreateAutoRequest $request
     *
     * @return Response
     */
    public function store(CreateAutoRequest $request)
    {
        $input = $request->all();

        $auto = $this->autoRepository->create($input);

        Flash::success('Auto saved successfully.');

        return redirect(route('autos.index'));
    }

    /**
     * Display the specified Auto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            Flash::error('Auto not found');

            return redirect(route('autos.index'));
        }

        return view('autos.show')->with('auto', $auto);
    }

    /**
     * Show the form for editing the specified Auto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            Flash::error('Auto not found');

            return redirect(route('autos.index'));
        }

        return view('autos.edit')->with('auto', $auto);
    }

    /**
     * Update the specified Auto in storage.
     *
     * @param  int              $id
     * @param UpdateAutoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAutoRequest $request)
    {
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            Flash::error('Auto not found');

            return redirect(route('autos.index'));
        }

        $auto = $this->autoRepository->update($request->all(), $id);

        Flash::success('Auto updated successfully.');

        return redirect(route('autos.index'));
    }

    /**
     * Remove the specified Auto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            Flash::error('Auto not found');

            return redirect(route('autos.index'));
        }

        $this->autoRepository->delete($id);

        Flash::success('Auto deleted successfully.');

        return redirect(route('autos.index'));
    }
}
