<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUFAAPIRequest;
use App\Http\Requests\API\UpdateUFAAPIRequest;
use App\Models\UFA;
use App\Repositories\UFARepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UFAController
 * @package App\Http\Controllers\API
 */

class UFAAPIController extends AppBaseController
{
    /** @var  UFARepository */
    private $uFARepository;

    public function __construct(UFARepository $uFARepo)
    {
        $this->uFARepository = $uFARepo;
    }

    /**
     * Display a listing of the UFA.
     * GET|HEAD /uFAS
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $uFAS = $this->uFARepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($uFAS->toArray(), 'U F A S retrieved successfully');
    }

    /**
     * Store a newly created UFA in storage.
     * POST /uFAS
     *
     * @param CreateUFAAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUFAAPIRequest $request)
    {
        $input = $request->all();

        $uFA = $this->uFARepository->create($input);

        return $this->sendResponse($uFA->toArray(), 'U F A saved successfully');
    }

    /**
     * Display the specified UFA.
     * GET|HEAD /uFAS/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UFA $uFA */
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            return $this->sendError('U F A not found');
        }

        return $this->sendResponse($uFA->toArray(), 'U F A retrieved successfully');
    }

    /**
     * Update the specified UFA in storage.
     * PUT/PATCH /uFAS/{id}
     *
     * @param int $id
     * @param UpdateUFAAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUFAAPIRequest $request)
    {
        $input = $request->all();

        /** @var UFA $uFA */
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            return $this->sendError('U F A not found');
        }

        $uFA = $this->uFARepository->update($input, $id);

        return $this->sendResponse($uFA->toArray(), 'UFA updated successfully');
    }

    /**
     * Remove the specified UFA from storage.
     * DELETE /uFAS/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UFA $uFA */
        $uFA = $this->uFARepository->find($id);

        if (empty($uFA)) {
            return $this->sendError('U F A not found');
        }

        $uFA->delete();

        return $this->sendResponse($id, 'U F A deleted successfully');
    }
}
