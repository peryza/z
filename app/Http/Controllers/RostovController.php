<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRostovRequest;
use App\Http\Requests\UpdateRostovRequest;
use App\Repositories\RostovRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RostovController extends AppBaseController
{
    /** @var  RostovRepository */
    private $rostovRepository;

    public function __construct(RostovRepository $rostovRepo)
    {
        $this->rostovRepository = $rostovRepo;
    }

    /**
     * Display a listing of the Rostov.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rostovs = $this->rostovRepository->all();

        return view('rostovs.index')
            ->with('rostovs', $rostovs);
    }

    /**
     * Show the form for creating a new Rostov.
     *
     * @return Response
     */
    public function create()
    {
        return view('rostovs.create');
    }

    /**
     * Store a newly created Rostov in storage.
     *
     * @param CreateRostovRequest $request
     *
     * @return Response
     */
    public function store(CreateRostovRequest $request)
    {
        $input = $request->all();

        $rostov = $this->rostovRepository->create($input);

        Flash::success('Rostov saved successfully.');

        return redirect(route('rostovs.index'));
    }

    /**
     * Display the specified Rostov.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rostov = $this->rostovRepository->find($id);

        if (empty($rostov)) {
            Flash::error('Rostov not found');

            return redirect(route('rostovs.index'));
        }

        return view('rostovs.show')->with('rostov', $rostov);
    }

    /**
     * Show the form for editing the specified Rostov.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rostov = $this->rostovRepository->find($id);

        if (empty($rostov)) {
            Flash::error('Rostov not found');

            return redirect(route('rostovs.index'));
        }

        return view('rostovs.edit')->with('rostov', $rostov);
    }

    /**
     * Update the specified Rostov in storage.
     *
     * @param int $id
     * @param UpdateRostovRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRostovRequest $request)
    {
        $rostov = $this->rostovRepository->find($id);

        if (empty($rostov)) {
            Flash::error('Rostov not found');

            return redirect(route('rostovs.index'));
        }

        $rostov = $this->rostovRepository->update($request->all(), $id);

        Flash::success('Rostov updated successfully.');

        return redirect(route('rostovs.index'));
    }

    /**
     * Remove the specified Rostov from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rostov = $this->rostovRepository->find($id);

        if (empty($rostov)) {
            Flash::error('Rostov not found');

            return redirect(route('rostovs.index'));
        }

        $this->rostovRepository->delete($id);

        Flash::success('Rostov deleted successfully.');

        return redirect(route('rostovs.index'));
    }
}
