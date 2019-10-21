<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKrasnodarRequest;
use App\Http\Requests\UpdateKrasnodarRequest;
use App\Repositories\KrasnodarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KrasnodarController extends AppBaseController
{
    /** @var  KrasnodarRepository */
    private $krasnodarRepository;

    public function __construct(KrasnodarRepository $krasnodarRepo)
    {
        $this->krasnodarRepository = $krasnodarRepo;
    }

    /**
     * Display a listing of the Krasnodar.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $krasnodars = $this->krasnodarRepository->all();

        return view('krasnodars.index')
            ->with('krasnodars', $krasnodars);
    }

    /**
     * Show the form for creating a new Krasnodar.
     *
     * @return Response
     */
    public function create()
    {
        return view('krasnodars.create');
    }

    /**
     * Store a newly created Krasnodar in storage.
     *
     * @param CreateKrasnodarRequest $request
     *
     * @return Response
     */
    public function store(CreateKrasnodarRequest $request)
    {
        $input = $request->all();

        $krasnodar = $this->krasnodarRepository->create($input);

        Flash::success('Krasnodar saved successfully.');

        return redirect(route('krasnodars.index'));
    }

    /**
     * Display the specified Krasnodar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $krasnodar = $this->krasnodarRepository->find($id);

        if (empty($krasnodar)) {
            Flash::error('Krasnodar not found');

            return redirect(route('krasnodars.index'));
        }

        return view('krasnodars.show')->with('krasnodar', $krasnodar);
    }

    /**
     * Show the form for editing the specified Krasnodar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $krasnodar = $this->krasnodarRepository->find($id);

        if (empty($krasnodar)) {
            Flash::error('Krasnodar not found');

            return redirect(route('krasnodars.index'));
        }

        return view('krasnodars.edit')->with('krasnodar', $krasnodar);
    }

    /**
     * Update the specified Krasnodar in storage.
     *
     * @param int $id
     * @param UpdateKrasnodarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKrasnodarRequest $request)
    {
        $krasnodar = $this->krasnodarRepository->find($id);

        if (empty($krasnodar)) {
            Flash::error('Krasnodar not found');

            return redirect(route('krasnodars.index'));
        }

        $krasnodar = $this->krasnodarRepository->update($request->all(), $id);

        Flash::success('Krasnodar updated successfully.');

        return redirect(route('krasnodars.index'));
    }

    /**
     * Remove the specified Krasnodar from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $krasnodar = $this->krasnodarRepository->find($id);

        if (empty($krasnodar)) {
            Flash::error('Krasnodar not found');

            return redirect(route('krasnodars.index'));
        }

        $this->krasnodarRepository->delete($id);

        Flash::success('Krasnodar deleted successfully.');

        return redirect(route('krasnodars.index'));
    }
}
