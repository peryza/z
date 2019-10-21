<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRubinAPIRequest;
use App\Http\Requests\API\UpdateRubinAPIRequest;
use App\Models\Rubin;
use App\Repositories\RubinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RubinController
 * @package App\Http\Controllers\API
 */

class RubinAPIController extends AppBaseController
{
    /** @var  RubinRepository */
    private $rubinRepository;

    public function __construct(RubinRepository $rubinRepo)
    {
        $this->rubinRepository = $rubinRepo;
    }

    /**
     * Display a listing of the Rubin.
     * GET|HEAD /rubins
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rubins = $this->rubinRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($rubins->toArray(), 'Rubins retrieved successfully');
    }

    /**
     * Store a newly created Rubin in storage.
     * POST /rubins
     *
     * @param CreateRubinAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRubinAPIRequest $request)
    {
        $input = $request->all();

        $rubin = $this->rubinRepository->create($input);

        return $this->sendResponse($rubin->toArray(), 'Rubin saved successfully');
    }

    /**
     * Display the specified Rubin.
     * GET|HEAD /rubins/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rubin $rubin */
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            return $this->sendError('Rubin not found');
        }

        return $this->sendResponse($rubin->toArray(), 'Rubin retrieved successfully');
    }

    /**
     * Update the specified Rubin in storage.
     * PUT/PATCH /rubins/{id}
     *
     * @param int $id
     * @param UpdateRubinAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRubinAPIRequest $request)
    {
        $input = $request->all();

        /** @var Rubin $rubin */
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            return $this->sendError('Rubin not found');
        }

        $rubin = $this->rubinRepository->update($input, $id);

        return $this->sendResponse($rubin->toArray(), 'Rubin updated successfully');
    }

    /**
     * Remove the specified Rubin from storage.
     * DELETE /rubins/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rubin $rubin */
        $rubin = $this->rubinRepository->find($id);

        if (empty($rubin)) {
            return $this->sendError('Rubin not found');
        }

        $rubin->delete();

        return $this->sendResponse($id, 'Rubin deleted successfully');
    }
}
