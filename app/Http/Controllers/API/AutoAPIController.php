<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAutoAPIRequest;
use App\Http\Requests\API\UpdateAutoAPIRequest;
use App\Models\Auto;
use App\Repositories\AutoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AutoController
 * @package App\Http\Controllers\API
 */

class AutoAPIController extends AppBaseController
{
    /** @var  AutoRepository */
    private $autoRepository;

    public function __construct(AutoRepository $autoRepo)
    {
        $this->autoRepository = $autoRepo;
    }

    /**
     * Display a listing of the Auto.
     * GET|HEAD /autos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $autos = $this->autoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($autos->toArray(), 'Autos retrieved successfully');
    }

    /**
     * Store a newly created Auto in storage.
     * POST /autos
     *
     * @param CreateAutoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAutoAPIRequest $request)
    {
        $input = $request->all();

        $auto = $this->autoRepository->create($input);

        return $this->sendResponse($auto->toArray(), 'Auto saved successfully');
    }

    /**
     * Display the specified Auto.
     * GET|HEAD /autos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Auto $auto */
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            return $this->sendError('Auto not found');
        }

        return $this->sendResponse($auto->toArray(), 'Auto retrieved successfully');
    }

    /**
     * Update the specified Auto in storage.
     * PUT/PATCH /autos/{id}
     *
     * @param int $id
     * @param UpdateAutoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAutoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Auto $auto */
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            return $this->sendError('Auto not found');
        }

        $auto = $this->autoRepository->update($input, $id);

        return $this->sendResponse($auto->toArray(), 'Auto updated successfully');
    }

    /**
     * Remove the specified Auto from storage.
     * DELETE /autos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Auto $auto */
        $auto = $this->autoRepository->find($id);

        if (empty($auto)) {
            return $this->sendError('Auto not found');
        }

        $auto->delete();

        return $this->sendResponse($id, 'Auto deleted successfully');
    }
}
