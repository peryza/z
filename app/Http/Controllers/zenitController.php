<?php

namespace App\Http\Controllers;

use App\DataTables\zenitDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatezenitRequest;
use App\Http\Requests\UpdatezenitRequest;
use App\Repositories\zenitRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class zenitController extends AppBaseController
{
    /** @var  zenitRepository */
    private $zenitRepository;

    public function __construct(zenitRepository $zenitRepo)
    {
        $this->zenitRepository = $zenitRepo;
    }

    /**
     * Display a listing of the zenit.
     *
     * @param zenitDataTable $zenitDataTable
     * @return Response
     */
    public function index(zenitDataTable $zenitDataTable)
    {
        return $zenitDataTable->render('zenits.index');
    }

    /**
     * Show the form for creating a new zenit.
     *
     * @return Response
     */
    public function create()
    {
        return view('zenits.create');
    }

    /**
     * Store a newly created zenit in storage.
     *
     * @param CreatezenitRequest $request
     *
     * @return Response
     */
    public function store(CreatezenitRequest $request)
    {
        $input = $request->all();

        $zenit = $this->zenitRepository->create($input);

        Flash::success('Zenit saved successfully.');

        return redirect(route('zenits.index'));
    }

    /**
     * Display the specified zenit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            Flash::error('Zenit not found');

            return redirect(route('zenits.index'));
        }

        return view('zenits.show')->with('zenit', $zenit);
    }

    /**
     * Show the form for editing the specified zenit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            Flash::error('Zenit not found');

            return redirect(route('zenits.index'));
        }

        return view('zenits.edit')->with('zenit', $zenit);
    }

    /**
     * Update the specified zenit in storage.
     *
     * @param  int              $id
     * @param UpdatezenitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezenitRequest $request)
    {
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            Flash::error('Zenit not found');

            return redirect(route('zenits.index'));
        }

        $zenit = $this->zenitRepository->update($request->all(), $id);

        Flash::success('Zenit updated successfully.');

        return redirect(route('zenits.index'));
    }

    /**
     * Remove the specified zenit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            Flash::error('Zenit not found');

            return redirect(route('zenits.index'));
        }

        $this->zenitRepository->delete($id);

        Flash::success('Zenit deleted successfully.');

        return redirect(route('zenits.index'));
    }
}
