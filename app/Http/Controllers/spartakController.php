<?php

namespace App\Http\Controllers;

use App\DataTables\spartakDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatespartakRequest;
use App\Http\Requests\UpdatespartakRequest;
use App\Repositories\spartakRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class spartakController extends AppBaseController
{
    /** @var  spartakRepository */
    private $spartakRepository;

    public function __construct(spartakRepository $spartakRepo)
    {
        $this->spartakRepository = $spartakRepo;
    }

    /**
     * Display a listing of the spartak.
     *
     * @param spartakDataTable $spartakDataTable
     * @return Response
     */
    public function index(spartakDataTable $spartakDataTable)
    {
        return $spartakDataTable->render('spartaks.index');
    }

    /**
     * Show the form for creating a new spartak.
     *
     * @return Response
     */
    public function create()
    {
        return view('spartaks.create');
    }

    /**
     * Store a newly created spartak in storage.
     *
     * @param CreatespartakRequest $request
     *
     * @return Response
     */
    public function store(CreatespartakRequest $request)
    {
        $input = $request->all();

        $spartak = $this->spartakRepository->create($input);

        Flash::success('Spartak saved successfully.');

        return redirect(route('spartaks.index'));
    }

    /**
     * Display the specified spartak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $spartak = $this->spartakRepository->find($id);

        if (empty($spartak)) {
            Flash::error('Spartak not found');

            return redirect(route('spartaks.index'));
        }

        return view('spartaks.show')->with('spartak', $spartak);
    }

    /**
     * Show the form for editing the specified spartak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $spartak = $this->spartakRepository->find($id);

        if (empty($spartak)) {
            Flash::error('Spartak not found');

            return redirect(route('spartaks.index'));
        }

        return view('spartaks.edit')->with('spartak', $spartak);
    }

    /**
     * Update the specified spartak in storage.
     *
     * @param  int              $id
     * @param UpdatespartakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatespartakRequest $request)
    {
        $spartak = $this->spartakRepository->find($id);

        if (empty($spartak)) {
            Flash::error('Spartak not found');

            return redirect(route('spartaks.index'));
        }

        $spartak = $this->spartakRepository->update($request->all(), $id);

        Flash::success('Spartak updated successfully.');

        return redirect(route('spartaks.index'));
    }

    /**
     * Remove the specified spartak from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $spartak = $this->spartakRepository->find($id);

        if (empty($spartak)) {
            Flash::error('Spartak not found');

            return redirect(route('spartaks.index'));
        }

        $this->spartakRepository->delete($id);

        Flash::success('Spartak deleted successfully.');

        return redirect(route('spartaks.index'));
    }
}
