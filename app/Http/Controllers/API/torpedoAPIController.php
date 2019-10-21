<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetorpedoAPIRequest;
use App\Http\Requests\API\UpdatetorpedoAPIRequest;
use App\Models\torpedo;
use App\Repositories\torpedoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class torpedoController
 * @package App\Http\Controllers\API
 */

class torpedoAPIController extends AppBaseController
{
    /** @var  torpedoRepository */
    private $torpedoRepository;

    public function __construct(torpedoRepository $torpedoRepo)
    {
        $this->torpedoRepository = $torpedoRepo;
    }

    /**
     * Display a listing of the torpedo.
     * GET|HEAD /torpedos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $torpedos = $this->torpedoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($torpedos->toArray(), 'Torpedos retrieved successfully');
    }

    /**
     * Store a newly created torpedo in storage.
     * POST /torpedos
     *
     * @param CreatetorpedoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetorpedoAPIRequest $request)
    {
        $input = $request->all();

        $torpedo = $this->torpedoRepository->create($input);

        return $this->sendResponse($torpedo->toArray(), 'Torpedo saved successfully');
    }

    /**
     * Display the specified torpedo.
     * GET|HEAD /torpedos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var torpedo $torpedo */
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            return $this->sendError('Torpedo not found');
        }

        return $this->sendResponse($torpedo->toArray(), 'Torpedo retrieved successfully');
    }

    /**
     * Update the specified torpedo in storage.
     * PUT/PATCH /torpedos/{id}
     *
     * @param int $id
     * @param UpdatetorpedoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetorpedoAPIRequest $request)
    {
        $input = $request->all();

        /** @var torpedo $torpedo */
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            return $this->sendError('Torpedo not found');
        }

        $torpedo = $this->torpedoRepository->update($input, $id);

        return $this->sendResponse($torpedo->toArray(), 'torpedo updated successfully');
    }

    /**
     * Remove the specified torpedo from storage.
     * DELETE /torpedos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var torpedo $torpedo */
        $torpedo = $this->torpedoRepository->find($id);

        if (empty($torpedo)) {
            return $this->sendError('Torpedo not found');
        }

        $torpedo->delete();

        return $this->sendResponse($id, 'Torpedo deleted successfully');
    }
}
