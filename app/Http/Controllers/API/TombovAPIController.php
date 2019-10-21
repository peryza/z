<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTombovAPIRequest;
use App\Http\Requests\API\UpdateTombovAPIRequest;
use App\Models\Tombov;
use App\Repositories\TombovRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TombovController
 * @package App\Http\Controllers\API
 */

class TombovAPIController extends AppBaseController
{
    /** @var  TombovRepository */
    private $tombovRepository;

    public function __construct(TombovRepository $tombovRepo)
    {
        $this->tombovRepository = $tombovRepo;
    }

    /**
     * Display a listing of the Tombov.
     * GET|HEAD /tombovs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tombovs = $this->tombovRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tombovs->toArray(), 'Tombovs retrieved successfully');
    }

    /**
     * Store a newly created Tombov in storage.
     * POST /tombovs
     *
     * @param CreateTombovAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTombovAPIRequest $request)
    {
        $input = $request->all();

        $tombov = $this->tombovRepository->create($input);

        return $this->sendResponse($tombov->toArray(), 'Tombov saved successfully');
    }

    /**
     * Display the specified Tombov.
     * GET|HEAD /tombovs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tombov $tombov */
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            return $this->sendError('Tombov not found');
        }

        return $this->sendResponse($tombov->toArray(), 'Tombov retrieved successfully');
    }

    /**
     * Update the specified Tombov in storage.
     * PUT/PATCH /tombovs/{id}
     *
     * @param int $id
     * @param UpdateTombovAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTombovAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tombov $tombov */
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            return $this->sendError('Tombov not found');
        }

        $tombov = $this->tombovRepository->update($input, $id);

        return $this->sendResponse($tombov->toArray(), 'Tombov updated successfully');
    }

    /**
     * Remove the specified Tombov from storage.
     * DELETE /tombovs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tombov $tombov */
        $tombov = $this->tombovRepository->find($id);

        if (empty($tombov)) {
            return $this->sendError('Tombov not found');
        }

        $tombov->delete();

        return $this->sendResponse($id, 'Tombov deleted successfully');
    }
}
